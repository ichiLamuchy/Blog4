<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="card thumbnail">
            <div class="card-body" color="lightblue">
                <h3 class="card-title">
                    <?= $post->post_title ?>
                </h3>
                <h5>
                    <span class="w3-opacity">
                        <?= (new DateTime($post->created_at))->format('d F Y') ?>
                    </span>
                </h5>
                <p class="card-text blog-summary">
                    <?= html_entity_decode($post->post_body) ?>
                    <p><i class="fas fa-chevron-circle-left"><a href='?controller=blog&action=show&blog_id=<?php echo $post->blog_id; ?>'> Back to the Blog Page</a></i></p>
                </p>
            </div>
        </div>
    </div>
</div>