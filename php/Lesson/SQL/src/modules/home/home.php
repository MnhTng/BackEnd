<?php
require "./src/layouts/header.php";

if (session_status() == PHP_SESSION_NONE)
    session_start();

global $db;
db_connect($db);

$sql = "SELECT p.* FROM product AS p JOIN category AS c ON p.id = c.id";
$SESSION['product'] = db_fetch_array($sql);

$sql = "SELECT * FROM category";
$SESSION['category'] = db_fetch_array($sql);

db_close();
?>

<main>
    <section>
        <h2 class="hidden-left">Featured Products</h2>
        <div class="product-list hidden-left">
            <?php
            $i = 0;
            for ($i; $i < 30; $i += 10)
                show_home_product($i);
            ?>
        </div>

        <h2 class="hidden-left">Best Seller</h2>
        <div class="product-list hidden-left">
            <?php
            for ($i; $i < 45; $i += 5)
                show_home_product($i);
            ?>
        </div>

        <h2 class="hidden-left">Most Popular</h2>
        <div class="product-list hidden-left">
            <?php
            for ($i; $i > 21; $i -= 4)
                show_home_product($i);
            ?>
        </div>

        <h2 class="hidden-left">Highest Rating</h2>
        <div class="product-list hidden-left">
            <?php
            for ($i; $i > 11; $i -= 5)
                show_home_product($i);
            ?>
        </div>
    </section>
</main>

<?php require "./src/layouts/footer.php"; ?>

<script>
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