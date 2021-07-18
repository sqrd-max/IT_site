$(document).ready(function(){  
    $(".content").on("click",".add_to_cart", function(){
        cart_items= JSON.parse(localStorage.getItem("cart"));
        if(cart_items==null) cart_items=[];
        var item=[];
        item[0]=this.getAttribute("data-i");
        item[1]=this.getAttribute("data-n");
        item[2]=this.getAttribute("data-p");
        item[3]=1;
        item[4]=this.getAttribute("data-c");
        item[5]=this.getAttribute("data-k");
        var check=true;
        for(var i=0; i<cart_items.length; i++)
            if(cart_items[i][1]==item[1]) {
                cart_items[i][3]++;
                check=false;
                break;
            }
        if(check){
            cart_items.push(item);
            localStorage.setItem("cart",JSON.stringify(cart_items))
        } 
        alert("Товар добавлен в корзину");
    })
   
    })