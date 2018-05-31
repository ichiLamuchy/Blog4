<?php

/* 
 * form for comment - need to be shown within showpost if possible
 */
?>
<style>
    .comment_body  { 
       font-size: 20px;
       margin: 5px;
    }
</style>
<section>
    <div>
    <h3>Add your comment here!</h3>
    <br>
        <form action="" method="post" >
       
            <textarea class="comment_body" name="comment_body" rows="5" cols="60" placeholder="Write your Story here">
            </textarea>
            <!-- need to check this href with controller probably if post then process of add-->
            <input type="submit" name="add" href=?controller=comment&action=create&post_id=<?= $_GET['post_id']; ?>" />

            <a href="?controller=post&action=show&post_id=<?= $_GET['post_id']; ?>">Cancel</a>
        </form>
    </div>        
</section>
