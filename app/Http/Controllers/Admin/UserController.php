<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\usersModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new usersModel();
    }

    public function index(Request $request)
    {
        $request = $request->all();
        $data['items'] = $this->userModel->getListAll($request);
        return view('admin.users', $data);
    }

    public function showStore(Request $request)
    {
        $request = $request->all();
        $data['groupUser'] = usersModel::GROUP_USER;
        return view('admin.storeUser', $data);
    }

    public function store(Request $request)
    {
        $request = $request->all();
        $data = [
            'group_id' => $request['group_id'] ?? null,
            'username' => $request['username'] ?? null,
            'email' => $request['email'] ?? null,
            'phone' => $request['phone'] ?? null,
            'city' => $request['city'] ?? null,
            'address' => $request['address'] ?? null,
            'password' => $request['password'] ?? null,
            'status' => $request['status'] ?? null,
        ];
        if (!empty($request['password'])) {
            $data['password'] = bcrypt($request['password']) ?? null;
        }
        if (!empty($request['img'])) {
            $filename = $request['img']->getClientOriginalName();
            $data['img'] = $filename;
            $request['img']->move('public/media', $filename);
        }
        usersModel::create($data);
        return redirect('admin/users');
    }

    public function showEdit(Request $request)
    {
        $request = $request->all();
        $data['item'] = usersModel::find($request['id']);
        $data['groupUser'] = usersModel::GROUP_USER;
        return view('admin.storeUser', $data);
    }

    public function update(Request $request)
    {
        $request = $request->all();
        $data = [
            'group_id' => $request['group_id'] ?? null,
            'username' => $request['username'] ?? null,
            'email' => $request['email'] ?? null,
            'phone' => $request['phone'] ?? null,
            'city' => $request['city'] ?? null,
            'address' => $request['address'] ?? null,
            'password' => $request['password'] ?? null,
            'status' => $request['status'] ?? null,
        ];
        if (!empty($request['password'])) {
            $data['password'] = bcrypt($request['password']) ?? null;
        }
        if (!empty($request['img'])) {
            $filename = $request['img']->getClientOriginalName();
            $data['img'] = $filename;
            $request['img']->move('public/media', $filename);
        }
        usersModel::find($request['id'])->update($data);
        return redirect('admin/users');
    }

    public function deleteItem(Request $request)
    {
        $request = $request->all();
        usersModel::find($request['id'])->delete();
        return redirect('admin/users');
    }
}
