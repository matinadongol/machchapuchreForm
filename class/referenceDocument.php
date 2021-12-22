<?php
class ReferenceDocument extends Model{
    public function __construct(){
        Model::__construct();
        $this->table('referencedocument');
    }

    public function getReferenceDocumentById($id){
        $attr = array(
            'where' => array('id'=> $id)
        );
        return $this->select($attr);
    }

    public function getAllReferenceDocument(){
        return $this->select();
    }
}
?>