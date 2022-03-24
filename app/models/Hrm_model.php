<?php
if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

/**
 * @property CI_DB_query_builder $db   Database
 * @property CI_DB_forge $dbforge     Database
 * @property CI_DB_result $result    Database
 * @property CI_Session $session
 **/
class Hrm_model extends CI_Model
{
    public $_pass = "pass12345";

    public $_string = "0123456789";
    public $_tableStaff = "staff";
    public $_tableCaretakers = "caretakers";
    public $_tableHouses = "houses";

    public function __construct()
    {
        parent::__construct();
    }
    public function transcode()
    {
        $id = $this->branchid().substr(time(),6,4).substr(str_shuffle($this->_string),0,4);
        return $id;
    }
    function branchid()
    {
        return 2;
        return $this->aauth->user()['branch_id'];
    }

    function fetch_caretakers()
    {
        $this->db->select($this->_tableCaretakers.".*,".$this->_tableHouses.".serial_no")->from($this->_tableCaretakers);
        $this->db->join($this->_tableHouses,$this->_tableHouses.".id=".$this->_tableCaretakers.".house_no");
        $query = $this->db->get();

        return $query->result_array();
    }
    function fetch_caretakersID($id)
    {
        $this->db->where($this->_tableCaretakers.'.id',$id);
        $this->db->select($this->_tableCaretakers.".*,".$this->_tableHouses.".serial_no")->from($this->_tableCaretakers);
        $this->db->join($this->_tableHouses,$this->_tableHouses.".id=".$this->_tableCaretakers.".house_no");
        $query = $this->db->get();

        return $query->row_array();
    }
    function addcaretaker($data)
    {
        $this->db->insert($this->_tableCaretakers,$data);

        return $this->db->insert_id();
    }
    public function editcaretaker($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update($this->_tableCaretakers,$data);

        return $this->db->affected_rows();
    }
    public function deletecaretaker($id)
    {
        $this->db->where('id',$id);
        $this->db->delete($this->_tableCaretakers);

        return $this->db->affected_rows();
    }
    public function addstaff($data){
        $staff = array("name" => $data['name'], "email" => $data['email'],"password" => $this->aauth->hash($data['password']));
        $this->db->insert($this->_tableStaff,$staff);

        return $this->db->insert_id();
    }
    public function editstaff($data,$id)
    {
        if($data['password'] == ""){
            unset($data['password']);
        }else{
            $data['password'] = $this->aauth->hash($data['password']);
        }
        $this->db->where('id',$id);
        $this->db->update($this->_tableStaff,$data);

        return $this->db->affected_rows();
    }
    public function deletestaff($id)
    {
        $this->db->where('id',$id);
        $this->db->delete($this->_tableStaff);

        return $this->db->affected_rows();
    }
    public function fetchstaff()
    {
        $query = $this->db->get($this->_tableStaff);

        return $query->result_array();
    }
    public function fetchstaffID($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get($this->_tableStaff);

        return $query->row_array();
    }

}
