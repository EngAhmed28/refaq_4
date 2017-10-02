<?php

/**
 * Created by PhpStorm.
 * User: DASH
 * Date: 4/22/2017
 * Time: 01:13 م
 */
class Search extends CI_Model
{


    public function getallimports($date_from,$date_to){
        $this->db->select('*');
        $this->db->from('office_imports');
        $this->db->where('date >=', $date_from);
        $this->db->where('date <=', $date_to);
        $this->db->order_by('id','asec');
        return $this->db->get()->result_array();


    }
    public function getallexports($date_from,$date_to){
        $this->db->select('*');
        $this->db->from('office_exports');
        $this->db->where('date >=', $date_from);
        $this->db->where('date <=', $date_to);
        $this->db->order_by('id','asec');
        return $this->db->get()->result_array();


    }
    public function select_between_dates($date_from,$date_to)
    {
        if ($this->input->post('search_type') == 3) {
        $this->db->select('*');
        $this->db->from('office_exports');
        $this->db->where('date >=', $date_from);
        $this->db->where('date <=', $date_to);
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
            $this->db->where('date <=', $date_to);
            $this->db->where('date >=', $date_from);

            return $this->db->get()->result_array();


        }else{
            $this->db->select('*');
            $this->db->from('office_exports');
            $this->db->where('date <=', $date_to);
            $this->db->where('date >=', $date_from);

            return $this->db->get()->result_array();


        }
    }

    public function select_orgnization_all()
    {
        $this->db->select('office_setting.*');
        $this->db->from('office_setting');
       // $this->db->join('office_setting','office_setting.id=office_exports.organization_to_id_fk','left');
        $this->db->where('type_id_fk',1);
      /*  $this->db->where('date <=', $date_to);
        $this->db->where('date >=', $date_from);*/
/*        $this->db->group_by('office_exports.organization_to_id_fk');*/
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2=$this->db->query('SELECT * from  `office_exports` WHERE `date` <= 06/01/2017 AND   `organization_to_id_fk` = '.$row->id);
                $query3=$this->db->query('SELECT * from  `office_imports` WHERE `date` <= 06/01/2017 AND `organization_from_id_fk` = '.$row->id);




                    $sub_data['export']=$query2->num_rows();
                    $sub_data['import']=$query3->num_rows();
                    $data[$row->name]=$sub_data;




            }

            return $data;
        }
        return false;
    }

    public function select_orgnization_ex($date_from,$date_to)
    {
        $this->db->select('office_exports.*,office_setting.name as n ,office_setting.id as i');
        $this->db->from('office_exports');
        $this->db->join('office_setting','office_setting.id=office_exports.organization_to_id_fk','left');
        $this->db->where('date <=', $date_to);
        $this->db->where('date >=', $date_from);
        $this->db->group_by('office_exports.organization_to_id_fk');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2=$this->db->query('SELECT * from  `office_exports` WHERE  organization_to_id_fk = '.$row->organization_to_id_fk);

                // $data[] = $row;

                $data[$row->n]=$query2->num_rows();
            }
            return $data;
        }
        return false;
    }
    public function select_orgnization($date_from,$date_to)
    {
        $this->db->select('office_imports.*,office_setting.name as n ,office_setting.id as i');
        $this->db->from('office_imports');
        $this->db->join('office_setting','office_setting.id=office_imports.organization_from_id_fk','left');
     $this->db->where('date <=', $date_to);
        $this->db->where('date >=', $date_from);
        $this->db->group_by('office_imports.organization_from_id_fk');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
           $query2=$this->db->query('SELECT * from  `office_imports` WHERE  organization_from_id_fk = '.$row->organization_from_id_fk);

               // $data[] = $row;

              $data[$row->n]=$query2->num_rows();
            }
            return $data;
        }
        return false;
    }

    //===================================imports====================================
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

    public function selectimport($date_from,$date_to){
        $this->db->select('office_imports.*,office_setting.name,office_setting.mob,office_setting.email,office_setting.address');
        $this->db->from('office_imports');
        $this->db->join('office_setting', 'office_setting.id = office_imports.transaction_id_fk');
        $this->db->order_by('office_imports.id','DESC');
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

//=================================exports====================================



    public function select_transaction_ex(){
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
    public function select_organization_ex(){
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

    public function select_ex($date_from,$date_to){
        $this->db->select('office_exports.*,office_setting.name,office_setting.mob,office_setting.email,office_setting.address');
        $this->db->from('office_setting');
        $this->db->join('office_exports', 'office_setting.id = office_exports.transaction_id_fk');
        $this->db->order_by('office_exports.id','DESC');
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

    public function select_signatures_ex(){
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
    public function select_sign_ex(){
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

    public function  getdetails_ex(){
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

    public function  getdetails_tit_ex(){
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



}