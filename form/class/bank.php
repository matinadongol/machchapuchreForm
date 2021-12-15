<?php
class Bank extends Model{
    public function __construct(){
        Model::__construct();
        $this->table('bank');
    }

    public function getBankById($id){
        $attr = array(
            'where' => array('id'=> $id)
        );
        return $this->select($attr);
    }

    public function getAllBank(){
        return $this->select();
    }
}
?>