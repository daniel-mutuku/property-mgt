<?php
/*
	 * Template carries header, footer, and common navigation
	 * */
$this->load->view('layout/header');
$this->load->view('layout/topmenu');
$this->load->view('layout/sidebar');
$this->load->view($page_content);
$this->load->view('layout/footer');