$loggedIn = false;
if(file_exists('users.txt')) {
    $users = file('users.txt', FILE_IGNORE_NEW_LINES);
    foreach($users as $userLine) {
        list($storedUser, $storedHash) = explode('|', $userLine);
        if($submittedUser == $storedUser && password_verify($submittedPass, $storedHash)) {
            $loggedIn = true;
            break;
        }
    }
}
if($loggedIn) {
    $_SESSION['Username'] = $submittedUser;
    $_SESSION['Active'] = true;
    header("location: index.php");
    exit;
} else {
    echo '<p style="color:red;">Incorrect Username or Password</p>';
}