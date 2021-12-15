<?php
class BankAccountType extends Model{
    public function __construct(){
        Model::__construct();
        $this->table('bankAccountType');
    }

    public function getBankAccountTypeById($id){
        $attr = array(
            'where' => array('id'=> $id)
        );
        return $this->select($attr);
    }

    public function getAllBankAccountType(){
        return $this->select();
    }
}
?>