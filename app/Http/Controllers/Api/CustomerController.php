<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Backend\CustomerAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function customer()
    {
        $status   = 200;
        dd($status);
        $customer = Auth::user()->load('customeraddress');
        return response()->json($customer, $status);
    }

    public function deliveryAddress(Request $request)
    {

        DB::beginTransaction();
        try {
            $checkUser = CustomerAddress::where('customer_id', Auth::user()->id)->first();

            if (empty($checkUser)) {
                $data = CustomerAddress::create($request->except('customer_id', 'sname', 'sphone', 'semail', 'sregion_id', 'scity_id', 'sarea_id', 'saddress') +
                    [
                        'customer_id' => Auth::user()->id,
                        'sname'       => $request->bname,
                        'sphone'      => $request->bphone,
                        'semail'      => $request->bemail,
                        'sregion_id'  => $request->bregion_id,
                        'scity_id'    => $request->bcity_id,
                        'sarea_id'    => $request->barea_id,
                        'saddress'    => $request->baddress,
                    ]);
            } else {
                $data = $checkUser->update($request->except('sname', 'sphone', 'semail', 'sregion_id', 'scity_id', 'sarea_id', 'saddress') +
                    [
                        'sname'      => $request->bname,
                        'sphone'     => $request->bphone,
                        'semail'     => $request->bemail,
                        'sregion_id' => $request->bregion_id,
                        'scity_id'   => $request->bcity_id,
                        'sarea_id'   => $request->barea_id,
                        'saddress'   => $request->baddress,
                    ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json($e);
        }
        return response()->json($checkUser);
    }

    public function cutomerProfileUpdate(Request $request)
    {
        $status = 200;
        $this->validate($request, [
            'email' => 'required|email|unique:users,email,' . Auth::id(),
        ]);

        $customer = Auth::user();
        $customer->update($request->all());

        return response()->json($customer, $status);
    }

    public function cutomerPasswordUpdate(Request $request)
    {
        $status = 200;
        $this->validate($request, [
            'old_password'          => 'required',
            'new_password'          => 'required|min:8',
            'password_confirmation' => 'required|same:new_password',
        ]);

        $data = $request->old_password;

        $customer = Auth::user();
        if (!\Hash::check($data, $customer->password)) {
            return response()->json('error');
        } else {
            $customer->password = bcrypt($request->new_password);
            $customer->save();
        }
        return response()->json($customer, $status);
    }

}
