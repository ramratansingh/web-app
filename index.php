<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
    body {

        background:#333;
    }

    .form_bg {
        background-color:#76D7C4;
        color:#666;
        padding:20px;
        border-radius:10px;
        position: absolute;
        border:1px solid #fff;
        margin: auto;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 320px;
        height: 280px;
    }

    .align-center {

        text-align:center;
    }
</style>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
	function validateForm() {
    var username = document.forms["loginForm"]["username"].value;
    if (username == "") {
        alert("Username must be filled out");
        return false;
    }
    var password = document.forms["loginForm"]["password"].value;
    if (password == "") {
        alert("Password must be filled out");
        return false;
    }
}
</script>
</head>
<body>
    <marquee><h2 style="color: #337ab7;">User Management Software</h2></marquee>
    <div class="container">
        <div class="row">
            <div class="form_bg">
                <form name="loginForm" action="auth.php" method="post" onsubmit="return validateForm()">
                   <h2 class="text-center">Login</h2>
                   <br/>
                   <div class="form-group">
                    <input type="text" class="form-control" id="username"  name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <br/>
                <div class="align-center">
                    <button type="submit" class="btn btn-success" id="login">Login</button>
                </div>
            </form>
        </div>
    </body>
    </html>