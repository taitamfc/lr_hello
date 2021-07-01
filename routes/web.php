<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ App\Http\Controllers\Website\HomeController::class,'index' ])->name('Home');
Route::get('/san-pham', [ App\Http\Controllers\Website\SanPhamController::class,'index' ]);
Route::get('/chi-tiet-san-pham/{id}', [ App\Http\Controllers\Website\SanPhamController::class,'show' ]);
Route::get('/dang-nhap', [ App\Http\Controllers\Website\NguoiDungController::class,'login' ])->name('login');
Route::post('/post-dang-nhap', [ App\Http\Controllers\Website\NguoiDungController::class,'postLogin' ])->name('postLogin');

Route::get('/tai-khoan', [ App\Http\Controllers\Website\NguoiDungController::class,'index' ]);

Route::get('/dang-ky', [ App\Http\Controllers\Website\NguoiDungController::class,'register' ])->name('register');
Route::post('/post-dang-ky', [ App\Http\Controllers\Website\NguoiDungController::class,'postRegister' ])->name('postRegister');


//gio hang
Route::get('/gio-hang', [ App\Http\Controllers\Website\GioHangController::class,'index' ])->name('cart.index');
Route::get('/add-to-cart/{product_id}', [ App\Http\Controllers\Website\GioHangController::class,'add_to_cart' ])->name('cart.add');

Route::get('/admin',[App\Http\Controllers\Admin\SanPhamController::class,'abc']);
Route::group(['prefix' => 'admin'], function () {
    
    Route::get('', [ App\Http\Controllers\Admin\HomeController::class,'index' ]);
    Route::resource('binh-luan',App\Http\Controllers\Admin\BinhLuanController::class);
    Route::resource('chuyen-muc',App\Http\Controllers\Admin\ChuyenMucController::class);
    Route::resource('don-hang',App\Http\Controllers\Admin\DonHangController::class);
    Route::resource('nguoi-dung',App\Http\Controllers\Admin\NguoiDungController::class);

    Route::get('/san-pham/abc',[App\Http\Controllers\Admin\SanPhamController::class,'abc']);
    Route::resource('san-pham',App\Http\Controllers\Admin\SanPhamController::class);
    

});

Route::get('doi-ngon-ngu/{locale}', function ($locale) {
    session(['lang'=>$locale]);
    return redirect()->route('Home');
});

// Route::get('hello', function () {
//     return view('admin.students.list');
// });

// Route::get('khach-hang', function () {
//     return view('khach_hang.index');
// });
// Route::get('them-khach-hang', function () {
//     return view('khach_hang.add');
// });
// Route::get('xem-khach-hang/{id}/{name}', function ( $id_khachhang, $ten_kh ) {
//     $params = [
//         'id'        => $id_khachhang,
//         'ten_kh'    => $ten_kh,
//     ];
//     return view('khach_hang.view',compact('id_khachhang','ten_kh'));

// })->where( [ 
//     //'id' => '[0-9]+',
//     //'name' => '[a-z\-]+',
// ] );

// Route::get('sua-khach-hang', function ( ) {
//     return view('khach_hang.edit');
// });
// Route::get('xoa-khach-hang', function () {
//     return view('khach_hang.delete');
// });


// Route::post('xuly-khach-hang', function ( Request $request ) {
//     dd( $request->ten );
// });

// Route::put('/cap-nhat-khach-hang/{id_khachhang}/group/{nhom_khachhang}', function ( $id_khachhang, $nhom_khachhang, Request $request ) {
//     echo '<br> id_khachhang :'. $id_khachhang;
//     echo '<br> nhom_khachhang :'. $nhom_khachhang;
//     die();
// });

// Route::delete('xu-ly-xoa-khach-hang', function ( Request $request ) {
//     dd( $request->all() );
// });

// //đường dẫn vừa có thể GET vừa POST
// Route::match(['get', 'post'], '/add-khach-hang-123', function ( Request $request ) {
//     if( $request->method() == "POST" ){
//         dd( $request->all() );
//     }
//     return view('khach_hang.add');
// })->name('khachhang.add');

// //GET POST PUT DELETE
// Route::any('foo', function () {
//     return 'Hello World';
// });



// Route::get('dang-nhap', function ( ) {
//     echo 'Bạn đang ở trang đăng nhập';
// })->name('login');
// //Người dùng phải đăng nhập
// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/backend', function () {
// // User đăng nhập mới vào được backend
//     });
//     Route::get('user/profile', function () {
// // User đăng nhập mới vào được trang cá nhân
//     });
// });

// //http://127.0.0.1:8000/admin/movies
// Route::group(['prefix' => 'admin'], function () {
//     //phim
//     Route::get('movies', function ( ) {
//         echo 'Bạn đang ở trang quản lý phim';
//     });
// });

// /*  
// 127.0.0.1:8000/tasks/index
// 127.0.0.1:8000/tasks/add
// 127.0.0.1:8000/tasks/edit/123
// */
// Route::group(['prefix' => 'tasks'], function () {
//     //danh sách tasks
//     Route::get('index', [ TaskManager::class,'index' ]);
//     //thêm mới task
//     Route::get('add', [ TaskManager::class,'add' ]);

//     //chỉnh sửa task
//     Route::get('edit/{id}', [ TaskManager::class,'edit' ]);
// });

// /*  
// 127.0.0.1:8000/sinhvien/index
// 127.0.0.1:8000/sinhvien/add
// 127.0.0.1:8000/sinhvien/edit/123
// 127.0.0.1:8000/quan-ly-sinh-vien
// */

// Route::group(['prefix' => 'sinhvien'], function () {
//     //127.0.0.1:8000/sinhvien/index
//     Route::get('index', [ SinhVienController::class,'index' ]);

//     //127.0.0.1:8000/sinhvien/add
//     Route::get('add', [ SinhVienController::class,'add' ]);

//     Route::post('save', [ SinhVienController::class,'save' ])->middleware('checkAge');

//      //127.0.0.1:8000/sinhvien/add
//     Route::get('edit/{id}', [ SinhVienController::class,'edit' ]);
// });

// //127.0.0.1:8000/quan-ly-sinh-vien
// //Route::get('quan-ly-sinh-vien', [ SinhVienController::class,'index' ])->middleware('auth');

// Route::get('8-minutes',[ SinhVienController::class,'index' ])->name('x8');


// Route::get('dang-ky-vip',AdminController::class);



// //OrdersController
// Route::resource('orders',OrdersController::class);
