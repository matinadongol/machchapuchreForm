<?php
class Title extends Model{
    public function __construct(){
        Model::__construct();
        $this->table('title');
    }

    public function getTitleById($id){
        $attr = array(
            'where' => array('id'=> $id)
        );
        return $this->select($attr);
    }

    public function getAllTitle(){
        return $this->select();
    }
}
?>