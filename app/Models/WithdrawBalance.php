<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawBalance extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function userPaymentWithdrawRequest()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
