<?php
class Kayttaja extends BaseModel{
	public $id, $tunnus, $salasana;
	public function __construct($attributes){
		parent::__construct($attributes);
		$this->validators = array('validate_tunnus', 'validate_salasana');
	}
	public static function find($id){
		$query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE id = :id LIMIT 1');
		$query->execute(array('id' => $id));
		$row = $query->fetch();
		$kayttaja = array();
		if($row){
			$kayttaja = new Kurssi(array(
				'id' => $row['id'],
				'tunnus' => $row['tunnus'],
				'salasana' => $row['salasana']
			));
			return $kayttaja;
		}
		return null;
	}
#EI TESTATTU ETTÄ TOIMII
	public function save() {
		$query = DB::connection() -> prepare('INSERT INTO Kayttaja (tunnus, salasana) VALUES (:tunnus, :salasana) RETURNING id');
		$query -> execute(array('tunnus' => $this->tunnus, 'salasana' => $this->salasana));
		$row = $query->fetch();
		$this->id = $row['id'];
	}
	public static function authenticate($tunnus, $salasana) {
		$query = DB::connection()->prepare('SELECT * FROM Kayttaja WHERE tunnus = :tunnus AND salasana = :salasana LIMIT 1');
		$query->execute(array('tunnus' => $tunnus, 'salasana' => $salasana));
		$row = $query->fetch();
		if($row){
			$kayttaja = new Kayttaja(array(
				'id' => $row['id'],
				'tunnus' => $row['tunnus'],
				'salasana' => $row['salasana']
			));
			return $kayttaja;
		}else{
			return null;
		}
	}
	public function validate_tunnus() {
		return parent::validate_string_length('kayttaja', $this->kayttaja, 2, 50);
	}
	public function validate_salasana() {
		return parent::validate_string_length('salasana', $this->salasana, 6, 50);
	}
}