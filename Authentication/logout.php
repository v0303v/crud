<?php
session_start();

if (session_destroy()) {
    echo $_SERVER['../../index.php'];
} 