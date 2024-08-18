<?php
// Database
require "./src/config/product.php";

// Lib
require "./src/lib/template.php";
require "./src/lib/database.php";
require "./src/lib/product.php";
require "./src/lib/cart.php";
require "./src/lib/alert.php";

session_start();

// Get module and action from URL parameters
$mod = !empty($_GET['mod']) ? $_GET['mod'] : 'home';
$act = !empty($_GET['act']) ? $_GET['act'] : 'home';
$path = "./src/modules/{$mod}/{$act}.php";

if (file_exists($path)) {
    require $path;
} else {
    header("location: ./src/components/error/404.html");
}
?>

<script>
    //! ========== Update Product Quantity ==========
    let productQuantity = document.querySelector('.number-product');
    let cart = <?php if (isset($_SESSION['cart'])) echo $_SESSION['cart']['info']['quantity'];
                else echo 0 ?>;

    if (cart) {
        if (productQuantity)
            productQuantity.textContent = cart;
        else {
            let cartNumber = document.createElement('span');
            cartNumber.classList.add('number-product');
            cartNumber.textContent = cart;
            document.querySelector(".cart>a").appendChild(cartNumber);
        }
    }

    //! ========== Login Button ==========
    let loginButton = document.getElementById('login-btn');
    let helloUser = document.getElementById('hello-user');

    let isLogin = <?php if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === true) echo 1;
                    else echo 0 ?>;
    let username = '<?php if (isset($_SESSION['username'])) echo $_SESSION['username'];
                    else echo '' ?>';

    if (isLogin) {
        loginButton.textContent = 'Logout';
        helloUser.innerHTML = `
        <a href='?mod=pages&act=account'>Hello <b><i><u>${username}</u></i></b></a>
        `;
    } else
        loginButton.textContent = 'Login';
</script>

<script src='./src/assets/js/app.js'></script>