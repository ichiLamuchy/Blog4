<?PHP
// print_r($_POST)   
?>

<!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>-->
<!------ Include the above in your HEAD tag ---------->
<div class="bg4"> 
    <div class="container">
        <div class="row centered-form">
            <div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Create Account for BlogAreUS </h1>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="" method="post">
                            <div class="row">
                                <div class="col-md-1"></div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="text" name="first_name" id="first_name" class="form-control input-sm" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="text" name="last_name" id="last_name" class="form-control input-sm" placeholder="Last Name">
                                    </div>
                                </div>

                                <div class="col-md-1"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control input-sm" placeholder="Choose a Username" required />
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>

                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" id="confirm_password" class="form-control input-sm" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            &nbsp;
                            <p><small>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</small></p>   
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <input type="submit" value="Submit" href="?controller=user&action=register"class="btn btn-info btn-block" >
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                <a href="index.php?controller=blog&action=viewAll" id="cancel" name="cancel">Cancel</a>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
 var password = document.getElementById("password")
      , confirm_password = document.getElementById("confirm_password");
    function validatePassword(){
      if(password.value !== confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
      } else {
        confirm_password.setCustomValidity('');
      }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>   
