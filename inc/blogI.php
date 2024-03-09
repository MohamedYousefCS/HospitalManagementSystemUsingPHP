<div class="col-lg-8 py-5">
    <?php
    $main_post = "SELECT * FROM `posts` WHERE post_id=(SELECT MAX(post_id) FROM `posts`)";

    $posts = mysqli_query($mysqli, $main_post);
    while ($row = mysqli_fetch_assoc($posts)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_date = $row['post_date'];
        $post_content = substr($row['post_content'], 0, 150);
        $post_image = $row['post_image'];

    ?>
        <!-- Featured blog post-->
        <div class="card mb-4">
            <a href="#!"><img class="card-img-top" src="./backend/admin/assets/images/blog/<?= $post_image ?>" alt="..." /></a>
            <div class="card-body">
                        <div class="small text-muted"><?= $post_date ?></div>
                        <h2 class="card-title h4"><?= $post_title ?></h2>
                        <p class="card-text"><?= $post_content ?>...</p>
                        <a class="btn btn-primary" href="post.php?pid= <?= $post_id ?> ">Read more →</a>
                    </div>
        </div>
    <?php  } ?>
    <!-- Nested row for non-featured blog posts-->
    <div class="row">
        <?php
        $sql = "SELECT * FROM `posts`";
        $posts = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_assoc($posts)) {
            $post_id = $row['post_id'];
            $post_title = substr($row['post_title'], 0, 20);
            $post_date = $row['post_date'];
            $post_content = substr($row['post_content'], 0, 150);
            $post_image = $row['post_image'];

        ?>
            <div class="col-lg-6">
                <!-- Blog post-->
                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="./backend/admin/assets/images/blog/<?= $post_image ?>" height="200" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted"><?= $post_date ?></div>
                        <h2 class="card-title h4"><?= $post_title ?></h2>
                        <p class="card-text"><?= $post_content ?>...</p>
                        <a class="btn btn-primary" href="post.php?pid= <?= $post_id ?> ">Read more →</a>
                    </div>
                </div>
                <!-- Blog post-->
            </div>
        <?php  } ?>


    </div>
    <!-- Pagination-->
    <nav aria-label="Pagination">
        <hr class="my-0" />
        <ul class="pagination justify-content-center my-4">
            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
            <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
            <li class="page-item"><a class="page-link" href="#!">2</a></li>
            <li class="page-item"><a class="page-link" href="#!">3</a></li>
            <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
            <li class="page-item"><a class="page-link" href="#!">15</a></li>
            <li class="page-item"><a class="page-link" href="#!">Older</a></li>
        </ul>
    </nav>
</div>