<?php
	//define db infomation
	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_NAME", "eshop");
	//define URL
	define("ROOT_PATH", "/eshop");
	define("ROOT_URL", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]"."/eshop/");
?>