<?php
class OccupationDetails extends Model{
    public function __construct(){
        Model::__construct();
        $this->table('occupationdetails');
    }

    public function addOccupationDetails($occupationDetailsData, $is_die = false){
        //debugger($occupationDetailsData, true);
        return $this->insertOccupationDetails($occupationDetailsData, $is_die);
    }
}
?>