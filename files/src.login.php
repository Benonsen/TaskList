<?php

?>
<link rel="stylesheet" href="../tasklist/style/login.css">
<div id="appendsignup"></div>
<div class="container" id="login-form">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">LOG IN</h5>
                    <form class="form-signin">
                        <div class="form-label-group">
                            <input type="text" id="username" class="form-control" placeholder="username"  autofocus autocomplete="off">
                            <label for="username">Email address or username</label>

                        </div>

                        <div class="form-label-group">
                            <input type="password" id="password" class="form-control" placeholder="password" >
                            <label for="password">Password</label>

                        </div>


                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="button" onClick="doLogin()">Log In</button>
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
</div>


<script>
    $('#username , #password').keypress(function (e) {
        var key = e.which;
        if(key == 13)
        {
            doLogin();
        }
    });
    function doLogin(){
        username = document.getElementById('username').value;
        password = document.getElementById('password').value;

        $.ajax({
            type: 'POST',
            url: '../tasklist/index.php?action=doLogin',
            data: {
                username: username,
                password: password
            },
            beforeSend:function(a){
                a.overrideMimeType('text/html; charset=UTF-8');
            },
            success:function(data){
                location.reload();
            },
            error:function(){
                location.reload();
            }
        });
    }
    function signup(){
        $.ajax({
            type: 'POST',
            url: '../tasklist/index.php?action=1000',
            beforeSend:function(a){
                a.overrideMimeType('text/html; charset=UTF-8');
            },
            success:function(data){
                $('#appendsignup').empty();
                $('#appendsignup').append(data);
                console.log("ajax works");
            },
            error:function(){
                location.reload();
            }
        });
    }
</script>
