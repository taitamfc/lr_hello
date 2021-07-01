jQuery.ajax({
    url : 'http://127.0.0.1:8000/api/products/',
    method : 'GET', //POST PUT DELETE
    dataType: 'html', //JSON
    success : function( tra_ve ){
        
        let results = tra_ve;

        let html = '';
        //duyệt mảng chứa các đối tượng
        for ( let item of results) {
            html += `<li> ${item.name} - ${item.price} </li>`;
        }

        //đưa vào thẻ ul
        document.getElementById('lists').innerHTML = html;
    }
})