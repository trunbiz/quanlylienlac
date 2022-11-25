<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class cartModel extends Model
{
    //
    protected $table='cart';
    public function listAll()
    {
        $item=cartModel::orderBy('created_at','DESC')->get();
        return $item;
    }
    public function addItem($iduser,$total,$status, $pay=null, $coupon_id = null)
    {
        try{
            $item= new cartModel();
            $item->iduser=$iduser;
            $item->total=$total;
            $item->status=$status;
            $item->pay=$pay;
            $item->coupon_id=$coupon_id;
            $item->save();
            return $item->id;
        }
        catch (Exception $ex){
            report($ex);
            return false;
        }
    }
    public function showItem($id)
    {
        $item=cartModel::find($id);
        return $item;
    }
    public function updateStatus($id,$status)
    {
        try{
            $item=cartModel::find($id);
            $item->status=$status;
            $item->save();
            return true;
        }catch (Exception $ex)
        {
            report($ex);
            return false;
        }
    }
    public function updateItem(Request $request, $id)
    {
        try{
            $item= new cartModel();
            $item->iduser=$request->iduser;
            $item->total=$request->total;
            $item->status=$request->status;
            $item->save();
            return true;
        }catch (Exception $ex)
        {
            report($ex);
            return false;
        }
    }
    public function deleteItem($id)
    {
        try{
            cartModel::destroy($id);
            return true;
        }catch (Exception $ex)
        {
            report ($ex);
            return false;
        }
    }
    public function listCart()
    {
        $items= DB::table('users')
            ->join('cart', 'users.id', '=', 'cart.iduser')
            ->get();
        return $items;
    }
    public function detailCart($id)
    {
        $item= DB::table('users')
            ->join('cart', 'users.id', '=', 'cart.iduser')
            ->where('cart.id',$id)->get();
        return $item;
    }
}
