<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->db->db_select(DBPREFIX . '_sia');
    }

    public function index()
    {
        $data['_view'] = 'dashboard';
        $data['_caption'] = 'Dashboard';
        $this->load->view('dashboard/_layout', $data);
    }
}
