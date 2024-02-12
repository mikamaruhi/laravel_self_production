<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallHistory extends Model
{
    use HasFactory;

    protected $table = 'call_histories';

    // Mass Assignmentで使用するフィールド
    protected $fillable = [
        'property_id',            // 物件ID
        'property_name',          // 物件名
        'receiver_assigned_to',   // 受電指名先担当者
        'handler',                // 対応者
        'item',                   // 項目種別
        'content',                // 内容
        'request_method'          // 対応依頼
    ];

    // リレーションシップ（もし必要なら）
    // public function user() {
    //     return $this->belongsTo(User::class);
    // }

    // モデルのその他のメソッド（もし必要なら）
}




