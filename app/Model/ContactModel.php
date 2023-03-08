<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    //
    protected $table = 'contacts';
    protected $fillable = [
        'team_id',
        'full_name',
        'address',
        'phone',
        'word_phone',
        'fax',
        'email',
        'avatar',
        'birthday',
    ];

    public function listAll($params)
    {
        $query = ContactModel::query();
        if (!empty($params['phone'])) {
            $query->where('phone', 'like', '%' . $params['phone'] . '%')
                ->orWhere('word_phone', 'like', '%' . $params['phone'] . '%')
                ->orWhere('fax', 'like', '%' . $params['phone'] . '%');
        }
        if (!empty($params['full_name'])) {
            $query->where('full_name', 'like', '%' . $params['full_name'] . '%');
        }
        return $query->paginate();
    }

    public function getAll($params)
    {
        $query = ContactModel::query();
        if (!empty($params['phone'])) {
            $query->where('phone', 'like', '%' . $params['phone'] . '%')
                ->orWhere('word_phone', 'like', '%' . $params['phone'] . '%')
                ->orWhere('fax', 'like', '%' . $params['phone'] . '%');
        }
        if (!empty($params['full_name'])) {
            $query->where('full_name', 'like', '%' . $params['full_name'] . '%');
        }
        return $query->get();
    }

    public function team()
    {
        return $this->hasOne(TeamModel::class, 'id', 'team_id');
    }

}
