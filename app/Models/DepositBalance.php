<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class DepositBalance extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function userDeposit()
    {

        return $this->belongsTo(User::class,'user_id','id');


    }
}
