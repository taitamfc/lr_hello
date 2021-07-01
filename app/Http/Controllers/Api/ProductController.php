<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Dung cho API lay tat ca
        $items = Product::all();
        return response()->json($items); 

        //
        echo __METHOD__;
        die();
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //DUng cho API tao


        $validate_messages  = [
            'required' => 'Vui lòng nhập :attribute',
            'unique'   => 'Giá trị đã tồn tại', 
        ];

        $validate_options = [
            'name'  => [
                'required','unique:products'
            ],
            'price' => [
                'required'
            ]
        ];

        $validator = Validator::make(
            $request->all(),
            $validate_options,
            $validate_messages
        );

  
        if( $validator->fails() ){
            $return['errors'] = $validator->messages()->toArray();
            $return['status'] = 0;
            //Tra ve thong bao loi
        }else{
            $product        = new Product();
            $product->name  = $request->name;
            $product->price = $request->price;

            $saved = $product->save();
            if( $saved ){
                $return['msg'] = 'Đã lưu thành công';
                $return['status'] = 1;
            }else{
                $return['msg'] = 'Không thể lưu';
                $return['status'] = 0;
            }
            
            //Luu vao CSDL
        }
        return response()->json( $return,201 ); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Dung cho API xem chi tiet
        $item = Product::find($id);
        return response()->json($item); 

        echo __METHOD__;
        die();
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
        //Dung cho API Chinh sua
        $product = Product::find($id);
        $product->name = $request->name;

        $saved = $product->save();
        if( $saved ){
            $return['msg'] = 'Đã lưu thành công';
            $return['status'] = 1;
        }else{
            $return['msg'] = 'Không thể lưu';
            $return['status'] = 0;
        }

        return response()->json( $return,200 ); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Product::destroy($id);
        if( $deleted ){
            $return['status']   = 1;
        }else{
            $return['status']   = 0;
            $return['msg']      = 'Không thể xóa';
        }

        return response()->json( $return ); 
        
    }
}
