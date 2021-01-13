<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Model\Backend\Customer;
use App\Model\Backend\CustomerAddress;
use App\Model\Backend\GeneralSetting;
use App\Model\Country;
use App\Model\District;
use App\Model\Division;
use App\Model\Order;
use App\Model\OrderAddress;
use App\Model\OrderProduct;
use Illuminate\Http\Request;
use Hash;
use Validator;
use Auth;
use DB;

class CustomerController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $data = new Customer;
        $requested_data = $request->all();
        $validate = Validator::make($request->all(), $data->validation());
        if ($validate->fails()) {
            $response=[ 'status'=> 400, 'errors'=> $validate->errors() ];
        } else {
            $requested_data['password'] = Hash::make($request->password);
            $data->fill($requested_data)->save();
            $response=['status'=>200, 'data'=> $data];
        }
        return response()->json($response);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $data = new Customer;
        $validate = Validator::make($request->all(), ['email'=> 'required|email', 'password' => 'required']);
        if ($validate->fails()) {
            $response = [ 'status'=> 400, 'errors'=> $validate->errors() ];
        } else {
            if (Auth::guard('customer')->check()) {
                $response = [ 'status' => 200, 'data'=> Auth::guard('customer')->user() ];
            }
            else {
                $credentials = $request->only('email', 'password');
                if (Auth::guard('customer')->attempt($credentials, $request->remember)) {
                    $response = [ 'status' => 200, 'data'=> Auth::guard('customer')->user() ];
                } else {
                    $response = [ 'status'=> 400, 'errors'=> [0 => 'Email or Password wrong'] ];
                }
            }
        }
        return response()->json($response);
    }

    public function user_info() {
        if (!Auth::guard('customer')->check()) {
            return response()->json(['status' => 200, 'data' => false]);
        } else {
            $addresses = CustomerAddress::where('customer_id', Auth::guard('customer')->user()->id)->first();
            return response()->json(['status' => 200, 'data' => Auth::guard('customer')->user(), 'addresses' => $addresses]);
        }
    }

    public function logout(){
        Auth::guard('customer')->logout();
        return response()->json(['status' => 200, 'data' => false]);
    }

    public function update_profile(Request $request) {
        $data = Customer::findOrFail(Auth::guard('customer')->user()->id);
        $data->fill($request->all())->save();

        return response()->json(['status' => 200, 'data' => Auth::guard('customer')->user()]);
    }

    public function address() {
        $data['country'] = Country::get();
        $data['division'] = Division::get();
        $data['district'] = District::get();

        return response()->json(['status' => 200, 'data' => $data]);
    }

    public function customer_address() {
        $data = CustomerAddress::with(['billing_country', 'billing_division', 'billing_district','shipping_country', 'shipping_division', 'shipping_district'])
                                ->where('customer_id', Auth::guard('customer')->user()->id)
                                ->first();

        return response()->json(['status' => 200, 'data' => $data]);
    }

    public function customer_address_store(Request $request) {
        $data = CustomerAddress::where('customer_id', Auth::guard('customer')->user()->id)->first();
        if (!$data) {
            $data = new CustomerAddress;
        }

        $data->fill($request->all())->save();
        return response()->json(['status' => 200, 'data' => $this->customer_address()]);
    }

    public function confirm_order(Request $request) {
        $requested_data = $request->all();
        $requested_data['cart'] = \Cart::getContent()->toArray();
        try {
            DB::beginTransaction();

            $order = new Order;
            $order_array = [
                'customer_id' => Auth::guard('customer')->check() ? Auth::guard('customer')->user()->id : null,
                'order_no' => $this->order_id(),
                'total_count' => \Cart::getTotalQuantity(),
                'total_price' => \Cart::getTotal(),
                'shipping_charge' => 0,
                'order_status' => 0
            ];
            $order->fill($order_array)->save();

            $order_address = new OrderAddress;
            $order_address_array = array_merge($request->addresses, $request->user_info);
            $order_address_array['order_id'] = $order->id;
            $order_address->fill($order_address_array)->save();

            $order_product = array();
            foreach (\Cart::getContent() as $key => $value) {
                $order_product [] = [
                    'order_id' => $order->id,
                    'product_id' => $value->attributes->product_id,
                    'ram_id' => isset($value->attributes->ram) ? $value->attributes->ram : null,
                    'hard_drive_id' => isset($value->attributes->hard_drive) ? $value->attributes->hard_drive : null,
                    'graphics_card_id' => isset($value->attributes->graphics_card) ? $value->attributes->graphics_card : null,
                    'processor_id' => isset($value->attributes->processor) ? $value->attributes->processor : null,
                    'price' => $value->price,
                    'quantity' => $value->attributes->product_id,
                ];
            }
            OrderProduct::insert($order_product);
            \Cart::clear();
            DB::commit();
            return response()->json($order);
        } catch (Exception $e) {
            DB::rollBack();
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            dd($e);
        }
    }

    public function invoice($id) {
        $data['data'] = Order::with(['product.product','address.billing_country', 'address.billing_division', 'address.billing_district','address.shipping_country', 'address.shipping_division', 'address.shipping_district'])
                                ->where('order_no', $id)
                                ->first();
        $data['setting'] = GeneralSetting::first();
        return response()->json($data);
    }

    public function order_id() {
        $make_order_num = Order::latest()->first();
        $year = date('y');
        $month = date('m');

        if (strlen(date('d')) == 1)
            $date = '0'.date('d');
        else
            $date = date('d');

        if (!empty($make_order_num)) {
            $code_no = (int) $make_order_num->id + 1;

            if (strlen($code_no) == 1)
                $code_no = '00'.$code_no;

            if (strlen($code_no) == 2)
                $code_no = '00'.$code_no;

            if (strlen($code_no) == 3)
                $code_no = '0'.$code_no;
        }
        else
            $code_no = 0001;

        $make_product_num_code = $year . $month . $date . $code_no;

        return $make_product_num_code;
    }
}
