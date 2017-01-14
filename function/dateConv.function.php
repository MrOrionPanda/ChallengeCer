<?php
/**
	Méthode a appeler après chaque remplissage de la date + heure via la BD, transforme la date +heure SQL en DateTime php
	Sinon retourne juste la date SQL en  PHP 
	*/
function dateSQLToPHP($dateSQL){
	if (DateTime::createFromFormat('Y-m-d H:i:s', $dateSQL) !== false){
		return DateTime::createFromFormat('Y-m-d H:i:s', $dateSQL);
	}
	return null;
}

function datePHPToSQL($datePHP){
		return $datePHP->format('Y-m-d H:i:s');
	}