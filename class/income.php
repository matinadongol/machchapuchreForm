<?php
class Income extends Model{
    public function __construct(){
        Model::__construct();
        $this->table('income');
    }

    public function getIncomeById($id){
        $attr = array(
            'where' => array('id'=> $id)
        );
        return $this->select($attr);
    }

    public function getAllIncome(){
        return $this->select();
    }
}
?>