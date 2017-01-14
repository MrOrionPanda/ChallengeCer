<?php 
require_once 'class/myPDO.include.php';
require_once 'function/dateConv.function.php';

$stmt = myPDO::getInstance()->prepare(<<<SQL
	SELECT heure
	FROM test
SQL
);
$stmt->execute();
$arr = $stmt->fetchAll();
var_dump($arr);
$php1 = DateSQLToPHP($arr[2]['heure']);
var_dump($php1);
$sql1 = DatePHPToSQL($php1);
var_dump($sql1);