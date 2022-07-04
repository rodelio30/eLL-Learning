<?php

// transaction logout history

include 'transaction_logout.php';

session_unset();
session_destroy();

header("location: ../pages-sign-in.php");