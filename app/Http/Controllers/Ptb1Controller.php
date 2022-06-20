<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class Ptb1Controller extends Controller
{


    public function Giaiptb1 (Request $req ){
//         //check lỗi
//         // $req->validate([
//         //     'a' => 'required',
//         //     'b' => 'required',
//         // ],[
//         //     'a.required' => 'He so a phai la so',
//         //     'b.required' => 'He so b phai la so',
//         // ]);
//         // $validator = Validator::make($req->all(), [
//         //     'a' => 'required|unique:posts|max:255',
//         //     'b' => 'required',
//         // ]);
 
//         // if ($validator->fails()) {
//         //     return redirect('post/create')
//         //                 ->withErrors($validator)
//         //                 ->withInput();
//         // }
$validator = Validator::make($req->all(), [
    'a' => 'required|integer',
    'b' => 'required|integer',
],[
    'a.required' => 'nhập đi',
    'b.required' => 'nhập đi',
    'a.integer' => 'A phải là số nguyên',
    'b.integer' => 'A phải là số nguyên',
]
);

if ($validator->fails()) {
    $errors = $validator->errors();
    return view('ptb1') ->withErrors($errors);
                
}
        
        $a=$req->input('a');
        $b=$req->input('b');
        if($a==0)
            if($b==0)
                $kq="PT VS nghiệm";
            else $kq="PT VN"  ;  
        else $kq="PT có Nghiệm X=".round(-$b/$a,1);
        return view('ptb1',['kq'=>$kq,'a'=>$a,'b'=>$b]);
}
}
// public function message()
//     {
//         return [
//             'a.integer' => 'A phải là số nguyên',
//             'b.integer' => 'A phải là số nguyên',
//         ];
//     }

//     public function Giaiptb1(Request $request)
//     {
//         $validated = $request->validate([
//             'a' => 'required|integer',
//             'b' => 'required|integer',
//         ],$this->message());
//         $a = $request->query('a');
//         $b = $request->query('b');
//         if($a==0)
//              if($b==0)
//                  $kq="PT VS nghiệm";
//              else $kq="PT VN"  ;  
//          else $kq="PT có Nghiệm X=".round(-$b/$a,1);
//          return view('ptb1',['kq'=>$kq,'a'=>$a,'b'=>$b]);
// }}