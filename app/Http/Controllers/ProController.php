<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class ProController extends Controller
{
        // 物件一覧画面に遷移
        public function property()
        {
            return view('property.propertysheet', compact('properties'));
        }

        
        // 物件詳細画面に遷移


        // 物件の登録画面に遷移
        public function propertyregister()
    {
        return view('property.propertyregister');
    }


        // 物件の登録

    public function propertyaddregister(Request $request)
    {
        // バリデーションを追加
        $validatedData = $request->validate([
            'property_id' => 'required|integer',
            'property_name' => 'required|string|max:255',
            'responsible_id' => 'required|string|max:100',
            'responsible_name' => 'required|string|max:100',
            'accounting_person_name' => 'required|string',
        ]);

        // バリデーションが通ったデータで登録
        Property::create($validatedData);

        // 登録後、適切なリダイレクト先へ
        return redirect('items/property');
    }

}
