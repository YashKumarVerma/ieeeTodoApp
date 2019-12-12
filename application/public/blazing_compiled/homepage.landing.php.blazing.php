<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title><?php echo $GLOBALS["protected"]["app"]["name"] ?></title>
    <style>
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <link rel="stylesheet" type="text/css" href="http://localhost/ieeetodo//assets/css/material.css"> <link rel="stylesheet" type="text/css" href="http://localhost/ieeetodo//assets/css/animate.css"> 
</head>

<body>
    <nav class="light-blue lighten-1" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="<?php echo $GLOBALS["protected"]["app"]["url"] ?>" class="brand-logo animated fadeInDown">IEEE</a>
            <ul class="right hide-on-med-and-down animated fadeInDown">
                <li>
                    <a data-target="modal1" class="btn-small waves-effect waves-light orange modal-trigger">Login</a>
                </li>
            </ul>
            <ul id="nav-mobile" class="sidenav">
                <li><a href="#">Navbar Link</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <br>
            <br>
            <h1 class="header center orange-text animated tada"><?php echo $GLOBALS["protected"]["app"]["name"] ?></h1>
            <div class="row center">
                <h5 class="header col s12 light animated fadeInUp"><?= $message ?></h5>
            </div>
            <div class="row center animated fadeInUp">
                <button data-target='modal2' class="btn-large waves-effect waves-light orange modal-trigger">
                    Create Account</a>
            </div>
            <br>
            <br>
        </div>
    </div>
    <div class="container">
        <div class="section">
            <div class="row">
                <div class="col s12 m4">
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>
    <footer class="page-footer light-blue lighten-1">
        <div class="footer-copyright">
            <div class="container">
                <a class="white-text " href="https://github.com/YashKumarVerma/ieeeTodoApp">Submission for IEEE CCS</a>
            </div>
        </div>
    </footer>
    <!-- modal1 content -->
    <div id="modal1" class="modal">
        <form method="post" action="<?php echo $GLOBALS["protected"]["app"]["url"] ?>" class="col s12">
            <div class="modal-content">
                <h4>Login</h4>
                <!-- form -->
                <div class="row">
                    <input type="hidden" name="login" value="login">
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <input name="username" placeholder="Username" id="username" type="text" class="validate" required="" aria-required="true">
                            <label for="username">First Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <input name="password" placeholder="Password" id="password" type="password" class="validate" required="" aria-required="true">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <!-- form ends -->
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <button type="submit" name="action" class="btn-small waves-effect waves-light orange">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- modal1 content ends -->
    <!-- modal2 content -->
    <div id="modal2" class="modal">
        <form method="post" action="<?php echo $GLOBALS["protected"]["app"]["url"] ?>" class="col s12">
            <div class="modal-content">
                <h4>Sign Up</h4>
                <!-- form -->
                <div class="row">
                    <input type="hidden" name="signup" value="signup">
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <input name="name" placeholder="Full Name" id="name" type="text" class="validate" required="" aria-required="true">
                            <label for="name">Full Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <input name="username" placeholder="Username" id="username" type="text" class="validate" required="" aria-required="true">
                            <label for="username">Username</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <input name="password" placeholder="Password" id="password" type="password" class="validate" required="" aria-required="true">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <input name="password2" placeholder="Conform Password" id="password2" type="password" class="validate" required="" aria-required="true">
                            <label for="password2">Password</label>
                        </div>
                    </div>
                    <!-- form ends -->
                    <div class="row">
                        <div class="input-field col s12 m12">
                            <button type="submit" name="action" class="btn waves-effect waves-light orange">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- modal2 content ends -->
</body>
<script type="text/javascript" src="http://localhost/ieeetodo//assets/js/jquery.js"></script><script type="text/javascript" src="http://localhost/ieeetodo//assets/js/material.js"></script>
<script>
    $(document).ready(function() {
        $('.sidenav').sidenav();
        $('.modal').modal();
    });
</script>

</html>