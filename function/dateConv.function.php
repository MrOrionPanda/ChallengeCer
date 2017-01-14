<?php
function dateSQLToPHP($dateSQL){
	if (DateTime::createFromFormat('Y-m-d H:i:s', $dateSQL) !== false){
		return DateTime::createFromFormat('Y-m-d H:i:s', $dateSQL);
	}
	return null;
}

function datePHPToSQL($datePHP){
		return $datePHP->format('Y-m-d H:i:s');
	}