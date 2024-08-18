<?php
require "./src/layouts/header.php";

global $categories, $listProduct;

$mod = $_GET['mod'];
$act = $_GET['act'];
if (isset($_GET['id']))
    $id = (int)$_GET['id'];
if (isset($_GET['cat']))
    $cat = (int)$_GET['cat'];
if (isset($_GET['code']))
    $code = $_GET['code'];

global $id, $cat, $code;

require './src/controllers/cart/add.php';
require './src/controllers/cart/buy.php';
?>

<main>
    <div class="breadcrumb hidden-left">
        <?php
        show_breadcrumb($categories, $listProduct, $id, $cat, $code);
        ?>
    </div>

    <div class="product-detail">
        <?php
        foreach ($listProduct as $product) {
            if ($product['code'] == $code) {
                // Image
                echo "<div class='product-image hidden-bot'>";
                echo "<div class='slider'>";
                $numberThumb = count($product['thumb']);
                for ($i = 0; $i < 20; $i++) {
                    foreach ($product['thumb'] as $thumb)
                        echo "<img src='{$thumb}' alt=''>";
                }
                echo "</div>";

                echo "<div class='main'>";
                echo "<img src='{$product['image']}' alt=''>";
                echo "</div>";
                echo "</div>";

                // Product Info
                echo "<div class='product-info hidden-right'>";
                echo "<h3>" . mb_convert_case($product['name'], MB_CASE_UPPER) . "</h3>";
                echo "<span class='brand'>Brand: MnhTng</span>";

                echo "<div class='price'>";
                if (!empty($product['sale'])) {
                    echo "<span class='price'>" . number_format($product['sale'], 0, '', ',') . "₫</span>";
                    echo "<span class='sales'>" . number_format($product['price'], 0, '', ',') . "₫</span>";
                } else {
                    echo "<span class='price'>" . number_format($product['price'], 0, '', ',') . "₫</span>";
                }
                echo "</div>";

                echo "<form class='cart' action='' method='post' enctype='multipart/form-data'>";
                echo "<div class='size-table'>";
                echo "<span>Size</span>";
                echo "<div class='table'>";
                $sizeBoard = ['s', 'm', 'l', 'xl', '2xl', '3xl'];
                foreach ($sizeBoard as $size) {
                    if (array_search($size, $product['size']) !== false) {
                        echo "<div class='size'>";
                        echo "<input id='{$size}' type='radio' name='size' value='{$size}' ";
                        if (isset($sizeChose) && $sizeChose == $size)
                            echo "checked = 'checked'";
                        echo ">";
                        echo "<label for='{$size}'>" . strtoupper($size) . "</label>";
                        echo "</div>";
                    } else {
                        echo "<div class='size'>";
                        echo "<input id='{$size}' type='radio' name='size' value='' disabled>";
                        echo "<label class='empty' for='{$size}'>" . strtoupper($size) . "</label>";
                        echo "</div>";
                    }
                }
                echo "</div>";
                echo "<span class='guild'>Guild for size chosen</span>";
                echo "<div class='dialog'>";
                echo "<img src='./src/assets/images/sizeTable.png' alt=''>";
                echo "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1' stroke='currentColor' class='size-6'>";
                echo "<path stroke-linecap='round' stroke-linejoin='round' d='m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z' />";
                echo "</svg>";
                echo "</div>";
                echo "</div>";
                if (!isset($error['login'])) {
                    echo "<div class='error'>";
                    echo checkError('size');
                    echo "</div>";
                }

                echo "<div class='color'>";
                echo "<p>Color</p>";
                echo "<div class='color-board'>";
                foreach ($product['color'] as $color)
                    echo "<div style='background-color: {$color}'></div>";
                echo "</div>";
                echo "</div>";

                echo "<div class='amount'>";
                echo "<p>Amount</p>";
                echo "<div class='quantity'>";
                echo "<button type='button' class='dec'>";
                echo "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='5' stroke='currentColor' class='size-6' width='1em' height='1em'>";
                echo "<path stroke-linecap='round' stroke-linejoin='round' d='M15.75 19.5 8.25 12l7.5-7.5' />";
                echo "</svg>";
                echo "</button>";
                echo "<input class='quantity' type='number' name='quantity' value='1'>";
                echo "<button type='button' class='inc'>";
                echo "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='5' stroke='currentColor' class='size-6' width='1em' height='1em'>";
                echo "<path stroke-linecap='round' stroke-linejoin='round' d='m8.25 4.5 7.5 7.5-7.5 7.5' />";
                echo "</svg>";
                echo "</button>";
                echo "</div>";
                echo "</div>";
                if (!isset($error['login'])) {
                    echo "<div class='error'>";
                    echo checkError('quantity');
                    echo "</div>";
                }

                echo "<div class='product-act'>";
                echo "<button type='submit' name='add_btn' value='submit_add_product' class='add'>";
                echo "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='size-6' width='2em' height='2em'>";
                echo "<path stroke-linecap='round' stroke-linejoin='round' d='M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z' />";
                echo "</svg>";
                echo "<p>Add to cart</p>";
                echo "</button>";
                echo "<button type='submit' name='buy_btn' value='submit_buy_product' class='buy'>";
                echo "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='size-6' width='2em' height='2em'>";
                echo "<path stroke-linecap='round' stroke-linejoin='round' d='M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z' />";
                echo "</svg>";
                echo "<p>Buy now</p>";
                echo "</button>";
                echo "</div>";
                echo "</form>";

                echo "<div class='des'>";
                echo $product['des'];
                echo "</div>";
                echo "</div>";

                break;
            }
        }
        ?>

        <!-- <div class="product-info">
            <h3>SƠ MI ĐÍNH ĐÁ</h3>

            <span class="brand">Brand: MnhTng</span>

            <div class="price">
                <span class="price">1,399,000₫</span>
                <span class="sales">1,399,000₫</span>
            </div>

            <form class="cart" action="" method="post" enctype="multipart/form-data">
                <div class="size-table">
                    <span>Size</span>

                    <div class="table">
                        <div class="size">
                            <input id="s" type="radio" name="size" value="s">
                            <label for="s">S</label>
                        </div>
                        <div class="size">
                            <input id="m" type="radio" name="size" value="m">
                            <label for="m">M</label>
                        </div>
                        <div class="size">
                            <input id="l" type="radio" name="size" value="l">
                            <label for="l">L</label>
                        </div>
                        <div class="size">
                            <input id="xl" type="radio" name="size" value="xl">
                            <label for="xl">XL</label>
                        </div>
                        <div class="size">
                            <input id="2xl" type="radio" name="size" value="2xl">
                            <label for="2xl">2XL</label>
                        </div>
                        <div class="size">
                            <input id="3xl" type="radio" name="size" value="3xl">
                            <label for="3xl">3XL</label>
                        </div>
                    </div>

                    <span class="guild">Guild for size chosen</span>
                    <div class="dialog">
                        <img src="./src/assets/images/sizeTable.png" alt="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                </div>
                <div class="error">
                    <?php echo checkError('size') ?>
                </div>

                <div class="color">
                    <p>Color</p>
                    <div class="color-board">
                        <div></div>
                        <div></div>
                    </div>
                </div>

                <div class="amount">
                    <p>Amount</p>
                    <div class='quantity'>
                        <button type="button" class="dec">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="5" stroke="currentColor" class="size-6" width="1em" height="1em">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>
                        </button>
                        <input class='quantity' type="number" name="quantity" min="1" value="1">
                        <button type="button" class="inc">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="5" stroke="currentColor" class="size-6" width="1em" height="1em">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="error">
                    <?php echo checkError('quantity') ?>
                </div>

                <div class="product-act">
                    <button type="submit" name="add_btn" value="submit_add_product" class="add">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6" width="2.5em" height="2.5em">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>

                        <p>Add to cart</p>
                    </button>
                    <button type="submit" name="buy_btn" value="submit_buy_product" class="buy">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6" width="2.5em" height="2.5em">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>

                        <p>Buy now</p>
                    </button>
                </div>
            </form>

            <div class="des">
                <p><b>Material</b>: vải thô</p>
                <p><b>Style</b>: đầm thiết kế dáng chữ suông dài qua gối, tone màu đỏ, đính hoa nổi</p>
                <p><b>Production Company</b>: DMT</p>
            </div>
        </div> -->
    </div>
