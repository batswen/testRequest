<?php
/*
prüft alle angegebenen Befehle in $_REQUEST und fügt sie $_SESSION['command'] hinzu
tests all given commands in $_REQUEST and adds them to $_SESSION['command'].

test with:	(localhost/)test.php?dontrender=true&debug=1	result: 200 OK (internal: $_SESSION['command'] = ['dontrender' => true, 'debug' => 1];)
			(localhost/)test.php							result: No command given (test.php)\nDebug: "Array ( [debug] => 1 [dontrender] => true ) "
*/
function testRequest() {
	# Liste der Befehle / Array of commands
	$idxarray = ['debug', 'dontrender', 'title', 'id'];
	$found = false;
	$error = false;
	
	// Sucht alle Befehle / Searches for all commands
	foreach($idxarray as $index) {
		if (isset($_REQUEST[$index])) {
			$_SESSION['command'][$index] = $_REQUEST[$index];
			$found = true;
		}
	}
	
	// Sucht nach falschen/unbekannten Befehlen
	// Looks for misspelled/unknown commands
	foreach($_REQUEST as $key => $value) {
		if (!in_array($key, $idxarray)) {
			$error = true;
		}
	}
	
	if ($error) {
		die('400 Bad request');
	}
	if ($found) {
		die('200 OK');
	}
	echo 'No command given (test.php)<br>';
}
// wird nicht benötigt, ausser Du willst die beiden urls von oben ausprobieren
// not needed, except you try the two urls above
session_start(); 

testRequest();
if (!empty($_SESSION['command']['debug']) && $_SESSION['command']['debug'] == 1) {
	echo 'Debug: "'; print_r($_SESSION['command']); echo '"';
}

