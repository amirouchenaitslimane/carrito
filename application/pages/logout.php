<?php
$_SESSION = [];//reset sessions
session_destroy();
redirect('login');