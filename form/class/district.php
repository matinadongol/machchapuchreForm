<?php
class District extends Model{
    public function __construct(){
        Model::__construct();
        $this->table('district');
    }

    public function getDistrictById($id){
        $attr = array(
            'where' => array('id'=> $id)
        );
        return $this->select($attr);
    }

    public function getAllDistrict(){
        return $this->select();
    }
}
?>