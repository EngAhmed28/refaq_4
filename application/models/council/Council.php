<?php

class Council extends CI_Model
{

    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            $val='';
            return $val;
        }else{
            return $post_value;
        }
    }
    
    public function insert($file){
        $data['appointment_decison_number'] = $this->chek_Null($this->input->post('appointment_decison_number'));
        $data['decison_img'] = $file;
        $data['appointment_date'] =  $this->chek_Null(strtotime($this->input->post('appointment_date')));
        $data['expiration_date'] = $this->chek_Null(strtotime($this->input->post('expiration_date')));
        $data['status'] = 1;
        $this->db->insert('council_admin',$data);
    }
///////////selecting data//////////////////


    public function select(){

        $this->db->select('*');
        $this->db->from('council_admin');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    public function select_last(){

        $this->db->select('*');
        $this->db->from('council_admin');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
///////////suspend//////////////////
//=========================================================
public function un_suspend($id){
    $update['status']=0;
    $this->db->where('id!=', $id);
    if($this->db->update('council_admin',$update)) {
        return true;
    }else{
        return false;
    }

}
//=========================================================
    public function suspend($id,$clas){
            $update = array('status' => $clas);
        $this->db->where('id', $id);
        if($this->db->update('council_admin',$update)) {
            return true;
        }else{
            return false;
        }
    }
//=========================================================
    public function delete($id){

        $this->db->where('id',$id);
        $this->db->delete('council_admin');

    }


    //////////////////////////


///////////update//////////////////


    public function getById($id){

        $h = $this->db->get_where('council_admin', array('id'=>$id));
        return $h->row_array();

    }


    public function update($id,$file){
        
        $data['appointment_decison_number'] = $this->chek_Null($this->input->post('appointment_decison_number'));
        $data['appointment_date'] =  $this->chek_Null(strtotime($this->input->post('appointment_date')));
        $data['expiration_date'] = $this->chek_Null(strtotime($this->input->post('expiration_date')));
        
        if($file !=''){
            $data['decison_img'] = $file;
        }

        $this->db->where('id', $id);
        if($this->db->update('council_admin',$data)) {

            return true;

        }else{

            return false;

        }
    }
//============================================================
public function get_members(){
     $this->db->select('*');
        $this->db->from('magls_members_t');
        $this->db->group_by('council_id_fk');
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
              $query2 = $this->db->query("SELECT * FROM `magls_members_t` WHERE `council_id_fk`=".$row->council_id_fk);
                $sub_data=array();
                        foreach ($query2->result() as $row2) {
                            $sub_data[] = $row2;
                        }
                 $data[$row->council_id_fk] =$sub_data;
         }
            return $data;
        }
        return false;
}
//==========================================================
 public function select_department_jobs(){

        $this->db->select('*');
        $this->db->from('department_jobs');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }


}//END CLASS