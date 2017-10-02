<?php

class Details_report extends CI_Model
{

//==========query_4_select_input============

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

    //======================================================

    public function details_search_imp($date_from,$date_to,$method,$trans,$imp,$org){

        $this->db->select('office_imports.*,office_setting.name,office_setting.mob,office_setting.email,office_setting.address');
        $this->db->from('office_imports');
        $this->db->join('office_setting', 'office_setting.id = office_imports.transaction_id_fk');
        $this->db->where('office_imports.organization_from_id_fk',$org);
        $this->db->where('office_imports.importance_degree_id_fk',$imp);
        $this->db->where('office_imports.transaction_id_fk',$trans);
        $this->db->where('office_imports.method_recived_id_fk',$method);
        $this->db->where('office_imports.date <=', $date_to);
        $this->db->where('office_imports.date >=', $date_from);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    //===========================================================

    public function details_search_ex($date_from,$date_to,$method,$trans,$imp,$org){

        $this->db->select('*');
        $this->db->select('office_exports.*,office_setting.name,office_setting.mob,office_setting.email,office_setting.address');
        $this->db->from('office_exports');
        $this->db->join('office_setting', 'office_setting.id = office_exports.transaction_id_fk');

        $this->db->where('office_exports.organization_to_id_fk',$org);
        $this->db->where('office_exports.importance_degree_id_fk',$imp);
        $this->db->where('office_exports.transaction_id_fk',$trans);
        $this->db->where('office_exports.method_recived_id_fk',$method);
        $this->db->where('office_exports.date <=', $date_to);
        $this->db->where('office_exports.date >=', $date_from);

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function select_signatures(){
        $this->db->select('*');
        $this->db->from('signatures');
        $this->db->group_by('exp_imp_id_fk');
        $this->db->where('type',1);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `signatures` WHERE `type`=1 AND `exp_imp_id_fk` ='.$row->exp_imp_id_fk);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2->name;

                }
                $data[$row->exp_imp_id_fk]=$arr;
            }
            return $data;
        }
        return false;


    }
    public function select_sign(){
        $this->db->select('*');
        $this->db->from('signatures');
        $this->db->group_by('exp_imp_id_fk');
        $this->db->where('type',1);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `signatures` WHERE `type`=1 AND `exp_imp_id_fk` ='.$row->exp_imp_id_fk);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2->job;

                }
                $data[$row->exp_imp_id_fk]=$arr;
            }
            return $data;
        }
        return false;


    }

    public function  getdetails(){
        $this->db->select('*');
        $this->db->from('exports_imports_attachment');
        $this->db->group_by('exp_imp_id_fk');
        $this->db->where('type',1);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `exports_imports_attachment` WHERE `type`=1 AND `exp_imp_id_fk` ='.$row->exp_imp_id_fk);
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
        $this->db->where('type',1);
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `exports_imports_attachment` WHERE `type`=1 AND `exp_imp_id_fk` ='.$row->exp_imp_id_fk);
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


    public function select_between_dates($date_from,$date_to,$method,$trans,$imp,$org)
    {
        if ($this->input->post('search_type') == 3) {
            $this->db->select('*');
            $this->db->from('office_exports');

            $this->db->where('organization_to_id_fk',$org);
            $this->db->where('importance_degree_id_fk',$imp);
            $this->db->where('transaction_id_fk',$trans);
            $this->db->where('method_recived_id_fk',$method);
            $this->db->where('date <=', $date_to);
            $this->db->where('date >=', $date_from);

            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;


        }elseif ($this->input->post('search_type') == 2){
            $this->db->select('*');
            $this->db->from('office_imports');

            $this->db->where('organization_from_id_fk',$org);
            $this->db->where('importance_degree_id_fk',$imp);
            $this->db->where('transaction_id_fk',$trans);
            $this->db->where('method_recived_id_fk',$method);
            $this->db->where('date <=', $date_to);
            $this->db->where('date >=', $date_from);

            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;

        }else{
            $this->db->select('*');
            $this->db->from('office_exports');

            $this->db->where('organization_to_id_fk',$org);
            $this->db->where('importance_degree_id_fk',$imp);
            $this->db->where('transaction_id_fk',$trans);
            $this->db->where('method_recived_id_fk',$method);
            $this->db->where('date <=', $date_to);
            $this->db->where('date >=', $date_from);

            $query = $this->db->get();
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $row) {
                    $data[] = $row;
                }
                return $data;
            }
            return false;

        }
    }
   //================================ 9-7-2017  =================================================================

public function select_where($table,$Conditions_arr){
        $this->db->select('*');
        $this->db->from($table);
        foreach($Conditions_arr as $key=>$value){
        $this->db->or_where($key,$Conditions_arr[$key]);    
        }
        $this->db->order_by("id","DESC");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }    

  //-------------------------------------------
   public function select_office_setting(){
        $this->db->select('*');
        $this->db->from("office_setting");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
            }
            return $data;
        }
        return false;
    }    
  //---------------------------------------
    public function select_detials($table,$type){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->group_by('exp_imp_id_fk');
        $this->db->where('type',$type);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `'.$table.'` WHERE `type`='.$type.' AND `exp_imp_id_fk` ='.$row->exp_imp_id_fk);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2;

                }
                $data[$row->exp_imp_id_fk]=$arr;
            }
            return $data;
        }
        return false;


    }     
    
    
    
    

    


}