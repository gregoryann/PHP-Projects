<!DOCTYPE html>
<html>
	<head>
		<title>Simple Poll</title>
		<style type="text/css">
			.outer {
				width: 300px;
				height: 10px;
				border: 1px solid #000;
				background-color: #fff;
			}
			.inner {
				height: 10px;
				background-color: #690;
			}
		</style>
	</head>
<body>
		
		
		<?php

			// suppress error notices
			error_reporting(E_ALL & ~E_NOTICE);
            
	          // database credentials
			$db_user = 'root';
			$db_password = '';
			$db_host = 'localhost';
			$db_name = 'dw'; 
