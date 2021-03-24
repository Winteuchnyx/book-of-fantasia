<?php
session_start();
session_unset();
session_destroy();
header("location:submitting.html");
?>