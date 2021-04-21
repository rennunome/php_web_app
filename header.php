<?php
session_start();
require 'db_connection.php';

function getParameter($key) {
    if (isset($_GET[$key])) {
        return $_GET[$key];
    } else if (isset($_POST[$key])) {
        return $_POST[$key];
    }
    return null;
}
?>
		<div align="right">
		<form action="login.php"  method="post">
			<input type="submit" value="logout">
		</form>
		<form action="index.php"  method="post">
			<input type="submit" value="top">
		</form>
		</div>
