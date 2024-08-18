<?php
//! =============== HOME ===============

function show_home_product($categories, $listProduct, $i)
{
    if (array_search($listProduct[$i]['catType'], $categories[$listProduct[$i]['catID'] - 1]['cate']) !== false)
        echo "
        <div class='product'>
            <img src='{$listProduct[$i]['image']}' alt='{$listProduct[$i]['name']} {$listProduct[$i]['code']}'>
            <h3>" . mb_convert_case($listProduct[$i]['name'], MB_CASE_UPPER) . "</h3>
            <p>{$listProduct[$i]['intro']}</p>
            <a href='?mod=posts&act=detail&id={$listProduct[$i]['catID']}&cat=" . array_search($listProduct[$i]['catType'], $categories[$listProduct[$i]['catID'] - 1]['cate']) . "&code={$listProduct[$i]['code']}' class='btn'>View Details</a>
        </div>
        ";
    else {
        echo "
        <div class='product'>
            <img src='{$listProduct[$i]['image']}' alt='{$listProduct[$i]['name']} {$listProduct[$i]['code']}'>
            <h3>" . mb_convert_case($listProduct[$i]['name'], MB_CASE_UPPER) . "</h3>
            <p>{$listProduct[$i]['intro']}</p>
            <a href='?mod=posts&act=detail&id={$listProduct[$i]['catID']}&code={$listProduct[$i]['code']}' class='btn'>View Details</a>
        </div>
        ";
    }
}

//! =============== MAIN ===============

function get_focus_category($categories, $id, $cat)
{
    if (isset($id) && $id !== 0) {
        if (isset($cat)) {
            echo "
            <span class='cate-focus-icon'>
                <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2.5' stroke='currentColor' class='size-6' width='15px' height='15px'>
                    <path stroke-linecap='round' stroke-linejoin='round' d='m8.25 4.5 7.5 7.5-7.5 7.5' />
                </svg>
                <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2.5' stroke='currentColor' class='size-6' width='15px' height='15px'>
                    <path stroke-linecap='round' stroke-linejoin='round' d='m8.25 4.5 7.5 7.5-7.5 7.5' />
                </svg>
                {$categories[$id - 1]['cate'][$cat]}
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
                {$categories[$id - 1]['name']}
            </span>
            ";
        }
    }
}

function show_list_product_by_category($categories, $listProduct, $id, $cat)
{
    if (isset($id) && $id !== 0) {
        if (isset($cat)) {
            foreach ($listProduct as $product) {
                if ($product['catID'] == $id && $product['catType'] == $categories[$id - 1]['cate'][$cat]) {
                    echo "
                    <div class='product'>
                        <img src='{$product['image']}' alt='{$product['name']} {$product['code']}'>
                        <h3>" . mb_convert_case($product['name'], MB_CASE_UPPER) . "</h3>
                        <p>{$product['intro']}</p>
                        <a href='?mod=posts&act=detail&id={$id}&cat={$cat}&code={$product['code']}' class='btn'>View Details</a>
                    </div>
                    ";
                }
            }
        } else {
            foreach ($listProduct as $product) {
                if ($product['catID'] == $id) {
                    echo "
                    <div class='product'>
                        <img src='{$product['image']}' alt='{$product['name']} {$product['code']}'>
                        <h3>" . mb_convert_case($product['name'], MB_CASE_UPPER) . "</h3>
                        <p>{$product['intro']}</p>
                        <a href='?mod=posts&act=detail&id={$id}&code={$product['code']}' class='btn'>View Details</a>
                    </div>
                    ";
                }
            }
        }
    } else {
        $i = 0;
        foreach ($listProduct as $product) {
            if ($i < 30) {
                $i++;

                echo "
                <div class='product'>
                    <img src='{$product['image']}' alt='{$product['name']} {$product['code']}'>
                    <h3>" . mb_convert_case($product['name'], MB_CASE_UPPER) . "</h3>
                    <p>{$product['intro']}</p>
                    <a href='?mod=posts&act=detail&id=0&code={$product['code']}' class='btn'>View Details</a>
                </div>
                ";
            }
        }
    }
}

//! =============== DETAILS ===============

function show_breadcrumb($categories, $listProduct, $id, $cat, $code)
{
    echo "<a class='underline_center' href='?mod=home&act=home'>Home</a>";
    echo "<span>&#62;</span>";
    echo "<a class='underline_center' href='?mod=posts&act=main'>Products</a>";

    if (isset($id)) {
        if ($id !== 0) {
            echo "<span>&#62;</span>";
            echo "<a class='underline_center' href='?mod=posts&act=main&id={$id}'>{$categories[$id - 1]['name']}</a>";
        } else {
            echo "<span>&#62;</span>";
            echo "<a class='underline_center' href='?mod=posts&act=main'>Categories</a>";
        }
    }

    if ($cat) {
        echo "<span>&#62;</span>";
        echo "<a class='underline_center' href='?mod=posts&act=main&id={$id}&cat={$cat}'>{$categories[$id - 1]['cate'][$cat]}</a>";
    }

    if (isset($code)) {
        $name = '';

        foreach ($listProduct as $product) {
            if (array_search($code, $product) !== false) {
                $name = mb_convert_case($product['name'], MB_CASE_TITLE);
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
