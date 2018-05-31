
<?php
/* 
 * Copied from peters PHP
 * please change as you like
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--
        [if lt IE 9]

     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

        [endif]
        -->

        <title>Blog</title>
    </head>
    <body>
        <!-- please keep this php -->
        <?php
    require_once('connection.php');
        
    if (isset($_GET['controller']) && isset($_GET['action'])) {
        $controller = $_GET['controller'];
        $action     = $_GET['action'];
  } else {
        $controller = 'blog';
        $action     = 'viewAll';
  }

    require_once('views/layout.php');
        ?>
        <!--end of php-->
    </body>
</html>