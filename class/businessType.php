<?php
class BusinessType extends Model{
    public function __construct(){
        Model::__construct();
        $this->table('businesstype');
    }

    public function getBusinessTypeById($id){
        $attr = array(
            'where' => array('id'=> $id)
        );
        return $this->select($attr);
    }

    public function getAllBusinessType(){
        return $this->select();
    }
}
?>