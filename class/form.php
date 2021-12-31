<?php
class Form extends Model{
    public function __construct(){
        Model::__construct();
        $this->table('form');
    }

    public function addForm(){
        return $this->insertForm();
    }

    public function getAllForm(){
        return $this->selectForm();
    }

    public function getFormById($id){
        $args = array(
            'where' => array('id'=> $id)
        );
        return $this->selectForm($args);
    }

    // public function deleteForm($id){
    //     $attr = array(
    //         'where' => array('id'=> $id)
    //     );
    //     return $this->delete($attr);
    // }

    // public function updateForm($data, $pro_id, $is_die = false){
    //     $attr = array('where' => array('id' => $pro_id));
    //     return $this->update($data, $attr, $is_die);
    // }
}
?>