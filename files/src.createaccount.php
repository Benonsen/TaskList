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
<div id="appendsignup"></div>
<div class="container" id="signup-form">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">SIGN UP</h5>
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
            url: '../tasklist/index.php?action=doSignUp',
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
