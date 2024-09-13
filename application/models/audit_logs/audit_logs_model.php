<?php defined('BASEPATH') OR exit('No direct script access allowed');

class audit_logs_model extends CI_Model {

//-------------------------------------------------------------
//                      ADMIN LOGS SECTION
//-------------------------------------------------------------
    
     // Fetch records
    public function get_audit_admin_Data($rowno, $rowperpage, $search = "")
    {
        $this->db->select('*');
        $this->db->from('audit_trail_admin');
    
        if ($search != '') {
            $this->db->like('logs_id', $search);
            $this->db->or_like('admin_id', $search);
            $this->db->or_like('admin_username', $search);
            $this->db->or_like('date_time_in', $search);
            $this->db->or_like('date_time_out', $search);
        }

        $this->db->order_by('logs_id', 'desc'); // added order by clause
        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();
    
        return $query->result_array();
    }

    // Select total records
    public function get_admin_logs_count($search = '')
    {
        $this->db->select('count(*) as allcount');
        $this->db->from('audit_trail_admin');
    
        if ($search != '') {
            $this->db->like('logs_id', $search);
            $this->db->or_like('admin_id', $search);
            $this->db->or_like('admin_username', $search);
            $this->db->or_like('date_time_in', $search);
            $this->db->or_like('date_time_out', $search);
        }
    
        $query = $this->db->get();
        $result = $query->result_array();
    
        return $result[0]['allcount'];
    }

//-------------------------------------------------------------
//                      USER LOGS SECTION
//-------------------------------------------------------------


     // Fetch records
     public function get_audit_user_Data($rowno, $rowperpage, $search = "")
     {
         $this->db->select('*');
         $this->db->from('audit_trail_user');
     
         if ($search != '') {
             $this->db->like('logs_id', $search);
             $this->db->or_like('user_id', $search);
             $this->db->or_like('user_name', $search);
             $this->db->or_like('date_time_in', $search);
             $this->db->or_like('date_time_out', $search);
         }
 
         $this->db->order_by('logs_id', 'desc'); // added order by clause
         $this->db->limit($rowperpage, $rowno);
         $query = $this->db->get();
     
         return $query->result_array();
     }
 
     // Select total records
     public function get_user_logs_count($search = '')
     {
         $this->db->select('count(*) as allcount');
         $this->db->from('audit_trail_user');
     
         if ($search != '') {
             $this->db->like('logs_id', $search);
             $this->db->or_like('user_id', $search);
             $this->db->or_like('user_name', $search);
             $this->db->or_like('date_time_in', $search);
             $this->db->or_like('date_time_out', $search);
         }
     
         $query = $this->db->get();
         $result = $query->result_array();
     
         return $result[0]['allcount'];
     }
 


}