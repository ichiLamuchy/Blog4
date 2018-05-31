<div class="container">
    <div class="row">
            <div class="panel panel-default" style="margin-top:50px;">
                <div class="panel-heading">  <h2 >User Profile</h2></div>
                <div class="panel-body">

                    <div class="box box-info">

                        <div class="box-body">
                         
                            <div class="col-sm-5 col-xs-6 tital " >First Name:</div><div class="col-sm-7 col-xs-6 "><?= $user->first_name; ?></div>
                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital " >Last Name:</div><div class="col-sm-7"><?= $user->last_name; ?></div>
                            <div class="clearfix"></div>
                            <div class="bot-border"></div>
                           
                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital " >Username:</div><div class="col-sm-7"><?= $user->username; ?></div>

                            <div class="clearfix"></div>
                            <div class="bot-border"></div>

                            <div class="col-sm-5 col-xs-6 tital " >email:</div><div class="col-sm-7"><?= $user->email; ?></div>

                            <div class="clearfix"></div>
                            <div class="bot-border"></div>


                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                    </div>


                </div> 
            </div>
        </div>  
        <script>
            $(function () {
                $('#profile-image1').on('click', function () {
                    $('#profile-image-upload').click();
                });
            });
        </script> 



    </div>

<section>
    <?php // update delete need id - codein php by controller ?>
    
    <!--    <a class ="button" href="?controller=user&action=delete" >Delete your profile</a> -->
    <a class ="button" href="?controller=blog&action=viewAll" >Back to home page</a>

</section>