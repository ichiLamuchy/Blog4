<h1>Update Blog</h1>
    <p>Create a tag that we will use as the editable area.</p>
    <!--You can use a div tag as well.-->
    <form action="?controller=blog&action=update" method="POST" enctype="multipart/form-data">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <input value="<?= $blog->blog_title ?>" style="height:100px; font-size: 2em;" class="form-control" type="text" name="blog_title" placeholder="Blog title"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <input value="<?= $blog->topic ?>" class="form-control" type="text" name="topic" required placeholder="Blog topic"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <input type="file" name="blog_image" id="blog_image">
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1" style="margin-top:10px;">
                <textarea id="edit" name="blog_summary"><?= $blog->blog_summary ?></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1" style="margin-top:20px;">
                <input type="submit">
                 <a href="?controller=blog&action=viewAll">Cancel</a>
                <br>
                <br>
                <br>
            </div>
        </div>
        <!--</div>-->
    </form>
</div>
