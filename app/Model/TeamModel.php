<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TeamModel extends Model
{
    //
    protected $table = 'teams';
    protected $fillable = [
        'id',
        'title',
        'code',
        'description'
    ];

    public function listAll($params)
    {
        $query = TeamModel::query();
        if (!empty($params['search'])) {
            $query->where('title', 'like', '%' . $params['search'] . '%')
                ->orWhere('code', 'like', '%' . $params['search'] . '%');
        }
        return $query->paginate();
    }
}
