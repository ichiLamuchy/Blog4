<h1>Create Post</h1>
Document a sub-topic with a new post! 
<form action="index.php?controller=post&action=create" method="POST">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <input style="height:100px; font-size: 2em;" class="form-control" type="text" name="post_title" placeholder="Enter title"/>
            </div>
        </div>
        <div class="row">
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1" style="margin-top:10px;">
                <textarea id="edit" name="post_body"></textarea>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-10 col-md-offset-1" style="margin-top:20px;">
                <input type="submit" name="submit" />
            </div>            
        </div>
    </div>
    <input type="hidden" name="blog_id" value="<?= $_GET['blog_id'] ?>"/>        
</form>
<!-- navigate back -->
<a href="?controller=blog&action=show&blog_id=<?= $_GET['blog_id']; ?>">Cancel</a>

