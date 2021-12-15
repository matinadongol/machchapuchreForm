<?php
class FirstSection extends Model{
    public function __construct(){
        Model::__construct();
        $this->table('firstsection');
    }

    public function addFirstSection($firstSectionData, $is_die = false){
        //debugger($firstSectionData, true);
        return $this->insertFirstSection($firstSectionData, $is_die);
    }
}
?>