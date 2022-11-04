<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\cart_productModel;
use App\Model\cartModel;
use Illuminate\Http\Request;

class cartController extends Controller
{
    //
    private $cart, $cart_product;
    public function __construct()
    {
        $this->cart= new cartModel();
        $this->cart_product =new cart_productModel();
    }
    public function listAll()
    {
        $data['items']=$this->cart->listCart();
        return view('admin.cart',$data);
    }
    public function detailItem($id)
    {
        $data['itemCart']=$this->cart->detailCart($id);
        $data['items']=$this->cart_product->productCart($id);
        return view('admin.detailCart',$data);
    }
    public function deleteItem($id)
    {
        $this->cart->deleteItem($id);
        return back();
    }
    public function updateStatus($id,$status)
    {
        $this->cart->updateStatus($id,$status);
        return back();
    }
}
