<?php
class BankDetails extends Model{
    public function __construct(){
        Model::__construct();
        $this->table('bankdetails');
    }

    public function addBankDetails($bankDetailsData, $is_die = false){
        //debugger($BankDetailsData, true);
        return $this->insertBankDetails($bankDetailsData, $is_die);
    }
}
?>