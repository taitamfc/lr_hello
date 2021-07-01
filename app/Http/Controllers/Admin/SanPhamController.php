<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

use App\Rules\Uppercase;
use App\Rules\VNPhoneNumber;

use App\Models\Tag;
use App\Models\Product;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        //login user ID = 1
        Auth::loginUsingId(1);
    }

    public function index()
    {
        //kiểm tra quyền
        

        

        //lấy thông tin user đã đăng nhập
        $user = Auth::user();

        //lấy id user đã đăng nhập
        $id = Auth::id();

        //$this->authorize('viewAny');
        

        return view('admin.sanpham.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        return view('admin.sanpham.create',[
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        //thực hiện validate

        $validate_messages  = [
            'required' => 'Vui lòng nhập :attribute',
            'unique'   => 'Giá trị đã tồn tại', 
        ];

        $validate_options = [
            //'name'  => 'required|unique:products',
            'name'  => [
                'required','unique:products',new Uppercase
            ],
            'price' => [
                'required' , new VNPhoneNumber
            ]
        ];
        
        /*
        //tự động kiểm tra nếu dữ liệu chưa đúng thì chuyển về trang create
        $this->validate(
            $request,
            $validate_options,
            $validate_messages
        );
        */

        $validator = Validator::make(
            $request->all(),
            $validate_options,
            $validate_messages
        );
        //kiểm tra dữ liệu đã ok chưa
        if( $validator->fails() ){
            //return redirect('admin/san-pham/create')->withErrors($validator)->withInput();
            return redirect()->route('san-pham.create')
            ->withErrors($validator)
            // ->withErrors($validator,'custom_error_2')
            // ->withErrors($validator,'custom_error')
            ->withInput();
        }else{
            //lưu vào CSDL
            

            $product                = new Product();
            $product->name          = $request->name;
            $product->price         = $request->price;
            $product->description   = $request->description;

            $product->save();
            $product->tags()->attach( $request->tags );


            //$request->session()->flash('thong_bao', 'Lưu thành công');

            return redirect()->route('san-pham.index')->with('thong_bao', 'Lưu thành công');

        }


        


       if( $request->hasFile('image') ){
            $image = $request->file('image');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        
        $this->authorize('update', $product);
        
        $tags = Tag::all();

        $item = Product::find( $id );

        return view('admin.sanpham.edit',[
            'tags' => $tags,
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find( $id );
        $product->name          = $request->name;
        $product->price         = $request->price;
        $product->description   = $request->description;

        $product->save();

        //xóa toàn bộ kết quả của sản đó ở bảng trung gian
        $product->tags()->detach();

        //lưu dữ liệu vào bảng trung gian
        $product->tags()->attach( $request->tags );

        return redirect()->route('san-pham.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Product::destroy(id);
        if( $deleted ){
            $return['status']   = 1;
        }else{
            $return['status']   = 0;
            $return['msg']      = 'Không thể xóa';
        }
        
    }

    public function abc(){
        echo __METHOD__;
        die();
    }
}
