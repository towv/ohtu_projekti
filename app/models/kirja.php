<?php

class Kirja extends BaseModel{
	public $id, $otsikko, $kirjoittaja, $isbn;

	public function __construct($attributes){
		parent::__construct($attributes);
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