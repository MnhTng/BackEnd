<?php
//! =============== HOME ===============

function show_home_product($i)
{
    if (isset($_SESSION['product']) && !empty($_SESSION['product'][$i]['type'])) {
        foreach ($_SESSION['category'] as $types) {
            if (!empty($types['type'])) {
                $type = explode(', ', $types['type']);

                if (in_array($_SESSION['product'][$i]['type'], $type)) {
                    $cat = array_search($_SESSION['product'][$i]['type'], $type);
                    break;
                }
            }

            if (isset($cat))
                break;
        }

        echo "
        <div class='product'>
        <div class='img'>
            <a href='?mod=posts&act=detail&id={$_SESSION['product'][$i]['id']}&cat={$cat}&code={$_SESSION['product'][$i]['pcode']}'>
                <span class='price'>
                    <span>";
        echo $_SESSION['product'][$i]['sale'] ? number_format($_SESSION['product'][$i]['sale'], 0, '', ',') . "₫" : number_format($_SESSION['product'][$i]['price'], 0, '', ',') . "₫";
        echo "
                    </span>
                    <span>";
        echo $_SESSION['product'][$i]['sale'] ? number_format($_SESSION['product'][$i]['sale'], 0, '', ',') . "₫" : number_format($_SESSION['product'][$i]['price'], 0, '', ',') . "₫";
        echo "
                    </span>
                </span>
            </a>
            <img src='{$_SESSION['product'][$i]['image']}' alt='{$_SESSION['product'][$i]['name']} {$_SESSION['product'][$i]['pcode']}'>
        </div>
        <h3>" . mb_convert_case($_SESSION['product'][$i]['name'], MB_CASE_UPPER) . "</h3>
        <p>{$_SESSION['product'][$i]['intro']}</p>
        <a href='?mod=posts&act=detail&id={$_SESSION['product'][$i]['id']}&cat={$cat}&code={$_SESSION['product'][$i]['pcode']}' class='btn'>View Details</a>
        </div>
        ";
    } else {
        echo "
        <div class='product'>
        <div class='img'>
            <a href='?mod=posts&act=detail&id={$_SESSION['product'][$i]['id']}&code={$_SESSION['product'][$i]['pcode']}'>
                <span class='price'>
                    <span>";
        echo $_SESSION['product'][$i]['sale'] ? number_format($_SESSION['product'][$i]['sale'], 0, '', ',') . "₫" : number_format($_SESSION['product'][$i]['price'], 0, '', ',') . "₫";
        echo "
                    </span>
                    <span>";
        echo $_SESSION['product'][$i]['sale'] ? number_format($_SESSION['product'][$i]['sale'], 0, '', ',') . "₫" : number_format($_SESSION['product'][$i]['price'], 0, '', ',') . "₫";
        echo "
                    </span>
                </span>
            </a>
            <img src='{$_SESSION['product'][$i]['image']}' alt='{$_SESSION['product'][$i]['name']} {$_SESSION['product'][$i]['pcode']}'>
        </div>
        <h3>" . mb_convert_case($_SESSION['product'][$i]['name'], MB_CASE_UPPER) . "</h3>
        <p>{$_SESSION['product'][$i]['intro']}</p>
        <a href='?mod=posts&act=detail&id={$_SESSION['product'][$i]['id']}&code={$_SESSION['product'][$i]['pcode']}' class='btn'>View Details</a>
        </div>
        ";
    }
}

//! =============== MAIN ===============

function get_focus_category($id, $cat)
{
    if (isset($id) && $id !== 0) {
        if (isset($cat)) {
            if (!empty($_SESSION['category'][$id - 1]['type'])) {
                $type = explode(', ', $_SESSION['category'][$id - 1]['type']);

                $catName = $type[$cat];
            }

            echo "
            <span class='cate-focus-icon'>
                <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2.5' stroke='currentColor' class='size-6' width='15px' height='15px'>
                    <path stroke-linecap='round' stroke-linejoin='round' d='m8.25 4.5 7.5 7.5-7.5 7.5' />
                </svg>
                <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2.5' stroke='currentColor' class='size-6' width='15px' height='15px'>
                    <path stroke-linecap='round' stroke-linejoin='round' d='m8.25 4.5 7.5 7.5-7.5 7.5' />
                </svg>
                {$catName}
            </span>
            ";
        } else {
            echo "
            <span class='cate-focus-icon'>
                <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2.5' stroke='currentColor' class='size-6' width='15px' height='15px'>
                    <path stroke-linecap='round' stroke-linejoin='round' d='m8.25 4.5 7.5 7.5-7.5 7.5' />
                </svg>
                <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2.5' stroke='currentColor' class='size-6' width='15px' height='15px'>
                    <path stroke-linecap='round' stroke-linejoin='round' d='m8.25 4.5 7.5 7.5-7.5 7.5' />
                </svg>
                {$_SESSION['category'][$id - 1]['name']}
            </span>
            ";
        }
    }
}

