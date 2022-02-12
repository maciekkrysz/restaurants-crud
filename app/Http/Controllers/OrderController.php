<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderContent;
use App\Models\Menu;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Order::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        return Order::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return [
            'paid' => $order->paid,
            'confirmed' => $order->confirmed,
            'sent' => $order->sent,
            'delivered' => $order->delivered,
            'content' => $order->content()->get()
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest;  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, $id)
    {
        $order = Order::find($id);
        $order->update($request->all());
        return $order;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Order::destroy($id);
    }

    public function deleteContent($id, $content)
    {
        return $this->updateContent($id, $content, 0);
    }

    public function updateContent($id, $content, $count)
    {
        $records = OrderContent::where('order_id', '=', $id)->where('menu_id', '=', $content)->get();
        if (count($records) === 0) {
            return response('Content doesnt exist in order', 400);
        }
        return $records->first()->id;

        if ($count === 0) {
            $record_id = $records->first()->id;
            return OrderContent::destroy($record_id);
        }

        $record = $records->first();
        $record->update(['count' => $count]);
        return $record;
    }

    public function addContent($id, $content, $count)
    {
        $records = OrderContent::where('order_id', '=', $id)->where('menu_id', '=', $content)->get();
        if (count($records) > 0) {
            return response('Content exists in order', 400);
        }

        $menu_pos = Menu::find($content)->id;
        return OrderContent::create([
            'order_id' => $id,
            'menu_id' => $menu_pos,
            'count' => $count
        ]);
    }
}
