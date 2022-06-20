<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CalculateController extends Controller
{ 
    public function Calculator (Request $req ){
    $validator = Validator::make($req->all(), [
    'a' => 'required|numeric',
    'b' => 'required|numeric',
],[
    'a.required' => 'nhập đi',
    'b.required' => 'nhập đi',
    'a.numeric' => 'A phải là số ',
    'b.numeric' => 'B phải là số ',
]
);

if ($validator->fails()) {
    $errors = $validator->errors();
    return view('calculate') ->withErrors($errors);
                
}
        
        $a=$req->input('a');
        $b=$req->input('b');
        $check=$req->input('exampleRadios');
        switch ($check) {
            case 'Cong':
                # code...
                $kq = $a+$b;
                break;
            case 'Tru':
                $kq = $a-$b;
                break;
            case 'Nhan':
                $kq = $a*$b;
                break;
            case 'Chia':
                $kq = $a/$b;
                break;
            default:
                # code...
                $kq = 'Mời bạn chọn phép tính';
                break;
        }
        return view('calculate',compact('kq','a','b','check'));
    }
}


