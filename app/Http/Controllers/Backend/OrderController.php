<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderUpdateRequest;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        return $this->orderService = $orderService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allAdminOrders = $this->orderService->getAllOrders();
        // dd($allOrders);
        return view('admin.orders.index', compact('allAdminOrders'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(int $order)
    {
        $Orders = $this->orderService->getAOrder($order);
        // dd($Order);
        return view('admin.orders.edit-order', compact('Orders'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderUpdateRequest $request, $order)
    {
        $datas = $request->validated();
        $this->orderService->UpdateOrder($order, $datas);
        return redirect()->route('orders')->with('message','Order Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($order)
    {
        $this->orderService->DeleteOrder($order);
        return back()->with('message', 'Order Deleted');
    }
}
