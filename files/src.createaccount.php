<?php
echo "hello world!";
?>
<script>
    window.alert("sadfasdf");
</script>
<link rel="stylesheet" href="../tasklist/style/login.css">

<div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
            <div class="card-body">
                <h5 class="card-title text-center">SIGN IN</h5>
                <form class="form-signin">
                    <div class="form-label-group">
                        <input type="text" id="username" class="form-control" placeholder="username"  autofocus autocomplete="off">
                        <label for="username">Email address or username</label>

                    </div>

                    <div class="form-label-group">
                        <input type="password" id="password" class="form-control" placeholder="password" >
                        <label for="password">Password</label>

                    </div>


                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="button" onClick="signup()" style="margin-top:3%;">Create a new account</button>
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


