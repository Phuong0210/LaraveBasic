<?php

namespace App\Http\Controllers;
Use Alert;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\File;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //hiện thị ra toàn bộ sản phẩm
        $cars=Car::all();
        return view('car-list',['cars'=>$cars]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()//thêm data store để lưu lại
    {
        return view('car-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestuest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = '';
        
        if($request -> hasFile('image')){
            $this->validate($request,[
                'image' =>'mimes:jpg,png,jpeg|max:2048',
            ],[
                'image.mimes'=>'Chỉ chấp nhận files ảnh',
                'image.max' => 'Chỉ chấp nhận files ảnh dưới 2Mb',

            ]);
            $file =$request ->file(('image'));
            $name = time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('image');
            $file -> move($destinationPath, $name);
        }
        $this->validate($request,[
            'description'=>'required', 
            'model'=>'required',
            'produced_on'=>'required',
        ],[
            'description.required' =>'Bạn chưa nhập mô tả',
            'model.required' =>'Bạn chưa nhập model',
            'produced_on.required' =>'Bạn chưa nhập ngày sản xuất',
            'produced_on.date' =>'Cột produced_on phải là kiểu ngày!'
        ]);
        $car=new Car();
        $car->description=$request->description;
        $car->model=$request->model;
        $car->produced_on=$request->produced_on;
        $car->image=$name;
        $car->save();

        return redirect()->route('cars.index')->with('success', 'Bạn đã thêm mới thành công');
    }
    

    /**
     * Display the specified resource. Request=$_POST
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car=Car::find($id);
       // $car=Car::all();
        return view('car-list',['car'=>$car]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car=Car::find($id);
        return view('car-edit',['car'=>$car]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestuest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $name = '';
        
        if($request -> hasFile('image')){
            $this->validate($request,[
                'image' =>'mimes:jpg,png,jpeg|max:2048',
            ],[
                'image.mimes'=>'Chỉ chấp nhận files ảnh',
                'image.max' => 'Chỉ chấp nhận files ảnh dưới 2Mb',

            ]);
            $file =$request ->file(('image'));
            $name = time().'_'.$file->getClientOriginalName();
            $destinationPath=public_path('image');
            $file -> move($destinationPath, $name);
        }
        $this->validate($request,[
            'description'=>'required', 
            'model'=>'required',
            'produced_on'=>'required',
        ],[
            'description.required' =>'Bạn chưa nhập mô tả',
            'model.required' =>'Bạn chưa nhập model',
            'produced_on.required' =>'Bạn chưa nhập ngày sản xuất',
            'produced_on.date' =>'Cột produced_on phải là kiểu ngày!'
        ]);
        $car=Car::find($id);
        $car->description=$request->description;
        $car->model=$request->model;
        $car->produced_on=$request->produced_on;
       // $car->mf_id=$request->mf_id;
        if($name==''){
            $name=$car->image;
        }
        $car->image=$name;
        $car->save();

        return redirect()->route('cars.index')->with('success', 'Bạn đã cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $car = Car::find($id);
        $imgLink = public_path('image//').$car->image; 
            
        if(File::exists($imgLink)) {
            File::delete($imgLink);
        }
        $car->delete();
            
        
        return redirect()->route('cars.index')->with('success', 'Bạn đã xóa thành công');
    }
}
