<?php 

class Breve {

	public $idPub = null;

	public $idAuteur = null;

	/**
	Texte affiché dans le flux, si c'est une brève alors c'est le texte, si c'est un article c'est le résumé.
	*/
	public $txtShow = null;

	/**
	Tableau des hashtags de la publication
	*/
	public $hashtag = null;

	/**
	Date de publication.
	*/
	public $datePub = null;

	/**
	Retourne la publication en HTML
	*/
	public function afficherPub(){

	}
	/**
	Pas la peine d'expliquer
	*/
	public static function createFromId($id){

	}
	/**
	Retourne les hashtag en tant que qu'objet ou string
	Selon si une classe Hashtag est nécessaire
	*/
	public function getHashtag(){

	}
	/**
	Ajoute un Hashtag à la liste
	$hashtag est un tableau comportant un à plusieurs hashtags
	*/
	public function addHashtag($hashtag){
		$this->hashtag .= $hashtag;
	}

	/**
	Moteur de recherche par Hashtag, retourne un tableau de Publications comportant le #
	*/
	public static function getPubByHashtag($hashtag){
	$stmt = myPDO::getInstance()->prepare(<<<SQL
		SELECT *
		FROM article
		WHERE idPub = (SELECT idPub
					   FROM Hashtag
					   WHERE hashtag = ?)
SQL
);
	$stmt->execute(array($hashtag));
	$stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,__CLASS__);
    return $stmt->fetchAll();
	}

}