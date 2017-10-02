<?phpclass Pages extends CI_Model{    public function __construct() {        parent::__construct();    }//-----------------------------------------------------------    public function insert($file){        $file_in=0;        if(isset($file) && !empty($file) &&   $file!=null && $file!=''){            $file_in= $file;        }        $data = array(            'page_title'=>  $this->input->post('page_title'),            'page_order'=>  $this->input->post('page_order'),            'page_link'=>$this->input->post('page_link'),            'page_icon_code'=>$this->input->post('page_icon_code'),            'group_id_fk'=>$this->input->post('group_id_fk'),            'level'=>$this->input->post('level'),            'page_image'=>$file_in);        if($this->db->insert('pages',$data)){            return true;        }else{            return false;        }    }//-----------------------------------------------------------    public function all_pages(){        $this->db->select('*');        $this->db->where("group_id_fk !=",0);        $this->db->from('pages');        $query = $this->db->get();        if ($query->num_rows() > 0) {            foreach ($query->result() as $row) {                $data[] = $row;            }            return $data;        }        return false;    }//-----------------------------------------------------------    public function main_groups_name(){        $this->db->select('*');        $this->db->from('pages');        $query = $this->db->get();        if ($query->num_rows() > 0) {            foreach ($query->result() as $row) {                $data[$row->page_id] = $row->page_title;            }            return $data;        }        return false;    }//-----------------------------------------------------------    public function get_by_id($id){        $query=$this->db->get_where('pages',array('page_id'=>$id));        return $query->row_array();    }//-----------------------------------------------------------    public function update($id,$file){        $data = array(            'page_title'=>  $this->input->post('page_title'),            'page_order'=>  $this->input->post('page_order'),            'page_link'=>$this->input->post('page_link'),            'page_icon_code'=>$this->input->post('page_icon_code'),            'group_id_fk'=>$this->input->post('group_id_fk'),            'level'=>$this->input->post('level'));        if(isset($file) && !empty($file) &&   $file!=null && $file!=''){            $data['page_image']=  $file;        }        $this->db->where('page_id', $id);        if ($this->db->update('pages', $data)) {            return true;        } else {            return false;        }    }}// END CLASS