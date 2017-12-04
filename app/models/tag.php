<?php

class Tag extends BaseModel {

    public $id, $nimi;

    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_tag');
    }

    public static function all() {
        $query = DB::connection()->prepare('SELECT * FROM Tag');
        $query->execute();
        $rows = $query->fetchAll();
        $tags = array();

        foreach ($rows as $row) {
            $tags[] = new Tag(array(
                'id' => $row['id'],
                'nimi' => $row['nimi']
            ));
        }
        return $tags;
    }

    public static function find($id) {
        $query = DB::connection()->prepare('SELECT * FROM Tag WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();
        $tag = array();


        if ($row) {
            $tag = new Tag(array(
                'id' => $row['id'],
                'nimi' => $row['nimi']
            ));
            return $tag;
        }
        return null;
    }
    
    public function save() {
        $query = DB::connection()->prepare('INSERT INTO Tag(nimi) VALUES (:nimi) RETURNING id');
        $query->execute(array('nimi' => $this->nimi));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

    public function update() {
        $query = DB::connection()->prepare('UPDATE Tag SET nimi = :nimi WHERE id = :id');
        $query->execute(array('id' => $this->id, 'nimi' => $this->nimi));
    }

    public function destroy() {
        $query = DB::connection()->prepare('DELETE FROM Tag WHERE id =:id');
        $query->execute(array('id' => $this->id));
    }

}
