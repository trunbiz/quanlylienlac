<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class usersModel extends Model
{
    //
    protected $table='users';
    const GROUP_USER = [
      1 => 'admin',
      2 => 'Creator',
      3 => 'Người dùng',
    ];
    protected $fillable = [
      'group_id',
      'username',
      'full_name',
      'email',
      'phone',
      'city',
      'address',
      'password',
      'lever',
      'status',
      'avatar',
    ];

    public function listAll()
    {
        $item=usersModel::orderBy('created_at','DESC')->get();
        return $item;
    }

    public function getListAll($params)
    {
        $query = usersModel::query();
        if (!empty($params['search'])) {
            $query->where('username', 'like', '%' . $params['search'] . '%')
                ->orWhere('email', 'like', '%' . $params['search'] . '%')
                ->orWhere('phone', 'like', '%' . $params['search'] . '%')
                ->orWhere('full_name', 'like', '%' . $params['search'] . '%');
        }
        return $query->paginate();
    }
    public function addItem(Request $request)
    {
        try{
            $item= new usersModel();
            $item->username=$request->username;
            $item->email=$request->email;
            $item->phone=$request->phone;
            $item->city=$request->city;
            $item->address=$request->address;
            $item->password=bcrypt($request->password);
            $item->lever=isset($request->lever)?$request->lever:1;
            $item->status=$request->status;
            if($request->hasFile('img'))
            {
                $filename=$request->img->getClientOriginalName();
                $item->img=$filename;
                $request->img->move('public/media',$filename);
            }
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
        $item=usersModel::find($id);
        return $item;
    }
    public function updateItem(Request $request, $id)
    {
        try{
            $item=usersModel::find($id);
            $item->username=$request->username;
            $item->email=$request->email;
            $item->phone=$request->phone;
            $item->city=$request->city;
            $item->address=$request->address;
            $item->password=bcrypt($request->password);
            $item->lever=isset($request->lever)?1:0;
            $item->status=$request->status;
            if($request->hasFile('img'))
            {
                $filename=$request->img->getClientOriginalName();
                $item->img=$filename;
                $request->img->move('public/media',$filename);
            }
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
            usersModel::destroy($id);
            return true;
        }catch (Exception $ex)
        {
            report ($ex);
            return false;
        }
    }
}
