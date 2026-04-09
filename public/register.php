<?php require_once '../template/header.php'; ?>
<?php require_once 'db_config.php'; ?>
<title>Register New Account</title>
</head>
<body>

<div class="container">
    <div class="header clearfix">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contacts.php">Contact</a></li>
            </ul>
        </nav>
        <h3 class="text-muted">Create an Account</h3>
    </div>

    <div class="mainarea">
        <form action="" method="post">
            <h2>Registration Form</h2>
            <label for="username">Username:</label>
            <input type="text" name="new_username" id="username" class="form-control" required minlength="3">
            <br>
            <label for="password">Password:</label>
            <input type="password" name="new_password" id="password" class="form-control" required minlength="4">
            <br>
            <button type="submit" name="register" class="button">Register</button>
        </form>

        <?php
        if(isset($_POST['register'])) {
            $newUser = trim($_POST['new_username']);
            $newPass = trim($_POST['new_password']);

            // Validation
            if(empty($newUser) || empty($newPass)) {
                echo '<p style="color:red;">Username and password are required.</p>';
            } elseif(strlen($newUser) < 3 || strlen($newPass) < 4) {
                echo '<p style="color:red;">Username must be at least 3 chars, password at least 4 chars.</p>';
            } else {
                $hashedPassword = password_hash($newPass, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
                try {
                    $stmt->execute([$newUser, $hashedPassword]);
                    echo '<p style="color:green;">Registration successful! <a href="login.php">Log in</a></p>';
                } catch(PDOException $e) {
                    if($e->errorInfo[1] == 1062) {
                        echo '<p style="color:red;">Username already exists. Please choose another.</p>';
                    } else {
                        echo '<p style="color:red;">Database error: ' . $e->getMessage() . '</p>';
                    }
                }
            }
        }
        ?>
    </div>
</div>

<?php require_once '../template/footer.php'; ?>