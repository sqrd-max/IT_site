<?php
include ("pages_header.php")
?>

        <div class="content">
            <div class="page_name" data-dt='laptop'>
                <span>Ноутбуки</span>
                <?php include "../lib/db_output_laptop.php";
                if(isset($_SESSION['login'])) if($_SESSION['role']<2) echo "<button data-dt='laptop' data-k='".$laptop[0]['kategori']."' class ='add'>Добавить товар</button>";
                ?>
            </div>
            <div class="gds__pages">
            <?php
                    foreach ($laptop as $lap ){
                        $chars= explode('|',$lap['characteristics']);
                        $all_chars='';
                        foreach($chars as $char ){
                            $all_chars.=$char.'<br>';
                        }
                        echo "<div class='gds1'><figure data-char='".$all_chars."'>  <img src='../img/laptop/".$lap['img']."' height='270' width='250'>";
                        echo "</figure><figcaption class='figure'><b> ".$lap['name']."</b><br> Цена: <b>".$lap['price']." ₽</b>";
                        echo "<button class='add_to_cart' data-i='".$lap['img']."' data-n='".$lap['name']."' data-p='".$lap['price'].
                        "'data-c='".$lap['characteristics']."' data-k='".$lap['kategori']."'>Добавить в корзину</button><br>";
                        if(isset($_SESSION['login'])) if($_SESSION['role']<3) echo "<button data-n='".$lap['name']."' data-k='".$lap['kategori']."' class ='change'>Изменить</button>";
                        if(isset($_SESSION['login'])) if($_SESSION['role']<2) echo "<button data-n='".$lap['name']."' data-k='".$lap['kategori']."' class ='delete'>Удалить</button>";
                        echo "</figcaption></div>";
                    }
                ?>
            </div>
            <div class="edit-block">
                <div class="edit-product">
                    <p class="edit-title"><b>ИЗМЕНЕНИТЬ ТОВАР</b></p>
                    <form class="editing-block">
                        <select class="editing-select"></select>
                        <input type="text" id="change-value" placeholder="Введите значение">
                        <button class="sub-change-btn">Изменить</button>
                    </form>
                </div>
            </div>
            <div class="characteristics">
                <div class="characteristics_name">
                    <p class="characteristics-title"><b>ХАРАКТЕРИСТИКИ ТОВАРА</b></p>
                    <div class="characteristics_name_chr"></div>
                </div>
            </div>
            <div class="adding-t-block">
                <div class="adding-product">
                    <p class="adding-title"><b>ДОБАВИТЬ ТОВАР</b></p>
                    <form class="adding-block">
                        <input type="text" id="name" placeholder="Введите название товара"><br>
                        <input type="text" id="characteristics" placeholder="Введите характеристики товара"><br>
                        <input type="number" id="price" placeholder="Введите цену товара"><br>
                        <input type="text" id="img" placeholder="Вставте картинку"><br>
                        <button type="submit" class="sub-add-btn">Добавить</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear"></div>
<?php
include ("footer.php")
?>
    </div>
    <script src="../js/jquery-3.4.1.js"></script>
    <script src ="../js/add_to_cart.js"></script>
    <script src ="../js/edit.js"></script>
    <script src ="../js/delete.js"></script>
    <script src ="../js/add.js"></script>
    <script src="../js/search.js"></script>
</body>
</html>