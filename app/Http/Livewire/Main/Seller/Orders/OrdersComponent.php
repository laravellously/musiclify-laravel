<?php

namespace App\Http\Livewire\Main\Seller\Orders;

use App\Models\OrderItem;
use App\Notifications\User\Buyer\OrderItemCanceled;
use App\Notifications\User\Buyer\OrderItemInProgress;
use Livewire\Component;
use Livewire\WithPagination;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class OrdersComponent extends Component
{

    use WithPagination, SEOToolsTrait;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $separator   = settings('general')->separator;
        $title       = __('messages.t_my_orders') . " $separator " . settings('general')->title;
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

        return view('livewire.main.seller.orders.orders', [
            'orders' => $this->orders
        ])->extends('livewire.main.layout.app')->section('content');
    }


    /**
     * Get seller's received orders
     *
     * @return object
     */
    public function getOrdersProperty()
    {
        // Get orders by this seller
        $orders = OrderItem::where('owner_id', auth()->id())->latest()->paginate(42);

        // Return orders
        return $orders;
    }


    /**
     * Cancel order 
     *
     * @param string $id
     * @return void
     */
    public function cancel($id)
    {
        // Get item
        $item = OrderItem::where('uid', $id)->where('owner_id', auth()->id())->where('status', 'pending')->firstOrFail();

        // Offline payment, invoice must be paid
        if ($item->order->invoice->status === 'pending') {
            return;
        }

        // Remove item price from seller balance
        $item->owner()->update([
            'balance_pending' => $item->owner->balance_pending - $item->profit_value
        ]);

        // Add item price to buyer balance
        $item->order->buyer()->update([
            'balance_available' => $item->order->buyer->balance_available + $item->total_value
        ]);

        // Update item
        $item->status      = 'canceled';
        $item->canceled_by = 'seller';
        $item->canceled_at = now();
        $item->is_finished = true;
        $item->save();

        // Decrement orders in queue
        $item->gig()->decrement('orders_in_queue');

        // Send notification to buyer
        $item->order->buyer->notify( (new OrderItemCanceled($item))->locale(config('app.locale')) );

        // Send notification
        notification([
            'text'    => 't_seller_has_canceled_ur_order',
            'action'  => url('account/orders'),
            'user_id' => $item->order->buyer_id,
            'params'  => ['seller' => auth()->user()->username]
        ]);

        // success
        $this->dispatchBrowserEvent('alert',[
            "message" => __('messages.t_order_has_been_successfully_canceled')
        ]);
    }


    /**
     * Progress order 
     *
     * @param string $id
     * @return void
     */
    public function progress($id)
    {
        // Get item
        $item               = OrderItem::where('uid', $id)->where('owner_id', auth()->id())->where('status', 'pending')->firstOrFail();

        // Offline payment, invoice must be paid
        if ($item->order->invoice->status === 'pending') {
            return;
        }

        // Update item
        if (!$item->expected_delivery_date) {
            $item->expected_delivery_date = $this->calculateExpectedDeliveryDate($item);
        }
        $item->status       = 'proceeded';
        $item->proceeded_at = now();
        $item->save();

        // Send notification to buyer
        $item->order->buyer->notify( (new OrderItemInProgress($item))->locale(config('app.locale')) );

        // Send notification
        notification([
            'text'    => 't_seller_has_started_ur_order',
            'action'  => url('account/orders'),
            'user_id' => $item->order->buyer_id,
            'params'  => ['seller' => auth()->user()->username]
        ]);

        // success
        $this->dispatchBrowserEvent('alert',[
            "message" => __('messages.t_order_has_been_successfully_marked_progress')
        ]);
    }


    /**
     * Caculate expected delivery date
     *
     * @param object $item
     * @return string
     */
    private function calculateExpectedDeliveryDate($item)
    {
        // Set empty days variable
        $days  = 0;

        // Culculate extra days for upgrades
        $days += $item->upgrades()->exists() ? $item->upgrades->sum('extra_days') : 0;

        // Add gig delivery time
        $days += $item->gig->delivery_time;

        // Calculate expected delivery date
        return now()->addDays($days);
    }
    
}