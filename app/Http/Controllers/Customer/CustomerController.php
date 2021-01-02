<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Model\Backend\Customer;
use App\Model\Backend\CustomerAddress;
use App\Model\Country;
use App\Model\District;
use App\Model\Division;
use Illuminate\Http\Request;
use Hash;
use Validator;
use Auth;

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
            return response()->json(['status' => 200, 'data' => Auth::guard('customer')->user()]);
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
}
