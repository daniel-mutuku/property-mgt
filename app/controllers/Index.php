<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	/**
	 * 
	 */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('inventory_model');
    }

	public function index()
	{
        $this->data['houses'] = $this->inventory_model->fetchhouses();
        $this->data['pg_title'] = "Jamii Housing";
        $this->data['page_content'] = 'index/index';
        $this->load->view('layout/landing_template', $this->data);
	}
	public function book()
    {
        $data = $this->input->post();

        $inserted = $this->inventory_model->book($data);
        if ($inserted > 0) {
            $this->session->set_flashdata('success-msg','Data modified!');
        }else{
            $this->session->set_flashdata('error-msg','Data no modified!');
        }
        redirect('index/index');
    }

}
