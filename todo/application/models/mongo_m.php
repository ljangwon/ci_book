<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mongo_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('mongo_db');
    }

    public function get_list()
    {
        $this->mongo_db->order_by(array('_id'=>-1));
        $data = $this->mongo_db->get('things');
        return $data;
    }

    public function insert($name)
    {
		$name_arr = array('name' => $name);
        $this->mongo_db->insert('things', $name_arr);
    }

}

/* End of file mongo_m.php */
/* Location: ./application/models/mongo_m.php */