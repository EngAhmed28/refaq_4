<?php


class Supplies extends CI_Model
{


//-----------------------------------------------------
    public function insert($file, $type)
    {
        $data['title'] = $this->chek_Null($this->input->post('title'));
        $data['img'] = $this->chek_Null($file);
        $data['content'] = $this->chek_Null($this->input->post('content'));
        $data['date'] = strtotime(date("Y-m-d", time()));
        $data['date_s'] = time();
        $data['type'] = $type;
        $data['publisher'] = $_SESSION['user_username'];
        $this->db->insert('about', $data);
    }

    //-----------------------------------------------------
    public function update($id, $file, $type)
    {
        $data['title'] = $this->chek_Null($this->input->post('title'));
        if ($this->chek_Null($file) != "") {
            $data['img'] = $file;
        }
        $data['content'] = $this->chek_Null($this->input->post('content'));
        $data['date'] = strtotime(date("Y-m-d", time()));
        $data['date_s'] = time();
        $data['type'] = $type;
        $data['publisher'] = $_SESSION['user_username'];
        $this->db->where('id', $id);
        $this->db->update('about', $data);
    }

//-----------------------------------------------------
    public function select($type)
    {

        $this->db->select('*');
        $this->db->from('about');
        $this->db->where('type', $type);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    //----------------------------------------------------------

    public function countSuppliers()
    {
        return $this->db->count_all_results('supplies_orders');

    }

//-------------------------------------------------
    public function select_store()
    {

        $this->db->select('*');
        $this->db->from('stores');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

    public function select_store_of_products($id)
    {
        $this->db->select('*');
        $this->db->from('storage_products');
        $this->db->where('p_storage_code_fk', $id);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    ////////////////////////////////
    ///
    public function select_unite_of_products($id)
    {
        return $this->db->select('units.*')
            ->from("units")
            ->join("storage_products", "units.id=storage_products.p_unit_fk", "left")
            ->where("storage_products.id=", $id)
            ->get()->result();
    }
}

?>