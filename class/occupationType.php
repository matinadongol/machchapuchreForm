<?php
class OccupationType extends Model{
    public function __construct(){
        Model::__construct();
        $this->table('occupationtype');
    }

    public function getOccupationTypeById($id){
        $attr = array(
            'where' => array('id'=> $id)
        );
        return $this->select($attr);
    }

    public function getAllOccupationType(){
        return $this->select();
    }
}
?>