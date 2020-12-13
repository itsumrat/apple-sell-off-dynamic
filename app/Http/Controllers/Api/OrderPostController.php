<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Backend\Order;
use App\Model\Backend\OrderItem;
use App\Model\Backend\ProductStock;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderPostController extends Controller
{
    public function orderPost(Request $request) {
    	$data = $request->data['orders'];
        $shippingAmount = $request->data['shipp'];
        $totalCount = 0;
        foreach ($data as $k => $c) {
            $totalCount += $c['count'];
        }
        $totalPrice = 0;
        foreach ($data as $ke => $p) {
            $totalPrice += $p['price'] * $p['count'];
        }
        $orderNo = rand(10, 100) . time();
        $message= array();

        DB::beginTransaction();
        try {
            $order = Order::create($request->except('customer_id', 'order_no', 'total_count', 'total_price', 'shipping_charge')+
                [
                    'customer_id' => Auth::id(),
                    'order_no' => $orderNo,
                    'total_count' => $totalCount,
                    'total_price' => $totalPrice + $shippingAmount,
                    'shipping_charge' => $shippingAmount
                ]);
            if ($order) {
                foreach ($data as $key => $value) {
                    $checkStock = ProductStock::where('product_id', $value['id'])->first();

                    if ($checkStock->stock_quantity <= $value['count']) {
                        $message[] = 'Not enough Product' . '-' . $value['name'];
                    }else{
                        OrderItem::create($request->except('order_id', 'order_no', 'product_id', 'count', 'unit_price', 'sub_price')+
                            [
                                'order_id' => $order->id,
                                'order_no' => $order->order_no,
                                'product_id' => $value['id'],
                                'count' => $value['count'],
                                'unit_price' => $value['price'],
                                'sub_price' => $value['price'] * $value['count']
                            ]);
                        $productId = $value['id'];
                        $count = $value['count'];
                        ProductStock::where('product_id', $productId)->update(['stock_quantity' => DB::Raw("stock_quantity - $count")]);
                    }
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e);
        }
        return response()->json($message);
    }

    public function invoiceOrder() {
        $status = 200;
        $order = Order::with('orderItems.proName')
                ->where('customer_id' , Auth::user()->id)
                ->first();
        return response()->json($order, $status);
    }

    public function invoiceOrderPdf($id) {
        $status = 200;
        $order = Order::with('orderItems.proName')
                ->where('id' , $id)
                //->where('customer_id' , Auth::user()->id)
                ->first();
       // dd($order);
        //return view('invoice');
        $pdf = PDF::loadView('invoice',  ['order' => $order]);
        return $pdf->download('invoice.pdf');

       // return response()->json($order, $status);
    }

    public function customerOrderlist() {
        $status = 200;
        $orders = Order::with('orderOwner')
                ->where('customer_id' , Auth::user()->id)
                ->latest()->limit(10)->get();

        return response()->json($orders, $status);
    }

    public function viewOrderlist($id) {
        $status = 200;
        $order = Order::with('orderItems.proName')
                ->where('id' , $id)
                ->where('customer_id' , Auth::user()->id)
                ->first();

        return response()->json($order, $status);
    }
}
