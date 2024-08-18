<?php
// EX1: lay ra chi tiet noi dung cua bai viet theo ID
function getPost($id)
{
    global $listPost;
    if (array_key_exists($id, $listPost))
        return $listPost[$id];
    return false;
}

$listPost = array(
    1 => array(
        'id' => 1,
        'title' => "Tiêu đề bài viết 1",
        'content' => "Nội dung bài viết 1",
        'author' => "Tác giả 1"
    ),
    2 => array(
        'id' => 2,
        'title' => "Tiêu đề bài viết 2",
        'content' => "Nội dung bài viết 2",
        'author' => "Tác giả 2"
    ),
    3 => array(
        'id' => 3,
        'title' => "Tiêu đề bài viết 3",
        'content' => "Nội dung bài viết 3",
        'author' => "Tác giả 3"
    )
);

$post = getPost(2);
echo "<pre>";
print_r($post);
echo "</pre><br><br>";

// EX2: tinh so trang hien thi
$totalPost = rand(10, 100);
$postPerPage = rand(1, 10);
$numPage = (int)($totalPost / $postPerPage);

if ($totalPost % $postPerPage)
    $numPage++;
echo "Số trang hiển thị khi có {$totalPost} bài viết và {$postPerPage} bài mỗi trang: $numPage<br><br>";

// EX3: xuat ra mang so nguyen chan
function getEvenNumber($x)
{
    return $x % 2 == 0;
}

$number = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
$evenNumber = array_filter($number, "getEvenNumber");
echo "Mảng số nguyên chẵn: <br><pre>";
print_r($evenNumber);
echo "</pre><br><br>";
