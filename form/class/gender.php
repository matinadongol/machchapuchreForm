<?php
class Gender extends Model{
    public function __construct(){
        Model::__construct();
        $this->table('gender');
    }

    public function getGenderById($id){
        $attr = array(
            'where' => array('id'=> $id)
        );
        return $this->select($attr);
    }

    public function getAllGender(){
        return $this->select();
    }
}
?>