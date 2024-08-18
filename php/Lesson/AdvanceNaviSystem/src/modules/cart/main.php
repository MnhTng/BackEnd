<?php
require "./src/layouts/header.php";

global $categories, $listProduct;

require './src/controllers/cart/update.php';
?>

<main>
    <div class="cart-container">
        <?php if (isset($_SESSION['cart'])) { ?>
            <div class="cart-header hidden-top">
                <h1>Cart</h1>
            </div>

            <div class="cart-content hidden-left">
                <div class="select-all">
                    <div>
                        <input type="checkbox" id="select-all">
                        <label for="select-all">Select All</label>
                    </div>

                    <div class="remove-all">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="" width="2em" height="2em">
                                <path d="M566.6 54.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192-34.7-34.7c-4.2-4.2-10-6.6-16-6.6c-12.5 0-22.6 10.1-22.6 22.6l0 29.1L364.3 320l29.1 0c12.5 0 22.6-10.1 22.6-22.6c0-6-2.4-11.8-6.6-16l-34.7-34.7 192-192zM341.1 353.4L222.6 234.9c-42.7-3.7-85.2 11.7-115.8 42.3l-8 8C76.5 307.5 64 337.7 64 369.2c0 6.8 7.1 11.2 13.2 8.2l51.1-25.5c5-2.5 9.5 4.1 5.4 7.9L7.3 473.4C2.7 477.6 0 483.6 0 489.9C0 502.1 9.9 512 22.1 512l173.3 0c38.8 0 75.9-15.4 103.4-42.8c30.6-30.6 45.9-73.1 42.3-115.8z" />
                            </svg>
                        </div>

                        <div class="alert-container">
                            <div class="alert-remove">
                                <h2>Remove all products</h2>
                                <p>Are you sure you want to remove all items in your cart?</p>
                                <div class="btn-group">
                                    <div class="btn-cancel">
                                        <span>Cancel</span>
                                    </div>
                                    <div class="btn-confirm">
                                        <span>
                                            <a href="./src/controllers/cart/delete.php?all=true">Remove</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cart-list">
                    <?php
                    $freeShip = 0;
                    if ($_SESSION['cart']['info']['quantity'] > 1)
                        $freeShip = 1;
                    $discount = 0;

                    foreach ($_SESSION['cart']['add'] as $item) {
                        foreach ($item as $itemBySize) {
                            echo "<div class='cart-item'>";
                            echo "<div class='select-item'>";
                            echo "<input type='checkbox' id='select-item' name='select[{$itemBySize['code']}][{$itemBySize['size']}]'>";
                            echo "</div>";

                            echo "<div class='item-info'>";
                            echo "<a href='?mod=posts&act=detail&id={$itemBySize['catID']}&cat={$itemBySize['catType']}&code={$itemBySize['code']}' class='cart-item-img'>";
                            echo "<img src='{$itemBySize['image']}' alt=''>";
                            echo "</a>";

                            echo "<div class='cart-item-info'>";
                            echo "<div class='info'>";
                            echo "<a href='?mod=posts&act=detail&id={$itemBySize['catID']}&cat={$itemBySize['catType']}&code={$itemBySize['code']}'>" . mb_convert_case($itemBySize['name'], MB_CASE_TITLE) . "</a>";
                            echo "<span>Size: " . strtoupper($itemBySize['size']) . "</span>";
                            echo "</div>";

                            echo "<div class='item'>";
                            echo "<div class='price'>";
                            echo "<span class='price-new'>" . number_format($itemBySize['price'], 0, '', ',') . "₫</span>";
                            foreach ($listProduct as $product) {
                                if ($product['code'] == $itemBySize['code']) {
                                    if (!empty($product['sale'])) {
                                        echo "<span class='price-old'>" . number_format($product['price'], 0, '', ',') . "₫</span>";
                                        $discount += ((int)$product['price'] - (int)$product['sale']) * $itemBySize['quantity'];
                                    }
                                    break;
                                }
                            }
                            echo "</div>";

                            echo "<form action='' method='post' class='quantity'>";
                            echo "<button type='submit' class='dec'>";
                            echo "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='5' stroke='currentColor' class='size-6' width='1em' height='1em'>";
                            echo "<path stroke-linecap='round' stroke-linejoin='round' d='M15.75 19.5 8.25 12l7.5-7.5' />";
                            echo "</svg>";
                            echo "</button>";
                            echo "<input class='quantity' type='number' name='quantity[{$itemBySize['code']}][{$itemBySize['size']}]' min='1' value='{$itemBySize['quantity']}'>";
                            echo "<button type='submit' class='inc'>";
                            echo "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='5' stroke='currentColor' class='size-6' width='1em' height='1em'>";
                            echo "<path stroke-linecap='round' stroke-linejoin='round' d='m8.25 4.5 7.5 7.5-7.5 7.5' />";
                            echo "</svg>";
                            echo "</button>";
                            echo "</form>";
                            echo "</div>";
                            echo "</div>";

                            echo "<div class='cart-item-action'>";
                            echo "<button class='btn-remove'>";
                            echo "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='currentColor' class='size-6' width='1.5em' height='1.5em'>";
                            echo "<path fill-rule='evenodd' d='M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z' clip-rule='evenodd' />";
                            echo "</svg>";
                            echo "</button>";
                            echo "<div class='alert-container'>";
                            echo "<div class='alert-remove'>";
                            echo "<h2>Remove product</h2>";
                            echo "<p>Are you sure you want to remove this item?</p>";
                            echo "<div class='btn-group'>";
                            echo "<div class='btn-cancel'>";
                            echo "<span>Cancel</span>";
                            echo "</div>";
                            echo "<div class='btn-confirm'>";
                            echo "<span>";
                            echo "<a href='./src/controllers/cart/delete.php?code={$itemBySize['code']}&size={$itemBySize['size']}'>Remove</a>";
                            echo "</span>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                    }
                    ?>
                </div>

                <!-- <div class="cart-list">
                    <div class="cart-item">
                        <div class="select-item">
                            <input type="checkbox" id="select-item" name="">
                        </div>

                        <div class="item-info">
                            <a href="#" class="cart-item-img">
                                <img src="https://m.yodycdn.com/fit-in/filters:format(webp)/products/akn6012-dod-qjn60341-xnh-10.jpg" alt="product">
                            </a>

                            <div class="cart-item-info">
                                <div class="info">
                                    <a href="#">Product 1</a>
                                    <span>Size: L</span>
                                </div>

                                <div class="item">
                                    <div class="price">
                                        <span class="price-new">$50</span>
                                        <span class="price-old">$100</span>
                                    </div>

                                    <form action="" method="post" class="quantity">
                                        <button type="submit" class="dec">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="5" stroke="currentColor" class="size-6" width="1em" height="1em">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                                            </svg>
                                        </button>
                                        <input class="quantity" type="number" name="quantity" min="1" value="1">
                                        <button type="submit" class="inc">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="5" stroke="currentColor" class="size-6" width="1em" height="1em">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <div class="cart-item-action">
                                <button class="btn-remove">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6" width="1.5em" height="1.5em">
                                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                    </svg>
                                </button>

                                <div class="alert-container">
                                    <div class="alert-remove">
                                        <h2>Remove product</h2>
                                        <p>Are you sure you want to remove this item?</p>
                                        <div class="btn-group">
                                            <div class="btn-cancel">
                                                <span>Cancel</span>
                                            </div>
                                            <div class="btn-confirm">
                                                <span>
                                                    <a href="./src/controllers/cart/delete.php?code=code">Remove</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>

            <div class="cart-total hidden-right">
                <h2 class="header">Order Details</h2>

                <div class="detail">
                    <div>
                        <span>Total value of products</span>
                        <span>
                            <?php
                            echo number_format($_SESSION['cart']['info']['total'], 0, '', ',') . "₫";
                            ?>
                        </span>
                    </div>

                    <div>
                        <span>Shipping fee</span>
                        <span>20,000₫</span>
                    </div>

                    <div>
                        <?php
                        if ($freeShip) {
                            echo "<span>Shipping discount</span>";
                            echo "<span class='discount'>-20,000₫</span>";
                        }
                        ?>
                    </div>
                </div>

                <div class="total-price">
                    <span>Total payment</span>
                    <span>
                        <?php
                        if ($freeShip)
                            echo number_format($_SESSION['cart']['info']['total'], 0, '', ',') . "₫";
                        else
                            echo number_format($_SESSION['cart']['info']['total'] + 20000, 0, '', ',') . "₫";
                        ?>
                    </span>
                </div>

                <div class="sale-notify">
                    <?php
                    if ($freeShip)
                        echo "<span>You have saved " . number_format($discount + 20000, 0, '', ',') . "₫</span>";
                    else if ($discount)
                        echo "<span>You have saved " . number_format($discount, 0, '', ',') . "₫</span>";
                    ?>
                </div>

                <a href="?mod=cart&act=checkout" class="checkout">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6" width="2.5em" height="2.5em">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                    </svg>

                    <p>Checkout</p>
                </a>
            </div>
        <?php } else { ?>
            <div class="cart-header-empty hidden-top">
                <h1>Your cart is empty</h1>
            </div>

            <div class="cart-content-empty hidden-bot">
                <div class="icon">
                    <script src="https://cdn.lordicon.com/lordicon.js"></script>
                    <lord-icon src="https://cdn.lordicon.com/lwumwgrp.json" trigger="loop" state="morph-fill" colors="primary:#ffc738,secondary:#f24c00,tertiary:#d1e3fa" style="width:250px;height:250px">
                    </lord-icon>
                </div>

                <p>Looks like you haven't added any items to your cart yet.</p>
                <a href="?mod=home&act=home">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor" width="2.5em" height="2.5em">
                        <path d="M547.6 103.8L490.3 13.1C485.2 5 476.1 0 466.4 0L109.6 0C99.9 0 90.8 5 85.7 13.1L28.3 103.8c-29.6 46.8-3.4 111.9 51.9 119.4c4 .5 8.1 .8 12.1 .8c26.1 0 49.3-11.4 65.2-29c15.9 17.6 39.1 29 65.2 29c26.1 0 49.3-11.4 65.2-29c15.9 17.6 39.1 29 65.2 29c26.2 0 49.3-11.4 65.2-29c16 17.6 39.1 29 65.2 29c4.1 0 8.1-.3 12.1-.8c55.5-7.4 81.8-72.5 52.1-119.4zM499.7 254.9c0 0 0 0-.1 0c-5.3 .7-10.7 1.1-16.2 1.1c-12.4 0-24.3-1.9-35.4-5.3L448 384l-320 0 0-133.4c-11.2 3.5-23.2 5.4-35.6 5.4c-5.5 0-11-.4-16.3-1.1l-.1 0c-4.1-.6-8.1-1.3-12-2.3L64 384l0 64c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-64 0-131.4c-4 1-8 1.8-12.3 2.3z" />
                    </svg>

                    <p>Continue shopping</p>
                </a>
            </div>
        <?php } ?>
    </div>
</main>

<?php require "./src/layouts/footer.php"; ?>

<script>
    //! ========== Select All Products In Cart ==========
    let selectAll = document.querySelector('input#select-all');
    let selectItem = document.querySelectorAll('input#select-item');
    let clearAll = document.querySelector('.remove-all>.icon>svg');

    selectAll.addEventListener('change', () => {
        if (selectAll.checked) {
            clearAll.style.transform = `translateX(0)`;

            selectItem.forEach((item) => {
                item.checked = true;
            });
        } else {
            clearAll.style.transform = `translateX(3em)`;

            selectItem.forEach((item) => {
                item.checked = false;
            });
        }
    });

    selectItem.forEach((item) => {
        item.addEventListener('change', () => {
            let check = true;

            selectItem.forEach((item) => {
                if (!item.checked) {
                    check = false;
                    return;
                }
            });

            if (check) {
                selectAll.checked = true;
                clearAll.style.transform = `translateX(0)`;
            } else {
                selectAll.checked = false;
                clearAll.style.transform = `translateX(3em)`;
            }
        });
    });

    //! ========== Select Number Product ==========
    let minus = document.querySelectorAll('.quantity>.dec');
    let plus = document.querySelectorAll('.quantity>.inc');

    minus.forEach((value) => {
        value.addEventListener('click', () => {
            let number = value.nextElementSibling;

            if (number.value > 1)
                number.value--;
        });
    });

    plus.forEach((value) => {
        value.addEventListener('click', () => {
            let number = value.previousElementSibling;
            number.value++;
        });
    });

    //! ========== Remove All Product ==========
    clearAll.addEventListener('click', () => {
        let deleteAlert = document.querySelector('.remove-all>.alert-container');

        deleteAlert.style.transform = `translate(-50%, -50%)`;

        let cancel = deleteAlert.querySelector('.btn-cancel');
        cancel.addEventListener('click', () => {
            deleteAlert.style.transform = `translate(100vw, -50%)`;
        });
    });

    //! ========== Remove Product ==========
    let deleteBtn = document.querySelectorAll('.btn-remove');

    deleteBtn.forEach((removeBtn) => {
        removeBtn.addEventListener('click', () => {
            let deleteAlert = removeBtn.nextElementSibling;

            deleteAlert.style.transform = `translate(-50%, -50%)`;

            let cancel = deleteAlert.querySelector('.btn-cancel');
            cancel.addEventListener('click', () => {
                deleteAlert.style.transform = `translate(100vw, -50%)`;
            });
        });
    });
</script>