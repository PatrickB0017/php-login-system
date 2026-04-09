<?php
session_start();
require_once 'db_config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/signin.css">
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
    <title>Sign in</title>
</head>
<body>

<div class="container">
    <form action="" method="post" name="Login_Form" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUsername">Username</label>
        <input name="Username" type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus minlength="3">
        <label for="inputPassword">Password</label>
        <input name="Password" type="password" id="inputPassword" class="form-control" placeholder="Password" required minlength="4">
        <div class="checkbox">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button name="Submit" value="Login" class="button" type="submit">Sign in</button>
    </form>

    <?php
    if(isset($_POST['Submit']) && $_POST['Submit'] == 'Login') {
        $submittedUser = trim($_POST['Username']);
        $submittedPass = trim($_POST['Password']);

        if(empty($submittedUser) || empty($submittedPass)) {
            echo '<p style="color:red;">Username and password are required.</p>';
        } elseif(strlen($submittedUser) < 3 || strlen($submittedPass) < 4) {
            echo '<p style="color:red;">Username must be at least 3 chars, password at least 4.</p>';
        } else {
            $stmt = $pdo->prepare("SELECT password FROM users WHERE username = ?");
            $stmt->execute([$submittedUser]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if($user && password_verify($submittedPass, $user['password'])) {
                $_SESSION['Username'] = $submittedUser;
                $_SESSION['Active'] = true;
                header("location: index.php");
                exit;
            } else {
                echo '<p style="color:red;">Incorrect Username or Password</p>';
            }
        }
    }
    ?>
</div>

</body>
</html>