<?php

/*
	Written by Supun Kavinda, Admin of Hyvor
	2018.05.06
*/

$host = 'localhost';
$user = 'u904533129_serte';
$password = 'Nitro250';
$database = 'u904533129_serte';

$mysqli = new mysqli($host, $user, $password, $database);

$username = $_GET['nombcli'];
$startFrom = $_GET['startFrom'];

// validate - https://developer.hyvor.com/php/input-validation-with-php
$username = trim(htmlspecialchars($username));
$startFrom = filter_var($startFrom, FILTER_VALIDATE_INT);

// make username search friendly
$like = '%' . strtolower($username) . '%'; // search for a the username, case-insensitive (see strtolower() here and MYSQL lower() function in the query)
// open new mysql prepared statement
$statement = $mysqli -> prepare('
	SELECT Nombre, Celular, Email FROM clientes 
	WHERE lower(Nombre) LIKE ? 
	ORDER BY INSTR(Nombre, ?), Nombre
	LIMIT 6 OFFSET ?
');

if (
	// $mysqli -> prepare returns false on failure, stmt object on success
	$statement &&
	// bind_param returns false on failure, true on success
	$statement -> bind_param('ssi', $like, $username, $startFrom ) &&
	// execute returns false on failure, true on success
	$statement -> execute() &&
	// same happens in store_result
	$statement -> store_result() &&	
	// same happens here
	$statement -> bind_result($Nombre, $Celular, $Email)
) {
	// I'm in! everything was successful.

	// new array to store data 
	$array = [];


	while ($statement -> fetch()) {
		$array[] = [
			'Nombre' => $Nombre,
			'Celular' => $Celular,
			'Email' => $Email
		];
	}

	echo json_encode($array);
	exit();


}
