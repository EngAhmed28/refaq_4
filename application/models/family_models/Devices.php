<?php

class Devices extends CI_Model
{
    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
            return 0;
        }else{
            return $post_value;
        }
    }
    public  function  insert(){


         $count=1;
        for ($a=0;$a<$_POST['max'];$a++){

          $data['mother_national_num_fk'] = $_SESSION['mother_national_num'];
            $data['d_house_device_id_fk'] = $this->input->post('d_house_device_id_fk'.$count);
            $data['d_count'] = $this->input->post('d_count'.$count);
            $data['d_house_device_status_id_fk'] =$this->input->post('d_house_device_status_id_fk'.$count);
             $data['d_note'] = $this->input->post('d_note'.$count);
            $this->db->insert('devices',$data);
            $count++;
        }

    }




    //=======================================================================
    public  function  update($mother_id){
        for($a =1;$a<=$_POST['max_edit'];$a++){
           $input_post=$this->input->post('d_house_device_id_fk'.$a);
            if(!empty($input_post)) {
                $data['d_house_device_id_fk'] = $this->input->post('d_house_device_id_fk' . $a);
            }
            $out=$this->input->post('d_count'.$a);
            if(!empty($out)) {
            $data['d_count']= $this->input->post('d_count'.$a);
            }
            $out2=$this->input->post('d_house_device_status_id_fk'.$a);
            if(!empty($out2)) {
            $data['d_house_device_status_id_fk']= $this->input->post('d_house_device_status_id_fk'.$a);
            }
            if(!empty($this->input->post('d_note'.$a))) {
            $data['d_note']=$this->input->post('d_note'.$a);
            }
            if($_POST['type'.$a] == 'edit') {
                $this->db->where('id', $_POST['id'.$a]);
                $this->db->update('devices', $data);
            }
        }
               $d =$_POST['max'] ;
        for($s = 0; $s<$_POST['max_insert'];$s++){
            $d++;
                if ($_POST['type' . $d] == 'insert') {
                    $v['mother_national_num_fk']=$mother_id;
                    $v['d_house_device_id_fk'] = $this->chek_Null($this->input->post('d_house_device_id_fk' . $d));
                    $v['d_count'] = $this->chek_Null($this->input->post('d_count' . $d));
                    $v['d_house_device_status_id_fk'] = $this->chek_Null($this->input->post('d_house_device_status_id_fk' . $d));
                    $v['d_note'] = $this->chek_Null($this->input->post('d_note' . $d));
               $this->db->insert('devices', $v);
                }


        }




    }
//===============================================================
    public function delete($from,$id){
        $this->db->where('id',$id);
        $this->db->delete($from);
    }
//===============================================================    
    public function select_ids(){
        $this->db->select('*');
        $this->db->from("electrical_equipment");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row->title;
            }
            return $data;
        }
        return false;
        
        
        
    }
//=========================================================
public function insert_device(){
      $data['title']= $this->input->post('title');
        $this->db->insert('electrical_equipment', $data);
} 
public function update_device($id){
     $data['title']= $this->input->post('title');
    
     $this->db->where('id', $id);
                $this->db->update('electrical_equipment', $data);
}   

}// END CLASS

