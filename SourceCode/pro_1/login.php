<?php
require_once('session/initalize.php');
require_once('database/database.php');

$errors = [];

function isFormValidated(){
    global $errors;
    return count($errors) == 0;
}

function checkForm(){
    global $errors;
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    if(empty($_POST['username'])){
        $errors[] = 'Username is required';
    }

    if(empty($_POST['password'])){
        $errors[] = 'Password is required';
    }
    if(!check_login($username, $password)){
        $errors[] = 'Username or password is incorrect';
    }
    
}

if($_SERVER["REQUEST_METHOD"] == 'POST') {
    checkForm();
    if (isFormValidated()){
        $username = isset($_POST['username'])? $_POST['username']: '';
        $_SESSION['username'] = $username;
        redirect_to('index.php');
    }
} else { 
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        div.error{
            border: thin solid red; 
            display: center;
            padding: 5px;
        }
        form{
            border: thin solid black; 
            display: center;
            padding:10px;
            text-align: center;
            background-color : white;
            width: 50%;
        }
        form{
            max-width: 500px;
             margin: auto;
        }
    </style>
</head>
<body>
<div class="a"> 
    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST' && !isFormValidated()): ?> 
        <div class="error">
            <span> Please fix the following errors </span>
            <ul>
                <?php
                foreach ($errors as $key => $value){
                    if (!empty($value)){
                        echo '<li>', $value, '</li>';
                    }
                }
                ?>
            </ul>
        </div><br><br>
    <?php endif; ?>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <div class="form-inline">
        <label for="username">Username <span class="glyphicon glyphicon-user"></span></label>
        <input type="text" id="username" name="username"  class="form-control" 
        value="<?php echo isFormValidated()? '': $_POST['username'] ?>">
        </div>     
        <br><br>
    <div class="form-inline">    
        <label for="password">Password <span class="glyphicon glyphicon-lock"></span> </label> 
        <input type="password" id="password" name="password"  class="form-control"
        value="<?php echo isFormValidated()? '': $_POST['password'] ?>">  
        </div> 
        <br><br>
        <input type="submit" class="btn btn-primary" name="submit" value="Login" />   
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </form>

</div> 
</html>