<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"
/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css"
/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/css/froala_style.min.css" rel="stylesheet" type="text/css"
/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css" />
<div class="bg4">
    <h1>Update Post</h1>
    <p>Create a tag that we will use as the editable area.</p>
    <!--You can use a div tag as well.-->
    <form action="?controller=post&action=update" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="post_id" value="<?= $_GET['post_id'] ?>">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <input value="<?= $post->post_title ?>" style="height:100px; font-size: 2em;" class="form-control" type="text" name="post_title" placeholder="Post title"/>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-10 col-md-offset-1" style="margin-top:10px;">
                <textarea id="edit" name="post_body"><?= $post->post_body ?></textarea>
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

