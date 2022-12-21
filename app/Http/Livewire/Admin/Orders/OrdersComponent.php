<?php

namespace App\Http\Livewire\Admin\Orders;

use App\Models\Order;
use Livewire\WithPagination;
use Livewire\Component;
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
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_orders'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.orders.orders', [
            'orders' => $this->orders
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of orders
     *
     * @return object
     */
    public function getOrdersProperty()
    {
        return Order::latest('placed_at')->paginate(42);
    }

}
