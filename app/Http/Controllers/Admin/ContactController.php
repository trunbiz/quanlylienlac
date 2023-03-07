<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\ContactModel;
use App\Model\TeamModel;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //

    protected $contactModel;
    public function __construct()
    {
        $this->contactModel = new ContactModel();
    }

    public function index(Request $request)
    {
        $request = $request->all();
        $data['contacts'] = $this->contactModel->listAll($request);
        return view('admin.index', $data);
    }

    public function showStore(Request $request)
    {
        $data['teams'] = TeamModel::all();
        return view('admin.storeContact', $data);
    }

    public function store(Request $request)
    {
        $request = $request->all();
        $data = [
            'team_id' => $request['team_id'] ?? null,
            'full_name' => $request['full_name'] ?? null,
            'address' => $request['address'] ?? null,
            'phone' => $request['phone'] ?? null,
            'word_phone' => $request['word_phone'] ?? null,
            'fax' => $request['fax'] ?? null,
            'email' => $request['email'] ?? null,
            'birthday' => $request['birthday'] ?? null,
        ];
        ContactModel::create($data);
        return back();
    }
    public function showEdit(Request $request)
    {
        $request = $request->all();
        $data['contact'] = ContactModel::find($request['id']);
        return view('admin.storeContact');
    }
    public function update(Request $request)
    {
        $request = $request->all();

        $data = [
            'team_id' => $request['team_id'] ?? null,
            'full_name' => $request['full_name'] ?? null,
            'address' => $request['address'] ?? null,
            'phone' => $request['phone'] ?? null,
            'word_phone' => $request['word_phone'] ?? null,
            'fax' => $request['fax'] ?? null,
            'email' => $request['email'] ?? null,
            'birthday' => $request['birthday'] ?? null,
        ];
        ContactModel::find($request['id'])->update($data);
        return redirect('admin/contacts');
    }
    public function deleteItem(Request $request)
    {
        $request = $request->all();
        ContactModel::find($request['id'])->delete();
        return redirect('admin/contacts');
    }
}
