<!-- Include Font Awesome. -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"
/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css"
/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/css/froala_style.min.css" rel="stylesheet" type="text/css"
/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css" />
<div class="bg4">
    <h1>Create Blog</h1>
    <p class = "sub-heading1">Capture your audience with your title and summary!</p>
    <!--You can use a div tag as well.-->
    <form action="index.php?controller=blog&action=create" method="POST" enctype="multipart/form-data">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <input style="height:100px; font-size: 2em;" class="form-control" type="text" name="blog_title" placeholder="Blog title"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <input class="form-control" type="text" name="topic" required placeholder="Blog topic"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <input type="file" name="blog_image" id="blog_image" required="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1" style="margin-top:10px;">
                <textarea id="edit" name="blog_summary"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1" style="margin-top:20px;">
                <input type="submit">
                <br>
                <br>
                <br>
            </div>
        </div>
        <!--</div>-->
    </form>
</div>