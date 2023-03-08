<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\ContactModel;
use App\Model\TeamModel;
use App\Services\ConvenienceService;
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
        $data['items'] = $this->contactModel->listAll($request);
        return view('admin.contact', $data);
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
        return redirect('admin/contacts');
    }
    public function showEdit(Request $request)
    {
        $request = $request->all();
        $data['teams'] = TeamModel::all();
        $data['item'] = ContactModel::find($request['id']);
        return view('admin.storeContact', $data);
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

    public function downloadExcel(Request $request)
    {
        $request = $request->all();
        $items = $this->contactModel->getAll($request);

        $data = [];
        $header = $this->getHeader();
        $convenienceService = new ConvenienceService();
        foreach ($items as $item)
        {
            $data[] = [
                'team_title' => $item->team->title,
                'email' => $item->email,
                'full_name' => $item->full_name,
                'birthday' => $item->birthday,
                'phone' => $item->phone,
                'word_phone' => $item->word_phone,
                'fax' => $item->fax
            ];
        }

        echo $convenienceService->writeDataToCsv($header, $data);
        die();
    }

    public function getHeader()
    {
        return [
          'team_title' => 'Phòng ban',
          'email' => 'Email',
          'full_name' => 'Họ tên',
          'birthday' => 'Ngày sinh',
          'phone' => 'Số điện thoại',
          'word_phone' => 'Số điện thoại làm việc',
          'fax' => 'Fax'
        ];
    }
}
