<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Display a listing of orders.
     *
     * @return View
     */
    public function index()
    {
        $orders = Order::paginate(config('common.paginate.backend'));
        return view('backend.order.index')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Order $order
     * @return View
     */
    public function edit(Order $order)
    {
        return view('backend.order.edit')->with('order', $order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * @param Request $request
     * @param Order $order
     * @return JsonResponse
     */
    public function updatePartial(Request $request, Order $order)
    {
        $request->validate([
            'name' => 'required|string',
            'value' => 'required',
        ]);

        $result = $order->update([$request['name'] => $request['value']]);

        if ($result) {
            return response()->json(['success' => true, 'msg' => "Update {$request['name']} successfully!"], 200);
        }
        return response()->json(['success' => false], 400);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
