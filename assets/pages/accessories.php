<?php
include ("pages_header.php")
?>
            
        <div class="content">
            <div class="page_name" data-dt='accessories'>
                <span>Аксессуары</span>
                <?php include "../lib/db_output_accessories.php";
                if(isset($_SESSION['login'])) if($_SESSION['role']<2) echo "<button data-dt='accessories' data-k='".$accessories[0]['kategori']."' class ='add'>Добавить товар</button>";
                ?>
            </div>
            <div class="gds__pages">
            <?php
                    foreach ($accessories as $access ){
                        $chars= explode('|',$access['characteristics']);
                        $all_chars='';
                        foreach($chars as $char ){
                            $all_chars.=$char.'<br>';
                        }
                        echo "<div class='gds1'><figure data-char='".$all_chars."'><img src='../img/accessories/".$access['img']."' height='270' width='250'>";
                        echo "</figure><figcaption class='figure'><b> ".$access['name']."</b><br> Цена: <b>".$access['price']." ₽</b>";
                        echo "<button class='add_to_cart' data-i='".$access['img']."' data-n='".$access['name']."' data-p='".$access['price'].
                        "'data-c='".$access['characteristics']."' data-k='".$access['kategori']."'>Добавить в корзину</button><br>";
                        if(isset($_SESSION['login'])) if($_SESSION['role']<3) echo "<button data-n='".$access['name']."' data-k='".$access['kategori']."' class ='change'>Изменить</button>";
                        if(isset($_SESSION['login'])) if($_SESSION['role']<2) echo "<button data-n='".$access['name']."' data-k='".$access['kategori']."' class ='delete'>Удалить</button>";
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