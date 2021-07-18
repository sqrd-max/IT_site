$(document).ready(function(){
    //вывод товаров в корзину

    cart_output();
    //расчет и вывод итоговой стоимости
    $(".itogo").html(find_summ());
    //изменение количества
    $(".content").on("change",".gds_count", function(){
       var cart_items= JSON.parse(localStorage.getItem("cart"));
       for(var i=0; i<cart_items.length; i++)
       if(cart_items[i][1]==this.getAttribute("data-n")) {
           cart_items[i][3]=$(this).val();
           break;
       }
       localStorage.setItem("cart",JSON.stringify(cart_items));
       $(".itogo").html(find_summ());
    })
    //удаление
    $(".content").on("click",".kor", function(){
    if(confirm("Удалить товар из корзины?")){
        var name=this.getAttribute("data-n");
        var cart_items = JSON.parse(localStorage.getItem("cart"));
        for(item in cart_items){
            var item=cart_items[item];
            if(name==item[1]){
                cart_items.splice(cart_items.indexOf(item),1);
                localStorage.setItem("cart",JSON.stringify(cart_items));
                cart_output();
                $(".itogo").html(find_summ());
            }

        }
    }
})
    function  cart_output(){
        var cart_text = "";
        var cart_items = JSON.parse(localStorage.getItem('cart'));
        console.log(cart_items);
        for(item in cart_items){
            var i=0;
            var item=cart_items[item];
            item[4] = item[4].split('|');
            str='';
            for(let k=0;k<item[4].length;k++){
                str+=item[4][k]+"<br>";
            }
            cart_text+="<div class='basket_gds'><div class='cart'>"+
            "<div class='basket_gds_img'><img src='../img/"+item[5]+"/"+item[0]+"'></div>"+
            "<div class='basket_gds_name'>"+item[1]+"</div>"+
            "<div class='basket_gds_characteristics'>"+str+"</div>"+
            "<div class='basket_gds_price'>"+"Цена: "+item[2]+"₽"+"<br><br>Количество: <input type='number' data-n='"+item[1]+"' data-p='"+item[2]+"' value='"+item[3]+"' min='1' max='100' class='gds_count'></div>"+
            "<div class='korzina'><button class='kor' data-n='"+item[1]+"'><img class='kor-btn' src='../img/icons/trash.png'></button></div></div></div>";
        }
        $(".basket_gds").html(cart_text);

    }
    function find_summ(){
        var summ=0;
        var price_inputs=$(".gds_count");
        price_inputs.each(function(){
            summ+=this.getAttribute("data-p")*$(this).val();
            
        }) 
        return summ;
    } 
    $(document).mouseup(function (e){
        var div = $(".zakaz_tov_inf");
        if (!div.is(e.target) // если клик был не по нашему блоку
            && div.has(e.target).length === 0) { // и не по его дочерним элементам
            $('.zakaz_tov').fadeOut(500); // скрываем его
        }
    });
    $('.oform_zakaz').click(function(){        
       $('.zakaz_tov').fadeIn(500);
       
    });
    $('.of-tov').click(function(){        
        alert("Заказ успешно оформлен");
        
     });
})