<?php require 'src/layouts/header.php'; ?>

<?php
require 'src/assets/php/createPost.php'; ?>

<main>
    <?php
    $postID = isset($_GET['post']) ? $_GET['post'] : 'undefined';
    if ($postID !== 'undefined') {
        require 'src/layouts/post.php';
    } else {
        require 'src/layouts/sidebar.php';

        echo "<section id='content'>";
        require 'src/layouts/createPost.php';
        require 'src/layouts/newFeed.php';
        echo "</section>";
    }
    ?>
</main>

<?php require 'src/layouts/footer.php'; ?>

<!-- Xử lý chung -->
<script src="src/assets/js/app.js"></script>

<!-- Lưu thông tin post vào localStorage -->
<script>
    let posts = <?php if (isset($GLOBALS['post'])) echo json_encode($GLOBALS['post']);
                else echo 0 ?>;
    let Posts = "Posts";

    const save = (data) => {
        localStorage.setItem(Posts, JSON.stringify(data));
    };

    const load = () => {
        return JSON.parse(localStorage.getItem(Posts)) || [];
    };

    const add = (data) => {
        let posts = load();
        posts = [...posts, data];
        save(posts);
    };

    <?php
    if (isset($_POST['btn_post'])) {
        $condSubmit = true;
        $submit = true;
    }
    ?>

    let condSubmit = <?php if (isset($condSubmit)) echo json_encode($condSubmit);
                else echo 0 ?>;
    let submit = <?php if (isset($submit)) echo json_encode($submit);
                    else echo 0 ?>;
    if (window.performance && window.performance.navigation.type === window.performance.navigation.TYPE_RELOAD) {
        // Trình duyệt đã load lại
        if (condSubmit == true && submit == true)
            condSubmit = 0;
    }

    if (posts !== 0 && condSubmit !== 0) {
        let newPost = {
            title: posts[0].title,
            des: posts[0].description,
            content: posts[0].content,
            image: posts[0].image
        };

        add(newPost);
    }

    let listPosts = document.querySelector('.list-posts');
    let getPost = load();

    let list = getPost.map((post, index) => {
        return `
        <a href="?post=${index}" class="post" target="_blank">
            <div class='title'>
                <p>${post.title}</p>
            </div>
            <div class='image'>
                <img src='${post.image}' alt=''>
                <span class='hidden'>Read post</span>
            </div>
        </a>
        `;
    });

    listPosts.innerHTML = list.join("");
</script>

<!-- Xuất post ra trang khác -->
<script>
    let postDetail = document.querySelector('.post-detail');
    let post = load();

    let postID = <?php if(isset($postID)) echo $postID; else echo false ?>;
    if (postID !== false) {
        postDetail.innerHTML = `
        <div class='title'>
            <h1>${post[postID].title}</h1>
        </div>
        <div class='description'>
            <p>${post[postID].des}</p>
        </div>
        <div class='image'>
            <img src='${post[postID].image}' alt=''>
        </div>
        <div class='content'>
            <p>${post[postID].content}</p>
        </div>
        `;
    }
</script>