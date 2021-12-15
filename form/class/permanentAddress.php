<?php
class PermanentAddress extends Model{
    public function __construct(){
        Model::__construct();
        $this->table('permanentaddress');
    }

    public function addPermanentAddress($permanentAddressData, $is_die = false){
        //debugger($permanentAddressData, true);
        return $this->insertPermanentAddress($permanentAddressData, $is_die);
    }
}
?>