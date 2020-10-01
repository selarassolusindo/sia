<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tglsaldoawal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) redirect('auth/login', 'refresh');
        $this->db = $this->load->database($this->session->userdata('groupName'), true);
        $this->load->library('grocery_CRUD');
    }

    public function _example_output($output = null) {
  		$this->load->view('dashboard/_layout', (array)$output);
    }

    public $table = 't99_tglsaldoawal';

    public function index()
    {
        $crud = new grocery_CRUD();

        $crud->set_table($this->table);
        $crud->set_subject('Tgl. Input Saldo Awal');

        $crud->set_crud_url_path(site_url('tglsaldoawal/index'));

        $crud->unset_columns(array('created_at', 'updated_at'));
        $crud->unset_fields(array('created_at', 'updated_at'));

        $crud
            ->unset_add()
            ->unset_clone()
            ->unset_delete()
            ->unset_print()
            ->unset_export()
            ->unset_read()
            ;

        $output = $crud->render();
        $output->_caption = 'Tgl. Input Saldo Awal';

        $this->_example_output($output);
    }
}
