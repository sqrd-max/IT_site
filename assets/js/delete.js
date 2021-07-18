$(document).ready(function() {
    $(".content").on("click", ".delete", function() {
        if (confirm("Удалить товар со страницы?")) {
            name = this.getAttribute('data-n');
            datatable = $('.add').attr('data-dt');
            var xhr = new XMLHttpRequest();
            var post = "n=" + name + "&dt=" + datatable;
            xhr.open("POST", "../templates/delete.php");
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send(post);
            xhr.onreadystatechange = function() {
                if (xhr.readyState != 4)
                    return;
                if (xhr.status == 200) {
                    error = xhr.responseText;
                    // alert(error);
                    if (error.length == 0)
                        location.reload();
                    else
                        alert(error);
                }
            }
            return false;
        }
    })
});