<?php
        $this->db->select('*');
        $this->db->from('departments');
        $this->db->where('main_dep_f_id',$id);
        $query = $this->db->get();
        $query->row_array();
        foreach ($query->result() as $row) {
                $data[] = $row;
            }
                echo'<option>اختر الحي</option>';
                foreach($data as $record){
                    echo '<option value="'.$record->id.'">'.$record->sub_dep_name.'</option>';

                }
?>

