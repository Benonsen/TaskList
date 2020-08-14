
<link rel="stylesheet" href="style/login.css">

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">LOG IN</h5>
                    <form class="form-signin" action="files/login.inc.php" method="POST">
                        <div class="form-label-group">
                            <input type="email" id="mailuid" class="form-control" placeholder="Email address or username"  autofocus autocomplete="off">
                            <label for="mailuid">Email address or username</label>
                        </div>

                        <div class="form-label-group">
                            <input type="password" id="pwd" class="form-control" placeholder="Password" >
                            <label for="pwd">Password</label>
                        </div>


                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="login-submit">Log In</button>
                        <a  href="files/signup.php">
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" style="margin-top: 3%">Sign In</button>
                        </a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
