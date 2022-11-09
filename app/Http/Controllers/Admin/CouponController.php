<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\couponModel;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    //
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $data['items'] = couponModel::all();
        return view('admin.coupons',$data);
    }

    public function storeItem(Request $request)
    {
        $request = $request->all();
        couponModel::create([
            'title' => $request['title'] ?? null,
            'code' => $request['code'] ?? null,
            'quantity' => $request['quantity'] ?? null,
            'discount_amount' => $request['discount_amount'] ?? null,
            'active' => $request['active'] ?? null,
        ]);
        return back();
    }

    public function updateItem(Request $request)
    {
        $request = $request->all();
        couponModel::where('id', $request['id'])->update([
            'title' => $request['title'] ?? null,
            'code' => $request['code'] ?? null,
            'quantity' => $request['quantity'] ?? null,
            'discount_amount' => $request['discount_amount'] ?? null,
            'active' => $request['active'] ?? null,
        ]);
        return redirect('admin/coupons');
    }

    public function deleteItem($id)
    {
        couponModel::find($id)->delete();
        return back();
    }
}
