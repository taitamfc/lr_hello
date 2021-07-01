<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\URL;

class MyTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $a = 5;
        $b = 6;
        $kiem_tra = ( $a == $b ) ? true : false;

        //$this->assertTrue($kiem_tra);
        

        /*
        Tiều đề bài viết: Video CH Séc - Anh: Dấu ấn Grealish, ngôi đầu không mất sức (EURO) 
        Đường dẫn website: video-ch-sec-anh-dau-an-grealish-ngoi-dau-khong-mat-suc-euro
        */

        $title = 'Video CH Séc - Anh: Dấu ấn Grealish, ngôi đầu không mất sức (EURO)';
        $slug  = 'video-ch-sec-anh-dau-an-grealish-ngoi-dau-khong-mat-suc-euro';

        $title = 'Video CH Séc - Anh: Dấu ấn Grealish, ngôi đầu không mất sức (EURO)';
        $slug  = 'video-ch-sec-anh-dau-an-grealish-ngoi-dau-khong-mat-suc-euro';

        $url = new Url();
        $ket_qua = $url->sluggify($title);
        /*
        Nguyễn Văn A => nguyen-van-a
        */
        $this->assertEquals( $slug , $ket_qua );




    }

  
}
