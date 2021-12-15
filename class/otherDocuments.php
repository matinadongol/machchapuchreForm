<?php
class OtherDocuments extends Model{
    public function __construct(){
        Model::__construct();
        $this->table('otherdocuments');
    }

    public function addOtherDocuments($otherDocumentsData, $is_die = false){
        //debugger($otherDocumentsData, true);
        return $this->insertOtherDocuments($otherDocumentsData, $is_die);
    }
}
?>
