<?php

/**
 * Created by PhpStorm.
 * User: Cm
 * Date: 15/07/2017
 * Time: 01:35 ص
 */
class Import extends CI_Model
{



    public function chek_Null($post_value){
        if($post_value == '' || $post_value==null || (!isset($post_value))){
          $val='';
            return $val;
        }else{
            return $post_value;
        }
    }

    public  function  insert(){
        $data['import_type_id_fk'] = $this->chek_Null($this->input->post('import_type_id_fk'));
        $data['organization_from_id_fk'] =  $this->chek_Null($this->input->post('organization_from_id_fk'));
        $data['transaction_id_fk'] =  $this->chek_Null($this->input->post('transaction_id_fk'));
        $data['importance_degree_id_fk'] = $this->chek_Null($this->input->post('importance_degree_id_fk'));
        $data['importance_degree_other'] = $this->chek_Null($this->input->post('importance_degree_other'));
        $data['registration_number'] = $this->chek_Null($this->input->post('registration_number'));

        $data['method_recived_id_fk'] = $this->chek_Null($this->input->post('method_recived_id_fk'));
        $data['title'] = $this->chek_Null($this->input->post('title'));
        $data['about'] =$this->chek_Null($this->input->post('about'));
        $data['content'] = $this->chek_Null($this->input->post('content'));
        $data['date'] = $this->chek_Null($this->input->post('date'));
        $data['date_s']=time();
        $data['publisher'] = $_SESSION['user_id'];

        $data['organization_dep'] = $this->chek_Null($this->input->post('organization_dep'));
        $data['organization_employee'] = $this->chek_Null($this->input->post('organization_employee'));
        $data['organization_other'] =  $this->chek_Null($this->input->post('organization_other'));
        $data['method_recived_other'] = $this->chek_Null($this->input->post('method_recived_other'));


        $this->db->insert('office_imports',$data);
    }

    public function select_last(){
        $this->db->select('id');
        $this->db->from('office_imports');
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

    public function insert_attachment($file,$f_id) {


        $a = 1;
        foreach($file as $record):

            if($record !=''){
                $val['img']=$record;
            }else{
                $val['img']="Null";
            }

            $val['title'] =$this->chek_Null($this->input->post('title'.$a));
            $val['exp_imp_id_fk']=$f_id;
            $val['type'] = 2;
            $a++;
            $this->db->insert('exports_imports_attachment',$val);
        endforeach;



    }



    public function select_transaction(){
        $this->db->select('*');
        $this->db->from('office_setting');
        $this->db->where('type_id_fk',2);
        $this->db->order_by('id','DESC');
        // $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function select_organization(){
        $this->db->select('*');
        $this->db->from('office_setting');
        $this->db->where('type_id_fk',1);
        $this->db->order_by('id','DESC');
        // $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function select(){
        $this->db->select('office_imports.*,office_setting.name,office_setting.mob,office_setting.email,office_setting.address');
        $this->db->from('office_imports');
        $this->db->join('office_setting', 'office_setting.id = office_imports.transaction_id_fk');
        $this->db->order_by('office_imports.id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }


    public function  getdetails(){
        $this->db->select('*');
        $this->db->from('exports_imports_attachment');
        $this->db->group_by('exp_imp_id_fk');
        $this->db->where('type',2);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `exports_imports_attachment` WHERE `type`=2 AND `exp_imp_id_fk` ='.$row->exp_imp_id_fk);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2->img;

                }
                $data[$row->exp_imp_id_fk]=$arr;
            }
            return $data;
        }
        return false;
    }

    public function  getdetails_tit(){
        $this->db->select('*');
        $this->db->from('exports_imports_attachment');
        $this->db->group_by('exp_imp_id_fk');
        $this->db->where('type',2);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `exports_imports_attachment` WHERE `type`=2 AND `exp_imp_id_fk` ='.$row->exp_imp_id_fk);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2->title;

                }
                $data[$row->exp_imp_id_fk]=$arr;
            }
            return $data;
        }
        return false;
    }

//=====================================================================
//=====================================================================

    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('office_imports');
        $this->db->where('exp_imp_id_fk',$id);
        $this->db->delete('exports_imports_attachment');

    }

    public function delete_photo($id){
        $this->db->where('id',$id);
        $this->db->delete('exports_imports_attachment');
    }
//=====================================================================
    public function getById($id){
        $h = $this->db->get_where('office_imports', array('id'=>$id));
        return $h->row_array();
    }
    public function getimg($id){
        $this->db->select("*");
        $this->db->from("exports_imports_attachment");
        $this->db->where('exp_imp_id_fk', $id);
        $this->db->where('type', 2);

        $query = $this->db->get();
        return $query->result();
    }





    public function update($id,$file){
        $h = $this->db->get_where('office_imports', array('id'=>$id));
        $row = $h->row_array();
        if(!empty($file)):

            $a = 1;
            foreach($file as $record):

                if($record !=''){
                    $val['img']=$record;
                }else{
                    $val['img']="Null";
                }

                $val['title'] =$this->chek_Null($this->input->post('title'.$a));
                $val['exp_imp_id_fk']=$row['id'];
                $val['type'] = 2;
                $a++;
                $this->db->insert('exports_imports_attachment',$val);
            endforeach;


        endif;

        $data['import_type_id_fk'] = $this->chek_Null($this->input->post('import_type_id_fk'));
        if($data['import_type_id_fk']==0){
            $data['organization_dep'] = $this->chek_Null($this->input->post('organization_dep'));
            $data['organization_employee'] = $this->chek_Null($this->input->post('organization_employee'));
            $data['organization_other'] =  0;


        }else{
            $data['organization_dep'] = 0;
            $data['organization_employee'] = 0;
            $data['organization_other'] =  $this->chek_Null($this->input->post('organization_other'));

        }
        $data['organization_from_id_fk'] =  $this->chek_Null($this->input->post('organization_from_id_fk'));
        $data['transaction_id_fk'] =  $this->chek_Null($this->input->post('transaction_id_fk'));
        $data['importance_degree_id_fk'] = $this->chek_Null($this->input->post('importance_degree_id_fk'));
        $data['importance_degree_other'] = $this->chek_Null($this->input->post('importance_degree_other'));
        $data['registration_number'] = $this->chek_Null($this->input->post('registration_number'));

        $data['method_recived_id_fk'] = $this->chek_Null($this->input->post('method_recived_id_fk'));
        $data['title'] = $this->chek_Null($this->input->post('title'));
        $data['about'] =$this->chek_Null($this->input->post('about'));
        $data['content'] = $this->chek_Null($this->input->post('content'));
        $data['date'] = $this->chek_Null($this->input->post('date'));
        $data['date_s']=time();
        $data['publisher'] = $_SESSION['user_id'];

        $data['method_recived_other'] = $this->chek_Null($this->input->post('method_recived_other'));

        $this->db->where('id', $id);
        if($this->db->update('office_imports',$data)) {
            return true;
        }else{
            return false;
        }
    }


//=====================================================================

}