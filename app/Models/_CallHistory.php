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
        'request_method',         // 対応依頼
        'result',                 // 結果
    ];

    // 削除されたデータを保存するテーブルとの関連を設定する
    public function deletedHistories()
    {
        return $this->hasMany(DeletedCallHistory::class, 'call_history_id');
    }



}




