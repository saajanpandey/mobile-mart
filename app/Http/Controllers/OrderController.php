<?php

namespace App\Http\Controllers;

use App\Exports\OrderExport;
use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\UserHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Config;

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
            $history = new UserHistory();
            $data['user_id'] = $request->user_id;
            $data['address'] = $request->address;
            $data['cellphone_number'] = $request->cellphone_number;
            $data['payment_method'] = $request->payment_method;
            $data['order_status'] = 1;
            $data['order_date'] = Carbon::now()->format('Y-m-d');
            $data['price'] =  $request->price;
            $orders = $order->create($data);
            $cart = Cart::find($request->cart_id);
            $items = $cart->where('user_id', $request->user_id)->get();
            foreach ($items as $item) {
                $productId = $item->product_id;
                $orders->products()->attach($productId);
                $item->delete();
            }
            $history->user_id = $request->user_id;
            $history->order_id = $orders->id;
            $history->save();
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
        $order = Order::find($id);
        return view('admin.order.edit', compact('order'));
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
        $order = Order::find($id);
        $order->order_status = $request->order_status;
        if ($order->order_status == 3) {
            $order->delivery_date = $request->delivery_date;
            $order->save();
        }
        if ($order->order_status == 4) {
            $order->returned_date = $request->returned_date;
            $order->save();
        }
        if ($order->order_status == 5) {
            $order->redelivery_date = $request->redelivery_date;
            $order->save();
        }
        if ($order->order_status == 6) {
            $order->cancelation_date = $request->cancelation_date;
            $order->save();
        }
        return redirect()->route('order.index')
            ->with('success', 'The data was updated successfully');;
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

    public function getMonthly()
    {
        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();
        $orders = Order::where('created_at', '>=', $start)->where('created_at', '<=', $end)->where('order_status', 3)->get()->sum("price");
        return $orders;
    }

    public function getYearly()
    {
        $start = Carbon::now()->startOfYear();
        $end = Carbon::now()->endOfYear();
        $orders = Order::where('created_at', '>=', $start)->where('created_at', '<=', $end)->where('order_status', 3)->get()->sum("price");
        return $orders;
    }

    public function downloadReport()
    {
        $data = Order::all();
        $titles = array(
            'customerName' => 'Customer Name',
            'address' => 'Address',
            'mobileNumber' => 'Mobile Number',
            'products' => 'Products',
            'totalPrice' => 'Total Price',
            'orderDate' => 'Order Date',
            'paymentMethod' => 'Payment Method',
            'orderStatus' => 'Order Status',
            'deliveryDate' => 'Delivery Date'
        );
        foreach ($data as $datum) {
            try {
                $results[] = array(
                    'customerName' => $datum->user->first_name . $datum->user->last_name ?? '-',
                    'address' => $datum->address ?? '-',
                    'mobileNumber' => $datum->cellphone_number ?? '-',
                    'products' => $datum->products->pluck('name')->implode(',') ?? '-',
                    'totalPrice' => $datum->price ?? '-',
                    'orderDate' => Carbon::parse($datum->order_date)->format('Y-m-d') ?? '-',
                    'paymentMethod' => Config::get('constants.PAYMENT_METHOD')[$datum->payment_method],
                    'orderStatus' => Config::get('constants.DELIVERY_STATUS')[$datum->order_status],
                    'deliveryDate' => $datum->delivery_date ?? '-'
                );
            } catch (\Exception $e) {
                continue;
            }
        }
        $filename = 'order.xlsx';
        return \Excel::download(new OrderExport($results, $titles), $filename);
    }

    public function getOrders()
    {
        $orders = Order::where('order_status', '=', 1)->count();
        return $orders;
    }
}
