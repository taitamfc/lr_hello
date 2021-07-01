<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Repositories\UserRepositoryInterface;

use App\Models\User;


class NguoiDungController extends Controller
{
    protected $_userRepository;
    public function __construct( UserRepositoryInterface $userRepository ){
        $this->_userRepository = $userRepository;
        $this->_userRepository->getItem(1);
    }
    
    public function index(){
        echo __METHOD__;
        die();
        //lấy thông tin user đã đăng nhập
        $user = Auth::user();

        //lấy id user đã đăng nhập
        $id = Auth::id();
    }
    public function login(){
        return view('website.nguoidung.login');
    }
    public function register(){
        return view('website.nguoidung.register');
    }
    public function postRegister( Request $request ){

        //xử lý request
        $email      = $request->email;
        $password   = $request->password;

        //validate

        //mã hóa mật khẩu
        $password   = Hash::make($password);

        //lưu vào CSDL
        $user = new User();
        $user->email = $email;
        $user->password = $password;

        if( $user->save() ){

        }else{

        }
        return redirect()->route('login');
    }

    public function logout( Request $request ){
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');

        //logout tất cả thiết bị
        //Auth::logoutOtherDevices($currentPassword)
    }
    public function postLogin( Request $request ){
        $email      = $request->email;
        $password   = $request->password;
        $remember   = 1;
        $credential = [
            'email' => $email, 
            'password' => $password
        ];
        $thuc_hien = Auth::attempt( $credential , $remember );//true | false
        if( $thuc_hien ){
            return redirect()->route('san-pham.index');
        }else{
            //không đúng
            return redirect()->route('login');
        }
    }
}
