<?php
class Province extends Model{
    public function __construct(){
        Model::__construct();
        $this->table('province');
    }

    public function getProvinceById($id){
        $attr = array(
            'where' => array('id'=> $id)
        );
        return $this->select($attr);
    }

    public function getAllProvince(){
        return $this->select();
    }
}
?>