function show_list_product_by_category($id, $cat, $page)
{
    global $db;
    db_connect($db);

    $quantityPerPage = 9;

    // Contain id
    if (isset($id) && $id !== 0) {
        // Contain cat
        if (isset($cat)) {
            $type = explode(', ', $_SESSION['category'][$id - 1]['type']);
            $totalPost = db_num_rows("SELECT * FROM product as p WHERE p.id = $id AND p.type = '{$type[$cat]}'");
            $totalPage = ceil($totalPost / $quantityPerPage);

            $start = ($page - 1) * $quantityPerPage;
            $sql = "SELECT * FROM product as p WHERE p.id = $id AND p.type = '{$type[$cat]}' LIMIT {$start}, {$quantityPerPage}";
            $filter = db_fetch_array($sql);

            echo "<div class='product-list hidden-bot'>";
            foreach ($filter as $item) {
                if ($item['id'] == $id && $item['type'] == $type[$cat]) {
                    echo "
                    <div class='product'>
                    <div class='img'>
                        <a href='?mod=posts&act=detail&id={$id}&cat={$cat}&code={$item['pcode']}'>
                            <span class='price'>
                                <span>";
                    echo $item['sale'] ? number_format($item['sale'], 0, '', ',') . "₫" : number_format($item['price'], 0, '', ',') . "₫";
                    echo "
                                </span>
                                <span>";
                    echo $item['sale'] ? number_format($item['sale'], 0, '', ',') . "₫" : number_format($item['price'], 0, '', ',') . "₫";
                    echo "
                                </span>
                            </span>      
                        </a>
                        <img src='{$item['image']}' alt='{$item['name']} {$item['pcode']}'>
                    </div>
                    <h3>" . mb_convert_case($item['name'], MB_CASE_UPPER) . "</h3>
                    <p>{$item['intro']}</p>
                    <a href='?mod=posts&act=detail&id={$id}&cat={$cat}&code={$item['pcode']}' class='btn'>View Details</a>
                    </div>
                    ";
                }
            }
            echo "</div>";

            echo "<div class='pagination'>";
            if ($page > 1) {
                $prePage = $page - 1;
                echo "
                <span class='prev'>
                    <a href='?mod=posts&act=main&id={$id}&cat={$cat}&page={$prePage}'>
                        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' width='1em' height='1em'>
                            <path d='M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160zm352-160l-160 160c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L301.3 256 438.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0z' />
                        </svg>
                    </a>
                </span>
                ";
            }

            if ($page - 1 > 2)
                echo "
                <span class='page'><a href='?mod=posts&act=main&id={$id}&cat={$cat}&page=1'>1</a></span>

                <span class='page page-node'>
                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512' width='1em' height='1em'>
                        <path d='M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z' />
                    </svg>
                </span>
                ";
            else if ($page - 1 == 2)
                echo "<span class='page'><a href='?mod=posts&act=main&id={$id}&cat={$cat}&page=1'>1</a></span>";

            for ($i = max($page - 1, 1); $i <= min($page + 1, $totalPage); $i++) {
                if ($i == $page)
                    echo "<span class='page'><a class='current-page' href='?mod=posts&act=main&id={$id}&cat={$cat}&page={$i}'>{$i}</a></span>";
                else
                    echo "<span class='page'><a href='?mod=posts&act=main&id={$id}&cat={$cat}&page={$i}'>{$i}</a></span>";
            }

            if ($totalPage - $page > 2)
                echo "
                <span class='page page-node'>
                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512' width='1em' height='1em'>
                        <path d='M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z' />
                    </svg>
                </span>

                <span class='page'><a href='?mod=posts&act=main&id={$id}&cat={$cat}&page={$totalPage}'>{$totalPage}</a></span>
                ";
            else if ($totalPage - $page == 2)
                echo "<span class='page'><a href='?mod=posts&act=main&id={$id}&cat={$cat}&page={$totalPage}'>{$totalPage}</a></span>";

            if ($page < $totalPage) {
                $nextPage = $page + 1;
                echo "
                <span class='next'>
                    <a href='?mod=posts&act=main&id={$id}&cat={$cat}&page={$nextPage}'>
                        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' width='1em' height='1em'>
                            <path d='M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256 265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256 73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z' />
                        </svg>
                    </a>
                </span>
                ";
            }
            echo "</div>";
        }
        // Not contain cat
        else {
            $totalPost = db_num_rows("SELECT * FROM product as p WHERE p.id = $id");
            $totalPage = ceil($totalPost / $quantityPerPage);

            $start = ($page - 1) * $quantityPerPage;
            $sql = "SELECT * FROM product as p WHERE p.id = $id LIMIT {$start}, {$quantityPerPage}";
            $filter = db_fetch_array($sql);

            echo "<div class='product-list hidden-bot'>";
            foreach ($filter as $item) {
                if ($item['id'] == $id) {
                    echo "
                    <div class='product'>
                    <div class='img'>
                        <a href='?mod=posts&act=detail&id={$id}&code={$item['pcode']}'>
                            <span class='price'>
                                <span>";
                    echo $item['sale'] ? number_format($item['sale'], 0, '', ',') . "₫" : number_format($item['price'], 0, '', ',') . "₫";
                    echo "
                                </span>
                                <span>";
                    echo $item['sale'] ? number_format($item['sale'], 0, '', ',') . "₫" : number_format($item['price'], 0, '', ',') . "₫";
                    echo "
                                </span>
                            </span>      
                        </a>
                        <img src='{$item['image']}' alt='{$item['name']} {$item['pcode']}'>
                    </div>
                    <h3>" . mb_convert_case($item['name'], MB_CASE_UPPER) . "</h3>
                    <p>{$item['intro']}</p>
                    <a href='?mod=posts&act=detail&id={$id}&code={$item['pcode']}' class='btn'>View Details</a>
                    </div>
                    ";
                }
            }
            echo "</div>";

            echo "<div class='pagination'>";
            if ($page > 1) {
                $prePage = $page - 1;
                echo "
                <span class='prev'>
                    <a href='?mod=posts&act=main&id={$id}&page={$prePage}'>
                        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' width='1em' height='1em'>
                            <path d='M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160zm352-160l-160 160c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L301.3 256 438.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0z' />
                        </svg>
                    </a>
                </span>
                ";
            }

            if ($page - 1 > 2)
                echo "
                <span class='page'><a href='?mod=posts&act=main&id={$id}&page=1'>1</a></span>
    
                <span class='page page-node'>
                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512' width='1em' height='1em'>
                        <path d='M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z' />
                    </svg>
                </span>
                ";
            else if ($page - 1 == 2)
                echo "<span class='page'><a href='?mod=posts&act=main&id={$id}&page=1'>1</a></span>";

            for ($i = max($page - 1, 1); $i <= min($page + 1, $totalPage); $i++) {
                if ($i == $page)
                    echo "<span class='page'><a class='current-page' href='?mod=posts&act=main&id={$id}&page={$i}'>{$i}</a></span>";
                else
                    echo "<span class='page'><a href='?mod=posts&act=main&id={$id}&page={$i}'>{$i}</a></span>";
            }

            if ($totalPage - $page > 2)
                echo "
                <span class='page page-node'>
                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512' width='1em' height='1em'>
                        <path d='M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z' />
                    </svg>
                </span>
    
                <span class='page'><a href='?mod=posts&act=main&id={$id}&page={$totalPage}'>{$totalPage}</a></span>
                ";
            else if ($totalPage - $page == 2)
                echo "<span class='page'><a href='?mod=posts&act=main&id={$id}&page={$totalPage}'>{$totalPage}</a></span>";

            if ($page < $totalPage) {
                $nextPage = $page + 1;
                echo "
                <span class='next'>
                    <a href='?mod=posts&act=main&id={$id}&page={$nextPage}'>
                        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' width='1em' height='1em'>
                            <path d='M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256 265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256 73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z' />
                        </svg>
                    </a>
                </span>
                ";
            }
            echo "</div>";
        }
    }
    // Not contain id
    else {
        $totalPost = db_num_rows("SELECT * FROM product as p");
        $totalPage = ceil($totalPost / $quantityPerPage);

        $start = ($page - 1) * $quantityPerPage;
        $sql = "SELECT * FROM product as p ORDER BY RAND() LIMIT {$start}, {$quantityPerPage}";
        $filter = db_fetch_array($sql);

        echo "<div class='product-list hidden-bot'>";
        foreach ($filter as $item) {
            echo "
            <div class='product'>
            <div class='img'>
                <a href='?mod=posts&act=detail&id=0&code={$item['pcode']}'>
                    <span class='price'>
                        <span>";
            echo $item['sale'] ? number_format($item['sale'], 0, '', ',') . "₫" : number_format($item['price'], 0, '', ',') . "₫";
            echo "
                        </span>
                        <span>";
            echo $item['sale'] ? number_format($item['sale'], 0, '', ',') . "₫" : number_format($item['price'], 0, '', ',') . "₫";
            echo "
                        </span>
                    </span>  
                </a>
                <img src='{$item['image']}' alt='{$item['name']} {$item['pcode']}'>
            </div>
            <h3>" . mb_convert_case($item['name'], MB_CASE_UPPER) . "</h3>
            <p>{$item['intro']}</p>
            <a href='?mod=posts&act=detail&id=0&code={$item['pcode']}' class='btn'>View Details</a>
            </div>
            ";
        }
        echo "</div>";

        echo "<div class='pagination'>";
        if ($page > 1) {
            $prePage = $page - 1;
            echo "
            <span class='prev'>
                <a href='?mod=posts&act=main&page={$prePage}'>
                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' width='1em' height='1em'>
                        <path d='M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160zm352-160l-160 160c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L301.3 256 438.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0z' />
                    </svg>
                </a>
            </span>
            ";
        }

        if ($page - 1 > 2)
            echo "
            <span class='page'><a href='?mod=posts&act=main&page=1'>1</a></span>

            <span class='page page-node'>
                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512' width='1em' height='1em'>
                    <path d='M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z' />
                </svg>
            </span>
            ";
        else if ($page - 1 == 2)
            echo "<span class='page'><a href='?mod=posts&act=main&page=1'>1</a></span>";

        for ($i = max($page - 1, 1); $i <= min($page + 1, $totalPage); $i++) {
            if ($i == $page)
                echo "<span class='page'><a class='current-page' href='?mod=posts&act=main&page={$i}'>{$i}</a></span>";
            else
                echo "<span class='page'><a href='?mod=posts&act=main&page={$i}'>{$i}</a></span>";
        }

        if ($totalPage - $page > 2)
            echo "
            <span class='page page-node'>
                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 448 512' width='1em' height='1em'>
                    <path d='M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z' />
                </svg>
            </span>

            <span class='page'><a href='?mod=posts&act=main&page={$totalPage}'>{$totalPage}</a></span>
            ";
        else if ($totalPage - $page == 2)
            echo "<span class='page'><a href='?mod=posts&act=main&page={$totalPage}'>{$totalPage}</a></span>";

        if ($page < $totalPage) {
            $nextPage = $page + 1;
            echo "
            <span class='next'>
                <a href='?mod=posts&act=main&page={$nextPage}'>
                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' width='1em' height='1em'>
                        <path d='M470.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 256 265.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160zm-352 160l160-160c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L210.7 256 73.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0z' />
                    </svg>
                </a>
            </span>
            ";
        }
        echo "</div>";
    }

    db_close();
}

