$(document).ready(function(){
    $('.search-btn').click(function(){
        var search_text = $('.search').val();
        var datatable = $('.page_name').attr('data-dt');
        var role =  $('.search').attr('data-r');
        var xhr = new XMLHttpRequest();
        xhr.open("POST", '../templates/search.php');
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("text="+search_text+"&dt="+datatable);
        xhr.onreadystatechange = function(){
            if(xhr.readyState != 4)
                return;
            if(xhr.status == 200){                
                var objects = JSON.parse(xhr.responseText);
				if(objects.length == 0){ $('.gds').html("<h3>В каталоге нет таких товаров.</h3>"); return false;}
                var products_text = "";
                for(obj in objects){
                    var obj = objects[obj];
                    products_text+= "<div class='gds1'><figure>  <img src='../img/"+datatable+"/"+obj['img']+"' height='270' width='250'>";
                    products_text+= "</figure><figcaption class='figure'><b> "+obj['name']+"</b><br> Цена: <b>"+obj['price']+" ₽</b>";
                    products_text+= "<button class='add_to_cart' data-i='"+obj['img']+"' data-n='"+obj['name']+"' data-p='"+obj['price']+
                    "'data-c='"+obj['characteristics']+"' data-k='"+obj['kategori']+"'>Заказать</button><br>";
                    if(role<3) products_text+= "<button data-n='"+obj['name']+"' data-k='"+obj['kategori']+"' class ='change'>Изменить</button>";
                    if(role<2) products_text+= "<button data-n='"+obj['name']+"' data-k='"+obj['kategori']+"' class ='delete'>Удалить</button>";
                    products_text+= "</figcaption></div>";
                }
                $('.gds').html(products_text);
                $('.gds__pages').html(products_text);
                
            }
        }
        return false;
        
    })
})