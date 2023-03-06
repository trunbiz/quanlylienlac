<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\blogModel;
use App\Model\cartModel;
use App\Model\productModel;
use App\Model\usersModel;
use Illuminate\Http\Request;
use Auth; //use thư viện auth

class indexController extends Controller
{
    //
    private $user,$product,$cart,$blog;
    public function __construct()
    {
        $this->product=new productModel();
        $this->cart=new cartModel();
        $this->blog=new blogModel();
        $this->user=new usersModel();
    }
    public function indexShow()
    {
        $data['countproduct']=count($this->product->listAll());
        $data['countcart']=count($this->cart->listAll());
        $data['countblog']=count($this->blog->listAll());
        $data['countuser']=count($this->user->listAll());
        return view('admin.index',$data);
    }
    public function showLogin()
    {
        return view('admin.login');
    }
    public function checkLogin(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if ($request->remember == trans('remember.Remember Me')) {
            $remember = true;
        } else {
            $remember = false;
        }
        //kiểm tra trường remember có được chọn hay không

        if (Auth::attempt($arr)) {

            return redirect()->intended('admin');
        } else {

            return redirect()->intended('login');
        }
    }
    public function logout()
    {
        Auth::logout();
        Return redirect()->intended('login');
    }
    public function showRegister()
    {
        return view('front.register');
    }
    public function register(Request $request)
    {
        $this->user->addItem($request);
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        Auth::attempt($arr);
        if(Auth::user()->lever==1)
        {
            return redirect()->intended('/');
        }
        else{
            return redirect()->intended('admin');
        }

    }

    public function profileInfo(Request $request)
    {
        $data['item'] = usersModel::find(\Illuminate\Support\Facades\Auth::user()->id);
        return view('admin.profile', $data);
    }

    public function profileUpdate(Request $request)
    {
        $request = $request->all();
        $userInfo = usersModel::find($request['id']);
        $userInfo->email = $request['email'] ?? null;
        $userInfo->phone = $request['phone'] ?? null;
        $userInfo->city = $request['city'] ?? null;
        $userInfo->address = $request['address'] ?? null;
        $userInfo->email = $request['email'] ?? null;
        if (!empty($request['password']))
        {
            $userInfo->password = bcrypt($request['password']) ?? null;
        }
        if(!empty($request['img']))
        {
            $filename=$request['img']->getClientOriginalName();
            $userInfo->img=$filename;
            $request['img']->move('public/media',$filename);
        }
        $userInfo->save();
        $data['item'] = $userInfo;
        return view('admin.profile', $data);
    }
}
