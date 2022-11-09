<?php
/**
 * Created by PhpStorm.
 * User: trun
 * Date: 11/10/2022
 * Time: 12:26 AM
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class couponModel extends Model
{
    protected $table = 'coupons';
    protected $fillable = [
      'title',
      'code',
      'quantity',
      'discount_amount',
      'active'
    ];
}
