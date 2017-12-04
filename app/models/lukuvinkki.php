<?php

include("lib/base_model.php");

class Lukuvinkki extends BaseModel{
	public $id, $otsikko, $tekija, $isbn, $url, $tyyppi, $kuvaus, $julkaistu;

	public function __construct($attributes){
		parent::__construct($attributes);
                $this->validators = array('validate_name', 'validate_isbn', 'validate_writer', 'validate_url', 'validate_julkaistu', 'validate_kuvaus', 'validate_tyyppi');
	}


	public static function all(){
		$query = DB::connection()->prepare('SELECT * FROM Lukuvinkki');
		$query->execute();
		$rows = $query->fetchAll();
		$lukuvinkit = array();
		foreach($rows as $row){
			$lukuvinkit[] = new Lukuvinkki(array(
				'id' => $row['id'],
				'otsikko' => $row['otsikko'],
				'tekija' => $row['tekija'],
				'isbn' => $row['isbn'],
                                'url' => $row['url'],
				'tyyppi' => $row['tyyppi'],
				'kuvaus' => $row['kuvaus'],
				'julkaistu' => $row['julkaistu']
			));
		}
		return $lukuvinkit;
	}

	public static function find($id){
		$query = DB::connection()->prepare('SELECT * FROM Lukuvinkki WHERE id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();
		$lukuvinkki = array();


		if($row){
			$lukuvinkki = new Lukuvinkki(array(
				'id' => $row['id'],
				'otsikko' => $row['otsikko'],
				'tekija' => $row['tekija'],
				'isbn' => $row['isbn'],
                                'url' => $row['url'],
				'tyyppi' => $row['tyyppi'],
				'kuvaus' => $row['kuvaus'],
				'julkaistu' => $row['julkaistu']
			));
			return $lukuvinkki;
		}
		return null;
	}

	public function save() {
		$query = DB::connection() -> prepare('INSERT INTO Lukuvinkki(otsikko, tekija, isbn, url, tyyppi, kuvaus, julkaistu) VALUES (:otsikko, :tekija, :isbn, :url, :tyyppi, :kuvaus, :julkaistu) RETURNING id');
		$query -> execute(array('otsikko' => $this->otsikko, 'tekija' => $this->tekija, 'isbn' => $this->isbn, 'url' => $this->url, 'tyyppi' => $this->tyyppi, 'kuvaus' => $this->kuvaus, 'julkaistu' => $this->julkaistu));
		$row = $query->fetch();
		$this->id = $row['id'];
	}

	public function update($id){
		$query = DB::connection()->prepare('UPDATE Lukuvinkki SET otsikko = :otsikko, tekija = :tekija, isbn = :isbn, url = :url, tyyppi = :tyyppi, kuvaus = :kuvaus, julkaistu = :julkaistu WHERE id = :id');
		$query -> execute(array('otsikko' => $this->otsikko, 'tekija' => $this->tekija, 'isbn' => $this->isbn, 'url' => $this->url, 'tyyppi' => $this->tyyppi, 'kuvaus' => $this->kuvaus, 'julkaistu' => $this->julkaistu, 'id' => $id));
	}

	public function destroy() {
                $query = DB::connection()->prepare('DELETE FROM LukuvinkkiTag WHERE lukuvinkki_id = :id');
                $query->execute(array('id' => $this->id));
		$query = DB::connection()->prepare('DELETE FROM Lukuvinkki WHERE id =:id');
		$query -> execute(array('id' => $this->id));
	}
}
