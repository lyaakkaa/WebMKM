<?php
session_start();

if (isset($_POST['logout'])) {
    header("Location: ".$_SERVER['PHP_SELF']);
    session_destroy();

}

$isAuthenticated = isset($_SESSION["username"]);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
<h2>Welcome, <?php echo $isAuthenticated ? $_SESSION["username"] : "Guest"; ?>!</h2>

<p>Сессии в веб-разработке представляют собой временные периоды взаимодействия между пользователем и веб-приложением. Они играют важную роль в сохранении состояния между различными запросами от одного пользователя, обеспечивая персонализированный и непрерывный опыт.</p>
<p>
    <?php
    if ($isAuthenticated) {
        echo "You logged in ";

        $loginTime = $_SESSION["login_time"];
        $timeElapsed = time() - $loginTime;

        echo $timeElapsed . " seconds ago.";
    }
    ?>
</p>
<?php
if ($isAuthenticated) {
    ?>
    <form method="post">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Settings</a></li>
            <li><button type="submit" name="logout">Log out</button></li>
        </ul>
    </form>
    <?php
} else {
    ?>
    <a href="login.html">Log in</a> <br>
    <a href="registration.html">Registration</a>
    <?php
}
?>

</body>
</html>
