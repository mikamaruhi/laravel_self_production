<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProController extends Controller
{
        // 物件一覧画面に遷移
        public function property()
        {
            $properties = Property::paginate(10);
            return view('property.propertysheet', compact('properties'));
        }

        
        // 物件詳細画面に遷移
        public function detailproperty(Request $request,$id)
        {
        
            $property = DB::table('properties')->where('property_id', $id)->first();
        
            return view('property.propertychange', ['property' => $property]);
        }   



        // 物件の登録画面に遷移
        public function propertyregister()
    {
        $users = User::all();
        return view('property.propertyregister', compact('users'));

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

        //  // フロント担当者のみを取得するクエリを追加
        //  $department1Users = User::where('department', 'department1')->get();
        
        // バリデーションが通ったデータで登録
        Property::create($validatedData);

        // 登録後、適切なリダイレクト先へ
        return redirect('items/propertysheet');
        // ->with(['department1Users' => $department1Users]);
    }

}
