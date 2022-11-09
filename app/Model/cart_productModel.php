<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
class cart_productModel extends Model
{
    //
    protected $table='cart_product';
    public function listAll()
    {
        $item=cart_productModel::orderBy('created_at','DESC')->get();
        return $item;
    }
    public function addItem($request)
    {
        try{
            $item= new cart_productModel();
            $item->idcart=$request['idcart'];
            $item->idproduct=$request['idproduct'];
            $item->countsale=$request['countsale'];
            $item->pricesale=$request['pricesale'];
            $item->size=$request['size'];
            $item->color=$request['color'];
            $item->coupon_id=$request['coupon_id'];
            $item->save();
        }
        catch (Exception $ex){
            report($ex);
            return false;
        }


    }
    public function showItem($id)
    {
        $item=cart_productModel::find($id);
        return $item;
    }
    public function updateItem(Request $request, $id)
    {
        try{
            $item= new cart_productModel();
            $item->idcart=$request->idcart;
            $item->idproduct=$request->idproduct;
            $item->countsale=$request->countsale;
            $item->pricesale=$request->pricesale;
            $item->size=$request->size;
            $item->color=$request->color;
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
            cart_productModel::destroy($id);
            return true;
        }catch (Exception $ex)
        {
            report ($ex);
            return false;
        }
    }
    public function productCart($id)
    {
        $items=DB::table('cart')
            ->join('cart_product', 'cart.id', '=', 'cart_product.idcart')
            ->where('cart.id',$id)
            ->get();
        return $items;
    }

    public function infoProduct()
    {
        return $this->hasOne(productModel::class, 'id', 'idproduct');
    }

    public function infoCart()
    {
        return $this->hasOne(cartModel::class,'id', 'idcart');
    }
}
