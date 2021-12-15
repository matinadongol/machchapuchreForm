<?php
class CorrespondenceAddress extends Model{
    public function __construct(){
        Model::__construct();
        $this->table('correspondenceaddress');
    }

    public function addCorrespondenceAddress($correspondenceAddressData, $is_die = false){
        //debugger($correspondenceAddressData, true);
        return $this->insertCorrespondenceAddress($correspondenceAddressData, $is_die);
    }
}
?>