<?php
require "./src/layouts/header.php";

global $categories, $listProduct;
?>

<main>
    <section>
        <h2 class="hidden-left">Featured Products</h2>
        <div class="product-list hidden-left">
            <?php
            $i = 0;
            for ($i; $i < 30; $i += 10)
                show_home_product($categories, $listProduct, $i);
            ?>
        </div>

        <h2 class="hidden-left">Best Seller</h2>
        <div class="product-list hidden-left">
            <?php
            for ($i; $i < 45; $i += 5)
                show_home_product($categories, $listProduct, $i);
            ?>
        </div>

        <h2 class="hidden-left">Most Popular</h2>
        <div class="product-list hidden-left">
            <?php
            for ($i; $i > 21; $i -= 4)
                show_home_product($categories, $listProduct, $i);
            ?>
        </div>

        <h2 class="hidden-left">Highest Rating</h2>
        <div class="product-list hidden-left">
            <?php
            for ($i; $i > 11; $i -= 5)
                show_home_product($categories, $listProduct, $i);
            ?>
        </div>
    </section>
</main>

<?php require "./src/layouts/footer.php"; ?>