</main>

<?php
if (isset($error['login'])) {
    error_alert($error['login']);
}

if (isset($_POST['add_btn']) && isset($error) && empty($error)) {
    success_alert();
}

require "./src/layouts/footer.php";
?>

<script>
    //! ========== Show Dialog ==========
    let guild = document.querySelector('.guild');
    let dialog = document.querySelector('.dialog');
    let exit = dialog.querySelector('svg');

    guild.addEventListener('click', () => {
        dialog.style.width = "100%";
        dialog.style.height = "100%";
        dialog.style.opacity = "1";
        exit.style.display = "block";
    });

    exit.addEventListener('click', () => {
        dialog.style.width = "0";
        dialog.style.height = "0";
        dialog.style.opacity = "0";
        exit.style.display = "none";
    });

    //! ========== Select Number Product ==========
    let number = document.querySelector('input.quantity');
    let minus = document.querySelector('.dec');
    let plus = document.querySelector('.inc');

    minus.addEventListener('click', () => {
        if (number.value > 1)
            number.value--;
    });

    plus.addEventListener('click', () => {
        number.value++;
    });

    //! ========== Animation Thumb Slider ==========
    let slider = document.querySelector('.slider');
    let numberThumb = <?php echo $numberThumb; ?>

    // Lấy tham chiếu đến sheet
    const stylesheet = document.styleSheets[4];

    // Tìm keyframes rule có tên "slider"
    let keyframesRule = null;
    for (let i = 0; i < stylesheet.cssRules.length; i++) {
        const rule = stylesheet.cssRules[i];
        if (rule.type === CSSRule.KEYFRAMES_RULE && rule.name === 'slider') {
            keyframesRule = rule;
            break;
        }
    }

    if (keyframesRule) {
        slider.style.animation = `slider ${numberThumb * 5}s linear infinite forwards`;

        // Sửa đổi keyframes
        window.addEventListener('resize', () => {
            let image = document.querySelector('.slider>img');
            let imageHeight = image.offsetHeight;

            const keyframeRuleEnd = keyframesRule.findRule('100%');
            keyframeRuleEnd.style.transform = `translateY(calc((${numberThumb} * -${imageHeight}px) - (${numberThumb} * 5px)))`;
        });
    }
</script>