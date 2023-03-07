<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\TeamModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    //
    protected $temModel;
    public function __construct()
    {
        $this->temModel = new TeamModel();
    }
    public function index(Request $request)
    {
        $request = $request->all();
        $data['items'] = $this->temModel->listAll($request);
        return view('admin.team', $data);
    }

    public function showStore(Request $request)
    {
        return view('admin.storeTeam');
    }

    public function store(Request $request)
    {
        $request = $request->all();
        $data = [
            'title' => $request['title'] ?? null,
            'code' => $request['code'] ?? Str::random(6),
            'description' => $request['description'] ?? null,
        ];
        TeamModel::create($data);
        return redirect('admin/teams');
    }
    public function showEdit(Request $request)
    {
        $request = $request->all();
        $data['item'] = TeamModel::find($request['id']);
        return view('admin.storeTeam', $data);
    }
    public function update(Request $request)
    {
        $request = $request->all();

        $data = [
            'title' => $request['title'] ?? null,
            'code' => $request['code'] ?? Str::random(6),
            'description' => $request['description'] ?? null,
        ];
        TeamModel::find($request['id'])->update($data);
        return redirect('admin/teams');
    }
    public function deleteItem(Request $request)
    {
        $request = $request->all();
        TeamModel::find($request['id'])->delete();
        return redirect('admin/teams');
    }
}
