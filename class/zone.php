<?php
class Zone extends Model{
    public function __construct(){
        Model::__construct();
        $this->table('zones');
    }

    public function getZoneById($id){
        $attr = array(
            'where' => array('id'=> $id)
        );
        return $this->select($attr);
    }

    public function getAllZone(){
        return $this->select();
    }
}
?>