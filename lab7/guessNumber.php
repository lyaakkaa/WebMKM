<?php
session_start();

if (!isset($_SESSION['attempts'])) {
    $_SESSION['attempts'] = 3;
    $_SESSION['number_to_guess'] = 3;
}

$user_guess = $_POST['user_guess'];
$attempts = $_SESSION['attempts'];

if ($user_guess == $_SESSION['number_to_guess']) {
    echo "You win!";
    session_destroy();
} else {
    echo "Incorrect guess.";
    $attempts--;

    if ($attempts > 0) {
        echo " You have $attempts attempts remaining.";
        $_SESSION['attempts'] = $attempts;
    } else {
        echo " You lose. Out of attempts.";
        session_destroy();
    }
}
?>