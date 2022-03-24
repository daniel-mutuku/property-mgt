<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require (APPPATH .'third_party'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');

class Dashboard extends BASE_Controller {

	/**
	 * 
	 */
	public $random = "abcdefghijklmnopqrstuvwxyz0123456789";
	public function __construct()
	{
		parent::__construct();
        $this->load->model('inventory_model');
        $this->load->model('hrm_model');
	}

	public function index()
	{

        $this->data['monthlyincome'] = $this->inventory_model->monthlyincome();
        $this->data['annualincome'] = $this->inventory_model->annualincome();
        $this->data['dailyincome'] = $this->inventory_model->dailyincome();
		$this->data['pg_title'] = "Dashboard";
		$this->data['page_content'] = 'main/dashboard';
		$this->load->view('layout/template', $this->data);
	}


    public function caretakers()
    {
        $this->data['caretakers'] = $this->hrm_model->fetch_caretakers();
        $this->data['dtable'] = "present";
        $this->data['menuitem'] = "caretakers";
        $this->data['pg_title'] = "Caretakers";
        $this->data['page_content'] = 'main/caretakers';
        $this->load->view('layout/template', $this->data);
    }
    public function houses()
    {
        $this->data['houses'] = $this->inventory_model->fetchhouses();
        $this->data['dtable'] = "present";
        $this->data['pg_title'] = "Houses";
        $this->data['page_content'] = 'main/houses';
        $this->load->view('layout/template', $this->data);
    }
    public function bookings()
    {
        $this->data['houses'] = $this->inventory_model->fetch_bookings();
        $this->data['dtable'] = "present";
        $this->data['pg_title'] = "Bookings";
        $this->data['page_content'] = 'main/bookings';
        $this->load->view('layout/template', $this->data);
    }
    public function payments()
    {
        $this->data['houses'] = $this->inventory_model->fetchpayments();
        $this->data['dtable'] = "present";
        $this->data['pg_title'] = "Payments";
        $this->data['page_content'] = 'main/payments';
        $this->load->view('layout/template', $this->data);
    }
    public function damages()
    {
        $this->data['damages'] = $this->inventory_model->fetch_damages();
        $this->data['dtable'] = "present";
        $this->data['pg_title'] = "Damages";
        $this->data['page_content'] = 'main/damages';
        $this->load->view('layout/template', $this->data);
    }
    public function staff()
    {
        $this->data['staff'] = $this->hrm_model->fetchstaff();
        $this->data['dtable'] = "present";
        $this->data['pg_title'] = "Staff";
        $this->data['page_content'] = 'main/staff';
        $this->load->view('layout/template', $this->data);
    }
    public function addcaretaker()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('id_no', 'ID no', 'required|is_unique[caretakers.id_no]');
        $this->form_validation->set_rules('house_no', 'House', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['houses'] = $this->inventory_model->fetchhouses();
            $this->data['pg_title'] = "Add Caretaker";
            $this->data['page_content'] = 'data-entry/addcaretaker';
            $this->load->view('layout/template', $this->data);
        }else{
            $data = $this->input->post();
            $inserted = $this->hrm_model->addcaretaker($data);
            if ($inserted > 0) {
                $this->session->set_flashdata('success-msg','Data added!');
            }else{
                $this->session->set_flashdata('error-msg','Data no Added!');
            }
            redirect('dashboard/caretakers');
        }
    }
    public function editcaretaker($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('id_no', 'ID no', 'required');
        $this->form_validation->set_rules('house_no', 'House', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['id'] = $id;
            $this->data['caretaker'] = $this->hrm_model->fetch_caretakersID($id);
            $this->data['houses'] = $this->inventory_model->fetchhouses();
            $this->data['pg_title'] = "Edit Caretaker";
            $this->data['page_content'] = 'data-entry/editcaretaker';
            $this->load->view('layout/template', $this->data);
        }else{
            $data = $this->input->post();
            $inserted = $this->hrm_model->editcaretaker($data,$id);
            if ($inserted > 0) {
                $this->session->set_flashdata('success-msg','Data modified!');
            }else{
                $this->session->set_flashdata('error-msg','Data no modified!');
            }
            redirect('dashboard/caretakers');
        }
    }
    public function adddamage()
    {
        $this->form_validation->set_rules('cost', 'Cost', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('house_no', 'House', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['houses'] = $this->inventory_model->fetchhouses();
            $this->data['pg_title'] = "Add Damage";
            $this->data['page_content'] = 'data-entry/adddamage';
            $this->load->view('layout/template', $this->data);
        }else{
            $data = $this->input->post();
            $inserted = $this->inventory_model->adddamage($data);
            if ($inserted > 0) {
                $this->session->set_flashdata('success-msg','Data added!');
            }else{
                $this->session->set_flashdata('error-msg','Data no Added!');
            }
            redirect('dashboard/damages');
        }
    }
    public function editdamage($id)
    {
        $this->form_validation->set_rules('cost', 'Cost', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('house_no', 'House', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['id'] = $id;
            $this->data['damage'] = $this->inventory_model->fetch_damagesID($id);
            $this->data['houses'] = $this->inventory_model->fetchhouses();
            $this->data['pg_title'] = "Edit Damage";
            $this->data['page_content'] = 'data-entry/editdamage';
            $this->load->view('layout/template', $this->data);
        }else{
            $data = $this->input->post();
            $inserted = $this->inventory_model->editdamage($data,$id);
            if ($inserted > 0) {
                $this->session->set_flashdata('success-msg','Data modified!');
            }else{
                $this->session->set_flashdata('error-msg','Data no modified!');
            }
            redirect('dashboard/damages');
        }
    }
    public function markrepaired($id)
    {
        $data = array("status" => "repaired");
        $inserted = $this->inventory_model->editdamage($data,$id);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg','Data modified!');
        }else{
            $this->session->set_flashdata('error-msg','Data no modified!');
        }
        redirect('dashboard/damages');
    }
    public function addstaff()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['pg_title'] = "Add Staff";
            $this->data['page_content'] = 'data-entry/addstaff';
            $this->load->view('layout/template', $this->data);
        }else{
            $data = $this->input->post();
            $inserted = $this->hrm_model->addstaff($data);
            if ($inserted > 0) {
                $this->session->set_flashdata('success-msg','Data added!');
            }else{
                $this->session->set_flashdata('error-msg','Data no Added!');
            }
            redirect('dashboard/staff');
        }
    }
    public function editstaff($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['id'] = $id;
            $this->data['staff'] = $this->hrm_model->fetchstaffID($id);
            $this->data['pg_title'] = "Edit Staff";
            $this->data['page_content'] = 'data-entry/editstaff';
            $this->load->view('layout/template', $this->data);
        }else{
            $data = $this->input->post();
            $inserted = $this->hrm_model->editstaff($data,$id);
            if ($inserted > 0) {
                $this->session->set_flashdata('success-msg','Data modified!');
            }else{
                $this->session->set_flashdata('error-msg','Data not modified!');
            }
            redirect('dashboard/staff');
        }
    }
    public function addhouse()
    {
        $this->form_validation->set_rules('serial_no', 'Serial no', 'required|is_unique[houses.serial_no]');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('bedrooms', 'bedrooms', 'required');
        $this->form_validation->set_rules('bathrooms', 'Bathrooms', 'required');
        $this->form_validation->set_rules('parking_spaces', 'Parking slots', 'required');
        $this->form_validation->set_rules('floor_size', 'Floor size', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['pg_title'] = "Add House";
            $this->data['page_content'] = 'data-entry/addhouse';
            $this->load->view('layout/template', $this->data);
        }else{
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'image/*';
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);
            $data = $this->input->post();


                $fileInfo = pathinfo($_FILES["file"]["name"]);
                $file =  substr(str_shuffle($this->random),0,5).time().".".$fileInfo['extension'];

//                 echo $file;die;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $moved = move_uploaded_file($_FILES["file"]["tmp_name"], $config['upload_path'] . "/". $file);
                if ($moved)
                    $data['img'] = $file;

            unset($data['file']);
            $inserted = $this->inventory_model->addhouse($data);
            if ($inserted > 0) {
                $this->session->set_flashdata('success-msg','Data added!');
            }else{
                $this->session->set_flashdata('error-msg','Data no Added!');
            }
            redirect('dashboard/houses');
        }
    }
    public function edithouse($id)
    {
        $this->form_validation->set_rules('serial_no', 'Serial no', 'required');
        $this->form_validation->set_rules('location', 'Location', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('bedrooms', 'bedrooms', 'required');
        $this->form_validation->set_rules('bathrooms', 'Bathrooms', 'required');
        $this->form_validation->set_rules('parking_spaces', 'Parking slots', 'required');
        $this->form_validation->set_rules('floor_size', 'Floor size', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['id'] = $id;
            $this->data['house'] = $this->inventory_model->fetchhousesID($id);
            $this->data['pg_title'] = "Edit House";
            $this->data['page_content'] = 'data-entry/edithouse';
            $this->load->view('layout/template', $this->data);
        }else{
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'image/*';
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);
            $data = $this->input->post();


            $fileInfo = pathinfo($_FILES["file"]["name"]);
            $file =  substr(str_shuffle($this->random),0,5).time().".".$fileInfo['extension'];

//                 echo $file;die;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $moved = move_uploaded_file($_FILES["file"]["tmp_name"], $config['upload_path'] . "/". $file);
            if ($moved)
                $data['img'] = $file;

            unset($data['file']);
            $inserted = $this->inventory_model->edithouse($data,$id);
            if ($inserted > 0) {
                $this->session->set_flashdata('success-msg','Data modified!');
            }else{
                $this->session->set_flashdata('error-msg','Data no modified!');
            }
            redirect('dashboard/houses');
        }
    }
    public function deletestaff($id)
    {
        $inserted = $this->hrm_model->deletestaff($id);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg','Data deleted!');
        }else{
            $this->session->set_flashdata('error-msg','Data not deleteed!');
        }
        redirect('dashboard/staff');
    }
    public function deletecaretaker($id)
    {
        $inserted = $this->hrm_model->deletecaretaker($id);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg','Data deleted!');
        }else{
            $this->session->set_flashdata('error-msg','Data not deleted!');
        }
        redirect('dashboard/caretakers');
    }
    public function deletehouse($id)
    {
        $inserted = $this->inventory_model->deletehouse($id);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg','Data deleted!');
        }else{
            $this->session->set_flashdata('error-msg','Data not deleted!');
        }
        redirect('dashboard/houses');
    }
    public function deletedamage($id)
    {
        $inserted = $this->inventory_model->deletedamage($id);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg','Data deleted!');
        }else{
            $this->session->set_flashdata('error-msg','Data not deleted!');
        }
        redirect('dashboard/damages');
    }
    public function deletebooking($id)
    {
        $inserted = $this->inventory_model->deletebooking($id);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg','Data deleted!');
        }else{
            $this->session->set_flashdata('error-msg','Data not deleted!');
        }
        redirect('dashboard/bookings');
    }
    public function declinebooking($id)
    {
        $data = array("status" => "declined");
        $inserted = $this->inventory_model->editbooking($data,$id);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg','Data deleted!');
        }else{
            $this->session->set_flashdata('error-msg','Data not deleted!');
        }
        redirect('dashboard/bookings');
    }
    public function addpayment()
    {
        $data = $this->input->post();
        $hid = $data['house_id'];
        $bid = $data['booking_id'];

        $bdata = array("status" => "approved","payment_status" => "paid");
        $hdata = array("status" => "booked");
        $pdata = array("booking_id" => $data['booking_id'],"amount" => $data['amount'],"mode" => $data['mode']);

        $inserted = $this->inventory_model->addpayment($pdata);
        $this->inventory_model->edithouse($hdata,$hid);
        $this->inventory_model->editbooking($bdata,$bid);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg','Success');
        }else{
            $this->session->set_flashdata('error-msg','Failed!');
        }
        redirect('dashboard/bookings');
    }
    public function checkout($bid,$hid)
    {
        $bdata = array("status" => "checked-out");
        $hdata = array("status" => "available");

        $this->inventory_model->edithouse($hdata,$hid);
        $inserted = $this->inventory_model->editbooking($bdata,$bid);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg','Success');
        }else{
            $this->session->set_flashdata('error-msg','Failed!');
        }
        redirect('dashboard/bookings');
    }

}
