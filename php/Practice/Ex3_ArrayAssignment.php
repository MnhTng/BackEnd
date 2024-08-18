<?php
// EX1: tao mang luu tru cac so le tu 3 - 150
$odd = array();
for ($i = 3; $i <= 150; $i += 2) {
    $odd[] = $i;
}

// EX2: tao mang da chieu quan ly cac bai viet trong website tin tuc
$listPostCategory = array(
    array(
        'id' => 1,
        'name' => 'Thời sự',
        'description' => 'Tin tức nhanh nhất trong ngày'
    ),
    array(
        'id' => 2,
        'name' => 'Thế giới',
        'description' => 'Tin tức quốc tế'
    )
);

$listPost = array(
    array(
        'id' => 1,
        'title' => 'Bài viết 1',
        'content' => 'Nội dung bài viết 1',
        'description' => 'Mô tả bài viết 1',
        'author' => 'Tác giả 1',
        'category' => $listPostCategory[0],
        'thumb' => "Hình ảnh 1"
    ),
    array(
        'id' => 2,
        'title' => 'Bài viết 2',
        'content' => 'Nội dung bài viết 2',
        'description' => 'Mô tả bài viết 2',
        'author' => 'Tác giả 2',
        'category' => $listPostCategory[1],
        'thumb' => "Hình ảnh 2"
    )
);

// EX3: tao mang da chieu quan ly cac san pham trong website ban hang
$listProductCategory = array(
    array(
        'id' => 1,
        'name' => 'Điện thoại',
        'description' => 'Sản phẩm điện thoại'
    ),
    array(
        'id' => 2,
        'name' => 'Laptop',
        'description' => 'Sản phẩm laptop'
    )
);

$listProduct = array(
    array(
        'id' => 1,
        'name' => 'Điện thoại 1',
        'price' => 1000000,
        'description' => 'Mô tả điện thoại 1',
        'category' => $listProductCategory[0],
        'thumb' => "Hình ảnh điện thoại 1"
    ),
    array(
        'id' => 2,
        'name' => 'Điện thoại 2',
        'price' => 2000000,
        'description' => 'Mô tả điện thoại 2',
        'category' => $listProductCategory[0],
        'thumb' => "Hình ảnh điện thoại 2"
    ),
    array(
        'id' => 3,
        'name' => 'Laptop 1',
        'price' => 3000000,
        'description' => 'Mô tả laptop 1',
        'category' => $listProductCategory[1],
        'thumb' => "Hình ảnh laptop 1"
    ),
    array(
        'id' => 4,
        'name' => 'Laptop 2',
        'price' => 4000000,
        'description' => 'Mô tả laptop 2',
        'category' => $listProductCategory[1],
        'thumb' => "Hình ảnh laptop 2"
    )
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Danh sách</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <style>
        ul,
        li {
            list-style-type: none;
        }

        a {
            text-decoration: none;
            color: darkorange;
        }

        h1 {
            color: red;
        }

        p {
            font-style: italic;
        }

        .cat {
            font-size: 1.5em;
            color: blue;
        }
    </style>

    <h1>Danh sách bài viết</h1>
    <?php if (!empty($listProductCategory)) { ?>
        <ul>
            <?php foreach ($listPostCategory as $cat) { ?>
                <li>
                    <a href="" class="cat"><b><?php echo $cat['name'] ?></b></a>
                    <?php if (!empty($listPost)) { ?>
                        <ul>
                            <?php foreach ($listPost as $value) { ?>
                                <?php if ($value['category']['id'] == $cat['id']) { ?>
                                    <li>
                                        <a href=""><b><?php echo $value['title']; ?></b></a>
                                        <ul>
                                            <li>
                                                <p><?php echo $value['description']; ?></p>
                                            </li>
                                        </ul>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    <?php } else { ?>
                        <p>Không có bài viết nào</p>
                    <?php } ?>
                </li>
            <?php } ?>
        </ul>
    <?php } else { ?>
        <p>Không có danh mục</p>
    <?php } ?>

    <h1>Danh sách sản phẩm</h1>
    <?php if (!empty($listProductCategory)) { ?>
        <ul>
            <?php foreach ($listProductCategory as $cat) { ?>
                <li>
                    <a href="" class="cat"><b><?php echo $cat['name'] ?></b></a>
                    <?php if (!empty($listProduct)) { ?>
                        <ul>
                            <?php foreach ($listProduct as $value) { ?>
                                <?php if ($value['category']['id'] == $cat['id']) { ?>
                                    <li>
                                        <a href=""><b><?php echo $value['name'] ?></b></a>
                                        <ul>
                                            <li>
                                                <p><?php echo $value['description']; ?></p>
                                                <p><?php echo "Giá: " . $value['price'] . "VND"; ?></p>
                                            </li>
                                        </ul>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    <?php } else { ?>
                        <p>Không có sản phẩm</p>
                    <?php } ?>
                </li>
            <?php } ?>
        </ul>
    <?php } else { ?>
        <p>Không có danh mục</p>
    <?php } ?>
</body>

</html>