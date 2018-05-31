<section style="padding-bottom: 20px; border-bottom-color: gray;" />

<div class="row" >
    <div class="col-sm-8 col-sm-offset-2" style="margin-top: 30px;">
        <div class="card">
            <div class="card-header" style="margin-top: 10px;">
                <img src="<?= $blog->blog_image ?>" alt="" width="400">
            </div>
            <div class="card-body">
                <h1 class="card-title">
                    <?= $blog->blog_title ?>
                </h1>
                <h5>
                    <span class="w3-opacity">
                        Published
                        <?= (new DateTime($blog->date_created))->format('d F Y') ?>
                    </span>
                </h5>
                <p class="card-text blog-summary">
                    <?= html_entity_decode($blog->blog_summary) ?>
                </p>
            </div>
        </div>
    </div>
</div>

<div>
  <?php if (!empty($_SESSION['user_id']) && $_SESSION['user_id'] === $blog->user_id) : ?>
        <a href="?controller=post&action=create&blog_id=<?= $blog->id ?>" class="button js-button" role="button"><i class="fas fa-plus-circle"></i>Create Post</a>
        <a href="?controller=blog&action=update&blog_id=<?= $blog->id ?>" class="button js-button" role="button"><i class="far fa-edit"></i>Edit Blog</a>
        <a href="?controller=blog&action=delete&blog_id=<?= $blog->id ?>" class="button js-button" role="button"><i class="fas fa-trash-alt"></i>Delete Blog</a>
        <?php endif; ?>
</div>

 <div style = "margin-top: 10px">
        <a href="https://twitter.com"><i class="fab fa-twitter" style="font-size: 40px; color:	#FFA500;"></i></a>
        <a href="https://facebook.com"><i class="fab fa-facebook" style="font-size: 40px;"></i></a>
        <a href="https://github.com/The4Rogues/Blog3/tree/master"><i class="fab fa-github" style="font-size: 40px; color: gray;"></i></a>
    </div>