if (jQuery) {
    //console.log('Hello');
}

if ($) {
    //console.log('Hello');
}

/*
    #navbarSupportedContent {

    }
    
    .navbar-brand {

    }
*/
//document.getElementByID('navbarSupportedContent');
let navbarSupportedContent = jQuery('#navbarSupportedContent');

let navbarSupportedContent_2 = $('#navbarSupportedContent');

//a , p, div
// console.log( navbarSupportedContent );
// console.log( navbarSupportedContent_2 );

/*  
    //Cac su kien
    //https://prnt.sc/15rhi9o
    jQuery( selector ).event_name( function(){

    });

    //Cac hieu ung



*/
$('.btn-outline-dark').click( function( e ){

    //ẩn
    //$('.btn-outline-dark').hide();

    //hiện
    $(this).hide();

    return false;
});

$('.navbar-brand').click( function( e ){

    //ẩn
    //$('.btn-outline-dark').hide();

    //hiện
    $('.btn-outline-dark').fadeToggle( "slow", function() {
        // Animation complete.
    });

    return false;
});
//============LẤY DỮ LIỆU===================
//khoi tao doi tuong
let xhttp = new XMLHttpRequest();

//xu ly khi tra ve
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

        //https://prnt.sc/15rm1sf
        
        let results = JSON.parse( xhttp.responseText );

        let html = '';
        //duyệt mảng chứa các đối tượng
        for ( let item of results) {
            html += `<li> ${item.name} - ${item.price} </li>`;
        }

        //đưa vào thẻ ul
        document.getElementById('lists').innerHTML = html;
    }
};
//goi toi dau
xhttp.open("GET", 'http://127.0.0.1:8000/api/products/', true);

//GET | POST | PUT | DELETE

//thuc hien gui toi serve
xhttp.send();

//============CẬP NHẬT DỮ LIỆU===================
//Cập nhật dữ liệu
let data = {
    'ho_va_ten' : 'Nguyễn Văn A',
    'so_dien_thoai' : '0123456789',
};
//chuyển đổi sang chuổi json
data = JSON.stringify(data);

//Thông báo bổ sung thông tin được đính kèm vào tài nguyên được mô tả ở URL
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        
    }
};
xhttp.open("PUT", 'URL/ID', true);
xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
xhttp.send( data );


//============THÊM DỮ LIỆU===================
let data = {
    'ho_va_ten' : 'Nguyễn Văn A',
    'so_dien_thoai' : '0123456789',
};

//chuyển đổi sang chuổi json
data = JSON.stringify(data);

var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {

    if (this.readyState == 4 && this.status == 201) {
        //gọi lại phương thức hiển thị danh sách
        
    }
};
xhttp.open("POST", 'URL', true);
xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
xhttp.send( data );

//============XÓA DỮ LIỆU===================
let xhttp   = new XMLHttpRequest();
xhttp.open("DELETE",'URL/ID', true);
xhttp.send();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
       
    }
};