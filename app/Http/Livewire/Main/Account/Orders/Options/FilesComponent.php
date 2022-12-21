<?php

namespace App\Http\Livewire\Main\Account\Orders\Options;

use App\Http\Validators\Main\Account\Orders\SendMessageValidator;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderItemWorkConversation;
use App\Notifications\User\Seller\OrderItemCompleted as SellerOrderItemCompleted;
use App\Notifications\User\Buyer\OrderItemCompleted as BuyerOrderItemCompleted;
use App\Notifications\User\Seller\DeliveredWorkNewMessage;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class FilesComponent extends Component
{
    use SEOToolsTrait;
    
    public $orderId;
    public $itemId;
    public $order;
    public $item;
    public $message;

    protected $queryString = [
        'orderId' => 'orderId',
        'itemId'  => 'itemId',
    ];

    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
        // Get user id
        $user_id     = auth()->id();

        // Get order
        $order       = Order::where('uid', $this->orderId)->where('buyer_id', $user_id)->firstOrFail();

        // Set order
        $this->order = $order;

        // Get item
        $item        = OrderItem::where('uid', $this->itemId)->where('order_id', $order->id)->firstOrFail();

        // User can send requirements only when item status is pending or in progress
        if ($item->status !== 'pending' || $item->status !== 'proceeded') {

            // Set item
            $this->item  = $item;

        } else {
            return redirect('account/orders')->with('message', __('messages.t_u_cant_submit_requirements_for_item'));
        }
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $separator   = settings('general')->separator;
        $title       = __('messages.t_delivered_work') . " $separator " . settings('general')->title;
        $description = settings('seo')->description;
        $ogimage     = src( settings('seo')->ogimage );

        $this->seo()->setTitle( $title );
        $this->seo()->setDescription( $description );
        $this->seo()->setCanonical( url()->current() );
        $this->seo()->opengraph()->setTitle( $title );
        $this->seo()->opengraph()->setDescription( $description );
        $this->seo()->opengraph()->setUrl( url()->current() );
        $this->seo()->opengraph()->setType('website');
        $this->seo()->opengraph()->addImage( $ogimage );
        $this->seo()->twitter()->setImage( $ogimage );
        $this->seo()->twitter()->setUrl( url()->current() );
        $this->seo()->twitter()->setSite( "@" . settings('seo')->twitter_username );
        $this->seo()->twitter()->addValue('card', 'summary_large_image');
        $this->seo()->metatags()->addMeta('fb:page_id', settings('seo')->facebook_page_id, 'property');
        $this->seo()->metatags()->addMeta('fb:app_id', settings('seo')->facebook_app_id, 'property');
        $this->seo()->metatags()->addMeta('robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1', 'name');
        $this->seo()->jsonLd()->setTitle( $title );
        $this->seo()->jsonLd()->setDescription( $description );
        $this->seo()->jsonLd()->setUrl( url()->current() );
        $this->seo()->jsonLd()->setType('WebSite');

        return view('livewire.main.account.orders.options.files')->extends('livewire.main.layout.app')->section('content');
    }


    /**
     * Send message
     *
     * @return mixed
     */
    public function sendMessage()
    {
        try {

            // Check if order not finished yet
            if ($this->item->is_finished) {
                return;
            }

            // Validate form
            SendMessageValidator::validate($this);

            // Save message
            $message              = new OrderItemWorkConversation();
            $message->item_id     = $this->item->id;
            $message->seller_id   = $this->item->owner_id;
            $message->buyer_id    = $this->order->buyer_id;
            $message->msg_from    = auth()->id();
            $message->msg_content = clean($this->message);
            $message->save();

            // Reset form
            $this->reset('message');

            // Refresh item
            $this->item->refresh();

            // Send notification to seller
            $this->item->owner->notify( (new DeliveredWorkNewMessage($this->item, $message))->locale(config('app.locale')) );

            // Send notification
            notification([
                'text'    => 't_buyer_sent_u_message_about_delivered_files',
                'action'  => url('seller/orders/deliver', $this->item->uid),
                'user_id' => $this->item->owner_id,
                'params'  => ['buyer' => auth()->user()->username]
            ]);

            // Success
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_toast_operation_success'),
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_toast_form_validation_error'),
                "type"    => "error"
            ]);

            throw $e;

        } catch (\Throwable $th) {

            // Error
            $this->dispatchBrowserEvent('alert',[
                "message" => __('messages.t_toast_something_went_wrong'),
                "type"    => "error"
            ]);

            throw $th;

        }
    }


    /**
     * Mark work as done
     *
     * @return void
     */
    public function completed()
    {
        // Get item
        $item = OrderItem::whereHas('order', function($query) {
                            return $query->where('buyer_id', auth()->id())->where('id', $this->order->id);
                        })->where('id', $this->item->id)
                        ->where('status', 'delivered')
                        ->where('is_finished', false)
                        ->firstOrFail();

        // Mark item as completed
        $item->is_finished  = true;
        $item->save();

        // Give seller his money
        $item->owner()->update([
            'balance_pending'   => $item->owner->balance_pending - $item->profit_value,
            'balance_available' => $item->owner->balance_available + $item->profit_value,
        ]);

        // Remove item from queue list and success sales
        $item->gig()->decrement('orders_in_queue');
        $item->gig()->increment('counter_sales');

        // Send notification to seller
        $item->owner->notify( (new SellerOrderItemCompleted($item))->locale(config('app.locale')) );

        // Send notification
        notification([
            'text'    => 't_order_id_completed',
            'action'  => url('seller/orders/details', $item->uid),
            'user_id' => $item->owner_id,
            'params'  => ['buyer' => auth()->user()->username]
        ]);

        // Send notification to buyer
        $item->order->buyer->notify( (new BuyerOrderItemCompleted($item))->locale(config('app.locale')) );

        // Redirect user to give a review
        return redirect('account/reviews/create/' . $item->uid);

    }
    
}