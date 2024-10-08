<?php

function redirectToErrorPage(): never {
    header("Location: /error");
    exit(); // This function will not return
}

redirectToErrorPage(); // Redirects and ends script execution
