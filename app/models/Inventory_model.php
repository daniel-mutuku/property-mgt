<?php
if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

/**
 * @property CI_DB_query_builder $db   Database
 * @property CI_DB_forge $dbforge     Database
 * @property CI_DB_result $result    Database
 * @property CI_Session $session
 **/
class Inventory_model extends CI_Model
{
    public $_tableHouses = "houses";
    public $_tableDamages = "damages";

    public function __construct()
    {
        parent::__construct();
    }
    public function transcode()
    {
        $id = substr(time(),6,4).substr(str_shuffle($this->_string),0,4);
        return $id;
    }

    public function fetchhouses(){
        $query = $this->db->get($this->_tableHouses);

        return $query->result_array();
    }
    public function fetchhousesID($id){
        $this->db->where('id',$id);
        $query = $this->db->get($this->_tableHouses);

        return $query->row_array();
    }
    function addhouse($data)
    {
        $this->db->insert($this->_tableHouses,$data);

        return $this->db->insert_id();
    }
    function edithouse($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update($this->_tableHouses,$data);

        return $this->db->affected_rows();
    }
    function deletehouse($id)
    {
        $this->db->where('id',$id);
        $this->db->delete($this->_tableHouses);
        return $this->db->affected_rows();
    }
    function adddamage($data)
    {
        $this->db->insert($this->_tableDamages,$data);

        return $this->db->insert_id();
    }
    function book($data)
    {
        $this->db->insert('bookings',$data);
        $insert = $this->db->insert_id();

        return $insert;
    }

    function fetch_damages()
    {
        $this->db->select($this->_tableDamages.".*,".$this->_tableHouses.".serial_no")->from($this->_tableDamages);
        $this->db->join($this->_tableHouses,$this->_tableHouses.".id=".$this->_tableDamages.".house_no");
        $query = $this->db->get();

        return $query->result_array();
    }
    function fetch_damagesID($id)
    {
        $this->db->where($this->_tableDamages.'.id',$id);
        $this->db->select($this->_tableDamages.".*,".$this->_tableHouses.".serial_no")->from($this->_tableDamages);
        $this->db->join($this->_tableHouses,$this->_tableHouses.".id=".$this->_tableDamages.".house_no");
        $query = $this->db->get();

        return $query->row_array();
    }

    function editdamage($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update($this->_tableDamages,$data);

        return $this->db->affected_rows();
    }
    function deletedamage($id)
    {
        $this->db->where('id',$id);
        $this->db->delete($this->_tableDamages);
        return $this->db->affected_rows();
    }
    function deletebooking($id)
    {
        $this->db->where('id',$id);
        $this->db->delete("bookings");
        return $this->db->affected_rows();
    }
    public function fetch_bookings()
    {
        $this->db->select('houses.price,houses.serial_no,bookings.*')->from('bookings');
        $this->db->join('houses','houses.id=bookings.house_no');
        $this->db->order_by('bookings.created_at','DESC');
        $query = $this->db->get();

        return $query->result_array();
    }
    function editbooking($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update("bookings",$data);

        return $this->db->affected_rows();
    }
    public function addpayment($data)
    {
        $this->db->insert('bookings_payments',$data);

        return $this->db->insert_id();
    }
    public function fetchpayments()
    {
        $this->db->select('bookings_payments.*,bookings.client_name')->from('bookings_payments');
        $this->db->join('bookings','bookings_payments.booking_id=bookings.id');
        $this->db->order_by('bookings_payments.id','DESC');
        $query = $this->db->get();

        return $query->result_array();
    }
    public function monthlyincome()
    {
        $amt = 0;
        $this->db->like('created_at', date('Y-m'));
        $this->db->select_sum('amount')->from("bookings_payments");
        $query = $this->db->get();
        if ($query->row_array()['amount'])
            $amt = $query->row_array()['amount'];
        return $amt;
    }
    public function dailyincome()
    {
        $amt = 0;
        $this->db->like('created_at', date('Y-m-d'));
        $this->db->select_sum('amount')->from("bookings_payments");
        $query = $this->db->get();
        if ($query->row_array()['amount'])
            $amt = $query->row_array()['amount'];
        return $amt;
    }

    public function annualincome()
    {
        $amt = 0;
        $this->db->like('created_at', date('Y'));
        $this->db->select_sum('amount')->from("bookings_payments");
        $query = $this->db->get();
        if ($query->row_array()['amount'])
            $amt = $query->row_array()['amount'];
        return $amt;
    }

}
