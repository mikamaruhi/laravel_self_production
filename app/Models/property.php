<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = 'properties';

    // // 物件は担当者がついている（所属）
    // public function user(){
    //     return $this->belongsTo(User::class);
    // }


}
