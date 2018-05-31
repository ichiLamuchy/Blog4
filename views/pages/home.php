<!DOCTYPE html>
<!--
This is actually viewAll_blog. This page can be deleted later.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="main.css" rel="stylesheet" type="text/css" />
        <title>Front Page</title>
    </head>
    <body>
        <div class="bg">       
       
        <div>

<ul>
  <li style="float:left"><a class="active" href="home.php">Home</a></li>  
  <li style="float:left"><a href="#about">About</a></li> 
  <li style="float:left"><a href="#search">Search</a></li> 
 <li><a href="login.php">Login</a></li>
 <!--<li><a class="disabled" href="#login">Login</a></li>-->
 <li><a href="create_account.php">Create Account</a></li>
 <!--<li><a class="disabled" href="create_account">Create Account</a></li> -->
</ul>

  
</div>
            
             <h1>BlogsAreUs</h1>  <!-- this needs to be centered and styled -->
            
           <form action="" method="post">
      
      <!-- These all need to be styled and spaced -->
       
    <!-- 
    <div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="#about">About</a>
  <a href="#search">Search</a>
  <a href="#login">Login</a>
  <a href="#create account">Create Account</a>
</div>
    
    
      <div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="#about">About</a>
  <a href="#search">Blogs</a>
  <a href="login.php">Login</a>
  <a href="CreateAccount.php">Create Account</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  
  </a>
  
  -->

<!--
<div style="padding-centre:16px">
  
</div> -->

<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
            
                 
     <br>
     <br>
     <br>
     
     <!-- This all needs to be centered and styled -->
               <?php
               
               echo "your voice, your story, " . '<br>';
               echo "your idea's, your blog" . '<br>';
               echo '<br>';
               echo '<br>';
               
               echo "Create an online presence that is truly yours, and share it with the world". '<br>';
               echo '<br>';
               echo '<br>';
               
               ?>
               
     <!--
               <input type="submit" value="Create your Blog" /> <br>
               <br>
               <br>
               
           -->    
          <!-- This needs to be styled and sit at the bottom left corner of the page --> 
          
               <?php
              // echo "Created by The6Rogues 2018" . '<br>';
              // echo "Contact us at support@gmail.com";
               
      
           ?>
     
           
    <div class="preview" class="clearfix">
        <img class="preview_pic" src="../images/sky.png" alt="Sky Logo" width="200" float: right/>
        Here is some sample content from a blog. 
        There will be lots of words here however the entire blog post will not be here. 
        It will be a snippet of a few hundred characters from within the database. <br>
        <a href="error.php" class="readmore" style="vertical-align:middle"><span>Read More</span></button></a>
    </div>
         
        <div class="preview" class="clearfix">
        <img class="preview_pic" src="../images/getintotech.png" alt="Sky Logo" height="120" float: right/>
        Here is some sample content from a blog. 
        There will be lots of words here however the entire blog post will not be here. 
        It will be a snippet of a few hundred characters from within the database.<br>
        <a href="error.php" class="readmore" style="vertical-align:middle"><span>Read More</span></button></a>
    </div>
    
        <div class="preview" class="clearfix">
        <img class="preview_pic" src="../images/bbq.png" alt="Sky Logo" width="200" float: right/>
        Here is some sample content from a blog. 
        There will be lots of words here however the entire blog post will not be here. 
        It will be a snippet of a few hundred characters from within the database.<br>
        <a href="error.php" class="readmore" style="vertical-align:middle"><span>Read More</span></button></a>
    </div>

      <!-- images still to be added -->
           
        </form>
           
        </div>
        <?php
        // put your code here
         echo '<br>';
         echo '<br>';
         echo '<br>';
         echo '<br>';
         echo '<br>';
         echo '<br>';
         echo '<br>';
         echo '<br>';
         echo '<br>';
         echo '<br>';
         echo '<br>';
         echo '<br>';
         echo '<br>';
         echo '<br>';
         echo '<br>';
         echo '<br>';
        ?>
        
       
        <div>
        <footer>
            
          <!--  Created by The6Rogues 2018 <br>
            For support contact us at support@BlogsAreUs.com -->
            
        </footer>
        </div>
    </body>
</html>