//! =============== DETAILS ===============

function show_breadcrumb($id, $cat, $code)
{

    echo "<a class='underline_center' href='?mod=home&act=home'>Home</a>";
    echo "<span>&#62;</span>";
    echo "<a class='underline_center' href='?mod=posts&act=main'>Products</a>";

    if (isset($id) && $id !== 0) {
        echo "<span>&#62;</span>";
        echo "<a class='underline_center' href='?mod=posts&act=main&id={$id}'>{$_SESSION['category'][$id - 1]['name']}</a>";
    }

    if ($cat) {
        $type = explode(', ', $_SESSION['category'][$id - 1]['type']);

        echo "<span>&#62;</span>";
        echo "<a class='underline_center' href='?mod=posts&act=main&id={$id}&cat={$cat}'>{$type[$cat]}</a>";
    }

    if (isset($code)) {
        $name = '';

        foreach ($_SESSION['product'] as $item) {
            if (array_search($code, $item) !== false) {
                $name = mb_convert_case($item['name'], MB_CASE_TITLE);
                break;
            }
        }

        if (isset($cat)) {
            echo "<span>></span>";
            echo "<a class='underline_center' href='?mod=posts&act=detail&id={$id}&cat={$cat}&code={$code}'>{$name}</a>";
        } else {
            echo "<span>></span>";
            echo "<a class='underline_center' href='?mod=posts&act=detail&id={$id}&code={$code}'>{$name}</a>";
        }
    }
}
