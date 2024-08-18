<?php
require "./src/layouts/header.php";

if (session_status() == PHP_SESSION_NONE)
    session_start();

$mod = $_GET['mod'];
$act = $_GET['act'];
if (isset($_GET['id']))
    $id = (int)$_GET['id'];
if (isset($_GET['cat']))
    $cat = (int)$_GET['cat'];

global $id, $cat;
// ép kiểu int cho chuỗi không hợp lệ(bắt đầu không phải số) thì output = 0
// id = 0 là trang chi tiết sản phẩm

global $db;
db_connect($db);

$sql = "SELECT p.* FROM product AS p JOIN category AS c ON p.id = c.id";
$_SESSION['product'] = db_fetch_array($sql);

$sql = "SELECT * FROM category";
$_SESSION['category'] = db_fetch_array($sql);

db_close();
?>

<main class="side">
    <aside>
        <nav class="categories hidden-top">
            <a class="title-cate" href="?mod=posts&act=main">Categories</a>
            <?php
            get_focus_category($id, $cat);
            ?>

            <ul class="main-cate">
                <li class="sub">
                    <a class="underline-left" href="?mod=posts&act=main&id=1">
                        Shirts
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="10px" height="10px">
                            <path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                        </svg>
                    </a>
                    <ul class="sub-cate">
                        <li><a class="underline-left" href="?mod=posts&act=main&id=1&cat=0">Short Sleeve</a></li>
                        <li><a class="underline-left" href="?mod=posts&act=main&id=1&cat=1">Medium Sleeve</a></li>
                        <li><a class="underline-left" href="?mod=posts&act=main&id=1&cat=2">Long Sleeve</a></li>
                    </ul>
                </li>
                <li>
                    <a class="underline-left" href="?mod=posts&act=main&id=2">T-shirt</a>
                </li>
                <li class="sub">
                    <a class="underline-left" href="?mod=posts&act=main&id=3">
                        Pants
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="10px" height="10px">
                            <path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                        </svg>
                    </a>
                    <ul class="sub-cate">
                        <li><a class="underline-left" href="?mod=posts&act=main&id=3&cat=0">Shorts</a></li>
                        <li><a class="underline-left" href="?mod=posts&act=main&id=3&cat=1">Capri Pants</a></li>
                        <li><a class="underline-left" href="?mod=posts&act=main&id=3&cat=2">Trousers</a></li>
                        <li><a class="underline-left" href="?mod=posts&act=main&id=3&cat=3">Jeans</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </aside>

    <section>
        <div class='product-list hidden-bot'>
            <?php
            show_list_product_by_category($id, $cat);
            ?>
        </div>
    </section>
</main>

<?php require "./src/layouts/footer.php"; ?>

<script>
    //! ========== Show Dropdown ==========
    let cateTitle = document.querySelectorAll('.sub');

    cateTitle.forEach((cate) => {
        cate.addEventListener('mouseenter', () => {
            cate.children[0].children[0].classList.add('arrowSvg');
            cate.children[1].style.display = "block";

        });

        cate.addEventListener('mouseleave', () => {
            cate.children[0].children[0].classList.remove('arrowSvg');
            cate.children[1].style.display = "none";
        });
    });

    //! ========== Show Product Price ==========
    let productImg = document.querySelectorAll('.img');

    productImg.forEach((img) => {
        let price = img.firstElementChild.firstElementChild;

        if (parseFloat(price.textContent) >= 700)
            price.style.color = "#ff1111";
        else if (parseFloat(price.textContent) >= 300)
            price.style.color = "#ffd711";
        else
            price.style.color = "#60ff11";

        img.parentElement.addEventListener('mouseenter', () => {
            price.style.opacity = "1";
            price.style.backdropFilter = `brightness(0.6)`;
        });

        img.parentElement.addEventListener('mouseleave', () => {
            price.style.opacity = "0";
            price.style.backdropFilter = `brightness(1)`;
        });
    });
</script>