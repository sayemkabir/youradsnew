<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function adCategory(){

        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function adClicks(){

        return $this->hasMany(UserAd::class,'ad_id','id');
    }

}
