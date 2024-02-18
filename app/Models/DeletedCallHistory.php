<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeletedCallHistory extends Model
{
    // テーブル名を指定
    protected $table = 'deleted_call_histories';

    protected $fillable = [
        'property_id',            // 物件ID
        'property_name',          // 物件名
        'receiver_assigned_to',   // 受電指名先担当者
        'handler',                // 対応者
        'item',                   // 項目種別
        'content',                // 内容
        'request_method',         // 対応依頼
        'result',                 // 結果
    ];

}