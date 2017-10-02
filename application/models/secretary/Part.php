<?php

class Part extends CI_Model
{
//---------------------------------------------------
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
//------------------- جهات  --------------------------------
    public  function  insert(){
        $data['name']=$this->input->post('name');
        $data['address']=$this->input->post('address');
        $data['type_id_fk'] = 1;
        $data['mob']=$this->input->post('mob');
        $data['email']=$this->input->post('email');

        $this->db->insert('office_setting',$data);
    }


    public function select(){
        $this->db->select('*');
        $this->db->from('office_setting');
        $this->db->where('type_id_fk',1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }

    public function update($id){

        $data['name']=$this->input->post('name');
        $data['address']=$this->input->post('address');
        $data['type_id_fk'] = 1;
        $data['mob']=$this->input->post('mob');
        $data['email']=$this->input->post('email');

        $this->db->where('id', $id);
        if($this->db->update('office_setting',$data)) {
            return true;
        }else{
            return false;
        }
    }
    //================================================================
    //================================================================

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('office_setting');
    }

    //================================================================
    public function getById($id){
        $h = $this->db->get_where('office_setting', array('id'=>$id));
        return $h->row_array();
    }
    //================================================================
    //======================معاملات==========================================


    public  function  insert_part(){
        $data['name']=$this->input->post('name');
        $data['address']=$this->chek_Null($this->input->post('address'));
        $data['type_id_fk'] = 2;
        $data['mob']=$this->chek_Null($this->input->post('mob'));
        $data['email']=$this->chek_Null($this->input->post('email'));

        $this->db->insert('office_setting',$data);
    }

    public function select_part(){
        $this->db->select('*');
        $this->db->from('office_setting');
        $this->db->where('type_id_fk',2);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    public function update_part($id){
        $data['name']=$this->input->post('name');
        $data['address']=$this->chek_Null($this->input->post('address'));
        $data['type_id_fk'] = 2;
        $data['mob']=$this->chek_Null($this->input->post('mob'));
        $data['email']=$this->chek_Null($this->input->post('email'));

        $this->db->where('id', $id);
        if($this->db->update('office_setting',$data)) {
            return true;
        }else{
            return false;
        }
    }
//----------------------------------------------------
 public function insert_attachment($file,$f_id,$type) {
        $a = 1;
        foreach($file as $record):

            if($record !=''){
                $val['img']=$record;
            }else{
                $val['img']="Null";
            }

            $val['title'] =$this->chek_Null($this->input->post('title'.$a));
            $val['exp_imp_id_fk']=$f_id;
            $val['type'] = $type;
            $a++;
            $this->db->insert('exports_imports_attachment',$val);
        endforeach;
    }
    //-----------------
    public function insert_signatures($f_id,$type) {
        for ($e = 1 ; $e <= $_POST['signatures'] ; $e++)
        {
            $data['exp_imp_id_fk']=$f_id;
            $data['type'] = $type;
            $data['name'] = $this->input->post('name'.$e);
            $data['job'] = $this->input->post('job'.$e);
            $this->db->insert('signatures',$data);

        }
    }





}//END CLASS 