<?php

class Kirja extends BaseModel{
	public $id, $otsikko, $kirjoittaja, $isbn;

	public function __construct($attributes){
		parent::__construct($attributes);
	}

	public static function all(){
		$query = DB::connection()->prepare('SELECT * FROM Kirja');
		$query->execute();
		$rows = $query->fetchAll();
		$kirjat = array();
		foreach($rows as $row){
			$kirjat[] = new Kirja(array(
				'id' => $row['id'],
				'otsikko' => $row['otsikko'],
				'kirjoittaja' => $row['kirjoittaja'],
				'isbn' => $row['isbn']
			));
		}
		return $kirjat;
	}

	public static function find($id){
		$query = DB::connection()->prepare('SELECT * FROM Kirja WHERE id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();
		$kirja = array();


		if($row){
			$kirja = new Kirja(array(
				'id' => $row['id'],
				'otsikko' => $row['otsikko'],
				'kirjoittaja' => $row['kirjoittaja'],
				'isbn' => $row['isbn']
			));
			return $kirja;
		}
		return null;
	}

	public function save() {
		$query = DB::connection() -> prepare('INSERT INTO Kirja (otsikko, kirjoittaja, isbn) VALUES (:otsikko, :kirjoittaja, :isbn) RETURNING id');
		$query -> execute(array('otsikko' => $this->otsikko, 'kirjoittaja' => $this->kirjoittaja, 'isbn' => $this->isbn));
		$row = $query->fetch();
		$this->id = $row['id'];
	}

	public function update(){
		$query = DB::connection()->prepare('UPDATE Kirja SET otsikko = :otsikko, kirjoittaja = :kirjoittaja, isbn = :isbn WHERE id = :id');
		$query -> execute(array('id' => $this->id, 'otsikko' => $this->otsikko, 'kirjoittaja' => $this->kirjoittaja, 'isbn' => $this->isbn));
	}

	public function destroy() {
		$query = DB::connection()->prepare('DELETE FROM Kirja WHERE id =:id');
		$query -> execute(array('id' => $this->id));
	}
}