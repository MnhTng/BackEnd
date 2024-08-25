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
$page = isset($_GET['page']) ? $_GET['page'] : 1;

global $id, $cat, $page;
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
        <h2 class="product hidden-right">Product</h2>
        <?php
        show_list_product_by_category($id, $cat, $page);
        ?>
    </section>
</main>

<?php require "./src/layouts/footer.php"; ?>

<script>
    //! ========== Category Title ==========
    let title = document.querySelector('h2.product');
    let titleFocus = document.querySelector('.cate-focus-icon');

    if (titleFocus)
        title.textContent = titleFocus.textContent;
    else
        title.textContent = "Product";

    //! ========== Sticky Category ==========
    let cate = document.querySelector('.categories');
    let productContent = document.querySelector('.product-list');

    if (cate.offsetHeight > productContent.offsetHeight)
        cate.style.position = `static`;
    else
        cate.style.position = `sticky`;

    //! ========== Show Dropdown ==========
    $(document).ready(function() {
        $('.sub').each(function() {
            $(this).on('mouseenter', function() {
                $(this).children().eq(0).children().eq(0).addClass('arrowSvg');
                $(this).children().eq(1).stop().slideDown(500);
            });

            $(this).on('mouseleave', function() {
                $(this).children().eq(0).children().eq(0).removeClass('arrowSvg');
                $(this).children().eq(1).stop().slideUp(300);
            });
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

            price.firstElementChild.style.transition = `all 0.3s ease-out`;
            price.firstElementChild.style.opacity = `1`;
            price.firstElementChild.style.transform = `translate(-50%, -50%)`;

            price.lastElementChild.style.transition = `all 0.3s ease-out`;
            price.lastElementChild.style.opacity = `1`;
            price.lastElementChild.style.transform = `translate(-50%, -50%)`;
        });

        img.parentElement.addEventListener('mouseleave', () => {
            price.style.opacity = "0";
            price.style.backdropFilter = `brightness(1)`;

            price.firstElementChild.style.transition = `all 0s`;
            price.firstElementChild.style.opacity = `0`;
            price.firstElementChild.style.transform = `translate(-50%, 400px)`;

            price.lastElementChild.style.transform = `translate(-50%, -400px)`;
            setTimeout(() => {
                price.lastElementChild.style.transition = `all 0s`;
                price.lastElementChild.style.transform = `translate(-50%, 400px)`;
            }, 100);
        });
    });
</script>