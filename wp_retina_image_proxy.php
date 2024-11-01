<?php
   $document_root = $_SERVER['DOCUMENT_ROOT'];
   $requested_uri = parse_url(urldecode($_SERVER['REQUEST_URI']), PHP_URL_PATH);
   $requested_file = basename($requested_uri);
   preg_match("/[\w\/\\\\-]+/", $_SERVER['REQUEST_URI'], $matches);
   $requested_file_without_extension = $matches[0];
   $extension = strtolower(pathinfo($_SERVER['REQUEST_URI'], PATHINFO_EXTENSION));

   if (isset($_COOKIE['IsRetina'])) {
   		$retina_file_name = $document_root . $requested_file_without_extension . "-2x." . $extension;

   		if ($_COOKIE['IsRetina'] === "1" && file_exists($retina_file_name)) {
   				sendImageToBrowser($retina_file_name);
   		}
   }
   
   $regular_file_uri = $document_root . $requested_uri;
   sendImageToBrowser($regular_file_uri);
   
   function sendImageToBrowser($file_uri)
   {
   		$extension = strtolower(pathinfo($file_uri, PATHINFO_EXTENSION));
   		if (in_array($extension, array('png', 'gif', 'jpeg'))) {
   				header("Content-Type: image/" . $extension);
   		} else {
   				header("Content-Type: image/jpeg");
   		}
   		header('Content-Length: ' . filesize($file_uri));
   		readfile($file_uri);
   		exit();
   }