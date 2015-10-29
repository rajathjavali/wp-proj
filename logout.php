<?php

// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
unset($_SESSION['usn']);
unset($_SESSION['password']);
header('Location: ../bproject');


?>
