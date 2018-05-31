<h2>All posts:</h2>

<?php foreach($posts as $post) { ?>
<div class="col-sm-6 col-sm-offset-3">
  <div class="panel panel-white post panel-shadow">
    <div class="post-heading">
      <div class="title h3">
        <a href='?controller=post&action=show&post_id=<?php echo $post->id; ?>'>
            <?=$post->post_title?>
        </a>
      </div>
      <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id']==$post->blog->user_id) {?>
      <a class="btn btn-danger" href='?controller=post&action=delete&post_id=<?php echo $post->id; ?>'>Delete Post</a> &nbsp; &nbsp;
      <a class="btn btn-info" href='?controller=post&action=update&post_id=<?php echo $post->id; ?>'>Update Post</a> &nbsp;
      <?php } ?>
    </div>
  </div>
</div>
<?php } ?>
