<?php
class CertificateDetails extends Model{
    public function __construct(){
        Model::__construct();
        $this->table('certificatedetails');
    }

    public function addCertificateDetails($certificateDetailsData, $is_die = false){
        //debugger($certificateDetailsData, true);
        return $this->insertCertificateDetails($certificateDetailsData, $is_die);
    }
}
?>