<?php
class NomineeDetails extends Model{
    public function __construct(){
        Model::__construct();
        $this->table('nomineedetails');
    }

    public function addNomineeDetails($nomineeDetailsData, $is_die = false){
        //debugger($nomineeDetailsData, true);
        return $this->insertNomineeDetails($nomineeDetailsData, $is_die);
    }
}
?>
