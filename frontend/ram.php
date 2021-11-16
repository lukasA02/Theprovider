<?php
session_start();
if(isset($_SESSION['mm']))
    echo $_SESSION['mm'];
    session_destroy();