<?php

logout ();
header('Location: /blog/main.php');

function logout (): void {
    foreach ($_COOKIE as $name => $value) {
        setcookie("$name", "", time() - 3600);
    }
}