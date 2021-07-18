$(document).ready(function(){
    $(document).mouseup(function (e){
        var div = $(".edit-product");
        if (!div.is(e.target) // если клик был не по нашему блоку
            && div.has(e.target).length === 0) { // и не по его дочерним элементам
            $('.edit-block').fadeOut(500); // скрываем его
        }
    });
    $('.content').on('click', '.change', function(){
        $('.edit-block').fadeIn(500);
        name = this.getAttribute('data-n');
        datatable = this.getAttribute('data-k');
        temp_option = "name";
        text = "<option value='name'>Наименование</option>"+
        "<option value='price'>Цена</option>"+
        "<option value='characteristics'>Характеристики</option>"+
        "<option value='img'>Изображение</option>";
        $('.editing-select').html(text);
    });
    $('.content').on('change', '.editing-select', function(){temp_option = $('.editing-select').val();})
    $('.content').on('click', '.sub-change-btn', function(){
        var new_value = $("#change-value").val();
        if( new_value.length==0){ alert("Введите новое значение"); return false;}
        var xhr = new XMLHttpRequest();
        var post = "n="+name+"&dt="+datatable+"&option="+temp_option+"&value="+new_value;
        xhr.open("POST", "../templates/edit.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(post);
        xhr.onreadystatechange = function(){
            if(xhr.readyState != 4)
                return;
            if(xhr.status == 200){
                error=xhr.responseText;
                // alert(error);
                if(error.length==0)
                    location.reload();
                else
                    alert(error);
            }
        }
        return false;
    })
    $(document).mouseup(function (e){
        var div = $(".characteristics_name");
        if (!div.is(e.target) // если клик был не по нашему блоку
            && div.has(e.target).length === 0) { // и не по его дочерним элементам
            $('.characteristics').fadeOut(500); // скрываем его
        }
    });
    $('.content').on('click', '.gds1 figure', function(){
       $('.characteristics').fadeIn(500);
       var char = this.getAttribute('data-char');
       $('.characteristics_name_chr').html(char);
    });
})
