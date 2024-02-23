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
            $properties = Property::orderBy('property_id', 'asc')->paginate(10);
            return view('property.propertysheet', compact('properties'));
        }

        // 物件検索機能
        public function search(Request $request)
        {
            $keyword = $request->input('keyword');
            // キーワードを使って検索処理を行う
            $results = Property::where('property_name', 'LIKE', "%{$keyword}%")->get();
            
            // 検索結果をビューに渡す
            return view('property.propertysearch', compact('results'));
        }

        
        // 物件詳細画面に遷移
        public function detailproperty(Request $request,$id)
        {
        
            $property = DB::table('properties')->where('property_id', $id)->first();
        
            return view('property.propertychange', ['property' => $property]);
        }   

        //詳細画面で削除登録
        public function destroy($id)
        {
        
        // $idを使用して該当の削除処理を実装する
            $property = Property::find($id);
    
        // 削除処理を実行する
            $property->delete();
    
            return redirect('items/propertysheet');
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
            // 'property_id' => 'required|integer|min:0|exists:properties,property_id',
            'property_id' => 'required|integer|min:0|unique:properties,property_id,' . $request->property_id,
            'property_name' => 'required|string|max:255',
            'responsible_id' => 'required|string|max:100',
            'responsible_name' => 'required|string|max:100',
            'accounting_person_name' => 'required|string',
        ]);

        try {
            Property::create($validatedData);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['property_id' => 'すでに使用されているproperty_idです。別の値を入力してください。']);
        }
        //  // フロント担当者のみを取得するクエリを追加
        //  $department1Users = User::where('department', 'department1')->get();
        
        // バリデーションが通ったデータで登録
            Property::create($validatedData);

        // 登録後、適切なリダイレクト先へ
            return redirect('items/propertysheet');
        // ->with(['department1Users' => $department1Users]);
    }

}
