<style>
    :root {
        --input-padding-x: 1.5rem;
        --input-padding-y: .75rem;
    }


    html {
        background: #d6d6d6;
    //background: linear-gradient(to right, #defeff, #a3fcff);
    }

    .card-signin {
        border: 0;
        border-radius: 1rem;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
    }

    .card-signin .card-title {
        margin-bottom: 2rem;
        font-weight: 300;
        font-size: 1.5rem;
    }

    .card-signin .card-body {
        padding: 2rem;
    }

    .form-signin {
        width: 100%;
    }

    .form-signin .btn {
        font-size: 80%;
        border-radius: 5rem;
        letter-spacing: .1rem;
        font-weight: bold;
        padding: 1rem;
        transition: all 0.2s;
    }

    .form-label-group {
        position: relative;
        margin-bottom: 1rem;
    }

    .form-label-group input {
        height: auto;
        border-radius: 2rem;
    }

    .form-label-group>input,
    .form-label-group>label {
        padding: var(--input-padding-y) var(--input-padding-x);
    }

    .form-label-group>label {
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        width: 100%;
        margin-bottom: 0;
        /* Override default `<label>` margin */
        line-height: 1.5;
        color: #495057;
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: all .1s ease-in-out;
    }

    .form-label-group input::-webkit-input-placeholder {
        color: transparent;
    }

    .form-label-group input:-ms-input-placeholder {
        color: transparent;
    }

    .form-label-group input::-ms-input-placeholder {
        color: transparent;
    }

    .form-label-group input::-moz-placeholder {
        color: transparent;
    }

    .form-label-group input::placeholder {
        color: transparent;
    }

    .form-label-group input:not(:placeholder-shown) {
        padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
        padding-bottom: calc(var(--input-padding-y) / 3);
    }

    .form-label-group input:not(:placeholder-shown)~label {
        padding-top: calc(var(--input-padding-y) / 3);
        padding-bottom: calc(var(--input-padding-y) / 3);
        font-size: 12px;
        color: #777;
    }

    /* Fallback for Edge
    -------------------------------------------------- */

    @supports (-ms-ime-align: auto) {
        .form-label-group>label {
            display: none;
        }
        .form-label-group input::-ms-input-placeholder {
            color: #777;
        }
    }

    /* Fallback for IE
    -------------------------------------------------- */

    @media all and (-ms-high-contrast: none),
    (-ms-high-contrast: active) {
        .form-label-group>label {
            display: none;
        }
        .form-label-group input:-ms-input-placeholder {
            color: #777;
        }
    }

    .container {
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }



</style>

<div id="randomjscode"></div>
<div class="container" id="signup-form">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <div class = "appendalert"></div>
                    <!-- alert -->
                     <div class="alert alert-danger" id = "alertdanger" style="display:none; text-align: center;">
                         <strong>Attention! <br> </strong> Please enter all information asked below.
                      </div>
                    
                    <div class="alert alert-danger" id = "alertUsername" style="display:none; text-align: center;">
                         <strong>Attention! <br> </strong> Username is already taken.
                      </div>
                    
                    <div class="alert alert-warning" id ="securePassword" style="display:none; text-align: center;">
                        <strong>Warning!</strong> Please enter a secure password.
                    </div>
                    
            
                    
                    
                    <h5 class="card-title text-center">SIGN UP</h5>
                    <form class="form-signin">
                        <div class="form-label-group">
                            <input type="text" id="username" class="form-control" placeholder="username"  autofocus autocomplete="off">
                            <label for="username">Username</label>
                        </div>
                        <div class="form-label-group">
                            <input type="email" id="email" class="form-control" placeholder="email"  autofocus autocomplete="off">
                            <label for="email">Email address</label>
                        </div>
                        
                        <div class="form-label-group">
                            <input type="password" id="password" class="form-control" placeholder="password" onkeydown="checkpassword()" >
                            <label for="password">Password</label>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="button" onClick="doSignUp()" style="margin-top:3%;">Create a new account</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
                    if(isset($_SESSION["error"])){
                        $error = $_SESSION["error"];
                        echo "<span>$error</span>";
                    }
                ?>  


<script>
    
    
    $('#username , #password').keypress(function (e) {
        var key = e.which;
        if(key == 13)
        {
            doLogin();
        }
    });
    
    function checkpassword(){
        var password = document.getElementById('password').value;
        var securepassword = document.getElementById('securePassword');
    
        if (password.match(/[a-z]/g) && password.match(/[A-Z]/g) && password.match(/[0-9]/g) && password.match(/[^a-zA-Z\d]/g) && password.length >= 8) {
            securepassword.style.display = "none";
        } 
        else{
            securepassword.style.display = "block";
        }   
    }
    /*
    function checkUsername(){
        var alertUsername = document.getElementById('alertUsername');
        var username = document.getElementById('username').value;
         $.ajax({
            type: 'POST',
            url: '../tasklist/index.php?action=doSignUp',
            data: {
                username: username,
                checkusernamedb: 1
            },
            beforeSend:function(a){
                a.overrideMimeType('text/html; charset=UTF-8');
            },
            success:function(data){
                window.alert("signup");
                $('#appendalert').append(data);

            },
            error:function(){
                window.alert("ajax1 error");
                location.reload();
            }
        });
        if (document.getElementById('usernameavailability').value != 1){
            alertUsername.style.display = "block";
        }else {
            alertUsername.style.display = "none";
        }
        
    }
    */
    function doSignUp(){
        
        var alertBoxnotAllInfoProvided = document.getElementById("alertdanger");
         
         if(username != "" && email != "" && password != ""){
            alertBoxnotAllInfoProvided.style.display = "none";
            $.when(callajaxwating()).then(function successHandler(data){
                console.log(data);
            }, function errorHandler(){
                console.log("error");
            });
         }
         else{
            
            alertBoxnotAllInfoProvided.style.display = "block";
         }
        
    }
    function callajaxwating(){
        var username = document.getElementById('username').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        return $.ajax({
            type: 'POST',
            url: '../tasklist/index.php?action=doSignUp',
            data: {
                username: username,
                email: email,
                password: password
            }
            });
    }
 
</script>
