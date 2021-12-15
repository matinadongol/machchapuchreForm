<?php
class BeneficialOwner extends Model{
    public function __construct(){
        Model::__construct();
        $this->table('beneficialowner');
    }

    public function addBeneficialOwner($beneficialOwnerData, $is_die = false){
        //debugger($beneficialOwnerData, true);
        return $this->insertBeneficialOwner($beneficialOwnerData, $is_die);
    }
}
?>