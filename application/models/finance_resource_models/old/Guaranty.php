<?php

class Guaranty extends CI_Model
{
    public function __construct() {

        parent::__construct();

    }
//---------------------------------------------------
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            return 0;
        }else{
            return $post_value;
        }
    }

    //===================================================insert=================================

    public  function  insert(){
        $data['guarantee_id']=$this->chek_Null( $this->input->post('guarantee_id'));
        $data['guaranty_type']=$this->chek_Null( $this->input->post('guaranty_type'));
        $data['payment_method']=$this->chek_Null( $this->input->post('payment_method'));
        $data['sex_determination']=$this->chek_Null( $this->input->post('sex_determination'));
        $data['gender']=$this->chek_Null( $this->input->post('gender'));
        if( $data['sex_determination'] ==2){
            $data['gender']=0;
        }
        $data['number']=$this->chek_Null( $this->input->post('number'));
        $data['duration']=$this->chek_Null( $this->input->post('duration'));
        $data['guaranty_amount_all']=$this->chek_Null( $this->input->post('guaranty_amount_all'));
        $data['guaranty_start']=strtotime( $this->input->post('guaranty_start'));
        $data['guaranty_end']=strtotime( $this->input->post('guaranty_end'));
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s']=time();
        $this->db->insert('guarantees',$data);
    }

    //=======================================================
    public  function  update($id){

        $data['guarantee_id']=$this->chek_Null( $this->input->post('guarantee_id'));
        $data['guaranty_type']=$this->chek_Null( $this->input->post('guaranty_type'));
        $data['payment_method']=$this->chek_Null( $this->input->post('payment_method'));
        $data['sex_determination']=$this->chek_Null( $this->input->post('sex_determination'));
        $data['gender']=$this->chek_Null( $this->input->post('gender'));
        if( $data['sex_determination'] ==2){
            $data['gender']=0;
        }
        $data['number']=$this->chek_Null( $this->input->post('number'));
        $data['duration']=$this->chek_Null( $this->input->post('duration'));
        $data['guaranty_amount_all']=$this->chek_Null( $this->input->post('guaranty_amount_all'));
        $data['guaranty_start']=strtotime( $this->input->post('guaranty_start'));
        $data['guaranty_end']=strtotime( $this->input->post('guaranty_end'));

        $this->db->where('id', $id);
        $this->db->update('guarantees',$data);

    }

    //=================================================
    public function select_type(){
        $this->db->select('*');
        $this->db->from('guaranty_settings');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
    //======================================================
    public function select_donor(){
        $this->db->select('*');
        $this->db->from('donors_t');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }
}

