$(document).ready(function(){
        $(document).mouseup(function (e){
            var div = $(".adding-product");
            if (!div.is(e.target) // если клик был не по нашему блоку
                && div.has(e.target).length === 0) { // и не по его дочерним элементам
                $('.adding-t-block').fadeOut(500); // скрываем его
            }
        });
        $('.content').on('click', '.add', function(){$('.adding-t-block').fadeIn(500);})
        $('.adding-t-block').on('submit', '.adding-block', function(){
        var categori = $('.add').attr('data-k');
        var dt = $('.add').attr('data-dt');
        var a_name = $('#name').val();
        var a_price = $('#price').val();
        var a_characteristics =$('#characteristics').val();
        var a_img = $('#img').val();
        var post = "dt="+dt+"&kat="+categori+"&n="+a_name+"&p="+a_price+"&c="+a_characteristics+"&i="+a_img;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../templates/add.php', true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(post);
        xhr.onreadystatechange = function(){
        if(xhr.readyState != 4)
            return;
        if(xhr.status == 200){
            error=xhr.responseText;
        if(error.length==0){
            alert("Информация успешно добавлена");
            location.reload();
        }
        else
            alert(error);
        }
        }
        return false;
        })
});
