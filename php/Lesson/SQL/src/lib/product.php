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
                <span class='price'>";
            echo $_SESSION['product'][$i]['sale'] ? number_format($_SESSION['product'][$i]['sale'], 0, '', ',') . "₫" : number_format($_SESSION['product'][$i]['price'], 0, '', ',') . "₫";
            echo "
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
                <span class='price'>";
            echo $_SESSION['product'][$i]['sale'] ? number_format($_SESSION['product'][$i]['sale'], 0, '', ',') . "₫" : number_format($_SESSION['product'][$i]['price'], 0, '', ',') . "₫";
            echo "
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

function show_list_product_by_category($id, $cat)
{
    if (isset($id) && $id !== 0) {
        if (isset($cat)) {
            $type = explode(', ', $_SESSION['category'][$id - 1]['type']);

            foreach ($_SESSION['product'] as $item) {
                if ($item['id'] == $id && $item['type'] == $type[$cat]) {
                    echo "
                    <div class='product'>
                    <div class='img'>
                        <a href='?mod=posts&act=detail&id={$id}&cat={$cat}&code={$item['pcode']}'>
                            <span class='price'>";
                        echo $item['sale'] ? number_format($item['sale'], 0, '', ',') . "₫" : number_format($item['price'], 0, '', ',') . "₫";
                        echo "
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
        } else {
            foreach ($_SESSION['product'] as $item) {
                if ($item['id'] == $id) {
                    echo "
                    <div class='product'>
                    <div class='img'>
                        <a href='?mod=posts&act=detail&id={$id}&code={$item['pcode']}'>
                            <span class='price'>";
                        echo $item['sale'] ? number_format($item['sale'], 0, '', ',') . "₫" : number_format($item['price'], 0, '', ',') . "₫";
                        echo "
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
        }
    } else {
        $i = 0;
        foreach ($_SESSION['product'] as $item) {
            if ($i < 30) {
                $i++;

                echo "
                <div class='product'>
                <div class='img'>
                    <a href='?mod=posts&act=detail&id=0&code={$item['pcode']}'>
                        <span class='price'>";
                    echo $item['sale'] ? number_format($item['sale'], 0, '', ',') . "₫" : number_format($item['price'], 0, '', ',') . "₫";
                    echo "
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
        }
    }
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
