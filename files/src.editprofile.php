<?php
require_once '../TaskList/classes/class.userdao.php';

$usersetting = userdao::getUserInfo($_SESSION['user']['id']);

//var_dump($usersetting);

?>
<div class="container" id="login-form">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">LOG IN</h5>
                    <form class="form-signin">
                        <div class="form-label-group">
                            <img class='w-20 h-20 object-cover rounded-full' src="data:image/jpeg;base64,<?php echo base64_encode($usersetting->profile_picture) ?>">
                            
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="username" class="form-control" value="<?php echo $usersetting->email ?>" autofocus autocomplete="off">
                            <label for="username">E-MAIL ADDRESS</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="username" class="form-control" value="<?php echo $usersetting->username ?>" autofocus autocomplete="off">
                            <label for="username">USERNAME</label>
                        </div>

                        <div class="form-label-group">
                            <input type="password" id="changepassword" class="form-control" placeholder="password" onkeyup="showrepeatpassword()">
                            <label for="changepassword">CHANGE PASSWORD</label>
                        </div>
                        <div class="form-label-group" id="repeatpassworddiv" style="display:none;">
                            <input type="password" id="repeatpassword" class="form-control" placeholder="password">
                            <label for="repeatpassword">REPEAT PASSWORD</label>
                        </div>


                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="button" onClick="doLogin()">Log In</button>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="button" onClick="opensignupform()" style="margin-top:3%;">Create a new account</button>
                        <!--
                        <a  href="files/signup.php">
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" style="margin-top: 3%">Sign In</button>
                        </a>
-->

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    function showrepeatpassword() {
        var password_edit = document.getElementById('changepassword');
        var password_repeat = document.getElementById('repeatpassworddiv');

        if (password_edit.value !== "") {
            if (password_repeat.style.display === "none") {
                password_repeat.style.display = "block";
            }
        } else {
            password_repeat.style.display = "none";
        }
    }
</script>