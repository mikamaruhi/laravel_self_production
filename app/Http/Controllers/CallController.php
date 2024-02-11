<?php

namespace App\Http\Controllers;

use App\Models\CallHistory;
use Illuminate\Http\Request;

class Callcontroller extends Controller
{

    // 受電履歴一覧画面を表示
    public function index()
    {
        $callHistories = CallHistory::all();
        return view('item.index', compact('call_Histories'));
    }

    
}
