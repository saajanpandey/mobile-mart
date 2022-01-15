<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(8);
        return view('admin.order.index', compact('orders'));
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
    public function store(OrderRequest $request)
    {
        try {
            DB::beginTransaction();
            $order = new Order();
            $data['user_id'] = $request->user_id;
            $data['address'] = $request->address;
            $data['cellphone_number'] = $request->cellphone_number;
            $data['payment_method'] = $request->payment_method;
            $data['order_status'] = 1;
            $data['order_date'] = Carbon::now();
            $data['price'] =  $request->price;
            $orders = $order->create($data);
            $cart = Cart::find($request->cart_id);
            $items = $cart->where('user_id', $request->user_id)->get();
            foreach ($items as $item) {
                $productId = $item->product_id;
                $orders->products()->attach($productId);
                $item->delete();
            }
            DB::commit();
            return redirect()->route('first.page')->with('message', 'Order Placed Successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('first.page')->with('error', 'Order Cannot Be Placed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
