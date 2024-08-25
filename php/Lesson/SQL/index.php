<?php
session_start();

// Lib
require "./src/lib/template.php";
require "./src/lib/database.php";
require "./src/lib/product.php";
require "./src/lib/cart.php";
require "./src/lib/alert.php";

// Database
require "./src/config/database.php";

// Get module and action from URL parameters
$mod = !empty($_GET['mod']) ? $_GET['mod'] : 'home';
$act = !empty($_GET['act']) ? $_GET['act'] : 'home';
$path = "./src/modules/{$mod}/{$act}.php";

if (file_exists($path)) {
    require $path;
} else {
    ob_start();
    header("location: ./src/components/error/404.html");
    $content = ob_get_contents();
    echo $content;
    ob_end_clean();
}
?>

<script>
    //! ========== Update Product Quantity ==========
    let isLogin = <?php if (isset($_SESSION['is_login']) && $_SESSION['is_login'] === true) echo 1;
                    else echo 0 ?>;
    let username = '<?php
                    if (isset($_SESSION['user_id'])) {
                        global $db;
                        db_connect($db);

                        $sql = "SELECT username FROM user WHERE id = {$_SESSION['user_id']}";
                        $result = db_fetch_row($sql);
                        if ($result)
                            echo $result['username'];

                        db_close();
                    } else echo '';
                    ?>';

    let productQuantity = document.querySelector('.number-product');
    let quantity = <?php if (isset($_SESSION['cart']) && !empty($cartByID)) echo $_SESSION['quantity'];
                    else echo 0 ?>;

    if (isLogin && quantity) {
        if (productQuantity)
            productQuantity.textContent = quantity;
        else {
            let cartNumber = document.createElement('span');
            cartNumber.classList.add('number-product');
            cartNumber.textContent = quantity;
            document.querySelector(".cart>a").appendChild(cartNumber);
        }
    }

    //! ========== Login Button ==========
    let loginButton = document.getElementById('login-btn');
    let helloUser = document.getElementById('hello-user');

    if (isLogin) {
        loginButton.textContent = 'Logout';
        helloUser.innerHTML = `
        <a href='?mod=pages&act=account'>Hello <b><i>${username}</i></b></a>
        `;
    } else
        loginButton.textContent = 'Login';
</script>

<script src="./src/lib/alert.js"></script>
<script src='./src/assets/js/app.js'></script>