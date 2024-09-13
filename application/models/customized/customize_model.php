<?php defined('BASEPATH') OR exit('No direct script access allowed');

class customize_model extends CI_Model {


//-------------------------------------------------------------
//                     GET THE DEFECTIVE ITEM  FORM 
//-------------------------------------------------------------
    public function get_system_info()
    {
        return $this->db->get('Customize_shop')->row_array();
    } 

    public function updating_shop_info($data, $custom_id){
        $this->db->set($data);
        $this->db->where('custom_id', $custom_id)->update('Customize_shop',$data);
    }


}