<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="Foundation Sixty 6 fav icon" type="image/svg" href="../images/logo_lightbox.svg"/>
    <link rel ="stylesheet" href="../css/main.css">
    <link rel ="stylesheet" href="../css/grid.css">
    <script type="module" src="../js/main.js"></script>

</head>
<body data-page="login-cms">
    <div class="grid-con" id="login-website">
        <h1 class="hidden">Login - Foundation Sixty6</h1>
        <div class="col-span-full l-col-span-full" id="container-login">
            <div id="login-form" class="inside-login">
                <img src= "../images/FSixty6-logo.svg" alt="Logo" class="logo"/>
        
                <form action="login.php" method="post" id="login-input">
                    <label for="username"></label>
                    <input type="text" name="username" id="text" placeholder="Username">
                    <label for="password"></label>
                    <input type="password" name="password" id="password" placeholder="Password">
                    <input type="submit" value="LOG IN" id="login-button">
                    </form>
            </div>
            <div id="login-image" class="inside-login hidden">
                <img src="../images/login_1920.png" alt="Log In Image">
            </div>
        </div>
    </div>
</body>
</html>