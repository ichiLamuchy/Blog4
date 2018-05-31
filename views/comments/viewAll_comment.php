<h3>Comments
    <span class="badge badge-light">
        <?= count($comments)?>
    </span>
</h3>

<?php if(empty($comments)){ 
    echo "Noone has commented on this post yet";
} else { //loop thru comments to display     
    $_SESSION['post_id'] = $_GET['post_id'];    //so can return to correct post if comment deleted 
    foreach($comments as $comment) { ?>
<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <div class="panel panel-white post panel-shadow">
            <div class="post-heading">
                <div class="pull-left meta">
                    <div class="title h5">
                        <a href="#">
                            <b>
                                <?= $comment->user->first_name ?>
                                    <?= $comment->user->last_name ?>
                            </b>
                        </a>
                        made a post.
                    </div>
                    <h6 class="text-muted time">
                        <?= (new DateTime($comment->created_at))->format('d F Y H:i') ?>
                    </h6>
                </div>
            </div>
            <div class="post-description">
                <p>
                    <?= $comment->comment_body?>
                </p>
                <?php 
                    // if it is logged in users comment show "delete button"
                    if (isset($_SESSION['user_id']) && $_SESSION['user_id']==$comment->user_id) {  ?>
                        <a href='?controller=comment&action=delete&comment_id=<?= $comment->id; ?>'>Delete Comment</a> &nbsp; &nbsp;
                    <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php } ?>


<div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <?php // if user logged in
            if (!empty($_SESSION['username'])){ ?>
        <div>
            <h3>Add comment here!</h3>
            <form action="?controller=comment&action=viewAll&post_id=<?= $_GET['post_id'] ?>" method="POST">

                <textarea class="comment_body" name="comment_body" rows="5" cols="60" placeholder="Write your comment here"></textarea>
                <!-- need to check this href with controller probably if post then process of add-->
                <input type="submit" name="add" />

                <a href="?controller=post&action=&post_id=<?= $_GET['post_id']; ?>">Cancel</a>
            </form>
            <?php } ?>
        </div>
    </div>
</div>
