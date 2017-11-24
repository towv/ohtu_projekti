<?php

class LukuvinkkiTag extends BaseModel{
    
    public $lukuvinkki_id, $tag_id, $tag_nimi;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
    }
    
    public function save() {
        $query = DB::connection()->prepare('INSERT INTO LukuvinkkiTag (lukuvinkki_id, tag_id) VALUES (:lukuvinkki_id, :tag_id)');
        $query->execute(array(
            'lukuvinkki_id' => $this->lukuvinkki_id,
            'tag_id' => $this->tag_id
        ));
        $row = $query->fetch();
    }
    
    public static function findTags($id) {
        $query = DB::connection()->prepare('SELECT LukuvinkkiTag.*, Tag.nimi AS tag_nimi FROM LukuvinkkiTag INNER JOIN Tag ON LukuvinkkiTag.tag_id = Tag.id WHERE LukuvinkkiTag.lukuvinkki_id = :id');
        $query->execute(array('id' => $id));
        $rows = $query->fetchAll();
        $tags = array();
        
        foreach ($rows as $row) {
            $tags[] = new LukuvinkkiTag(array(
                'tag_id' => $row['tag_id'],
                'lukuvinkki_id' => $row['lukuvinkki_id'],
                'tag_nimi' => $row['tag_nimi']
            ));
        }
        return $tags;
    }
    
    public static function destroy($id){
        $query = DB::connection()->prepare('DELETE FROM LukuvinkkiTag WHERE lukuvinkki_id = :id');
        $query->execute(array('id' => $id));
    }
    
}