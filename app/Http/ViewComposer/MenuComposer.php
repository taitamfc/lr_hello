<?php
namespace App\Http\ViewComposer;
use Illuminate\View\View;

class MenuComposer {
    public function compose( View $view ){
        $menus = [
            'Trang Chủ',
            'Giới Thiệu',
            'Sản Phẩm',
            'Liên Hệ',
        ];
        $view->with('menus',$menus);
    }
}