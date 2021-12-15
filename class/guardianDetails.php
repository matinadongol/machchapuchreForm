<?php
class GuardianDetails extends Model{
    public function __construct(){
        Model::__construct();
        $this->table('guardiandetails');
    }

    public function addGuardianDetails($guardianDetailsData, $is_die = false){
        //debugger($guardianDetailsData, true);
        return $this->insertGuardianDetails($guardianDetailsData, $is_die);
    }
}
?>
