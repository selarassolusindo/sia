<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saldoawal extends CI_Controller
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

    public $table = 't03_saldoawal';

    public function index()
    {
        $crud = new grocery_CRUD();

        $crud->set_table($this->table);
        $crud->set_subject('Saldo Awal');

        $crud->set_relation('idakun', 't02_akun', '{Kode} - {Nama}');
        $crud->display_as('idakun', 'Akun');

        $crud->set_crud_url_path(site_url('saldoawal/index'));

        $crud->callback_column('Debit', function($value, $row) { return numIndo($value); });
        $crud->callback_column('Kredit', function($value, $row) { return numIndo($value); });

        $crud->callback_field('Debit', function($value = '', $primary_key = null) {
            return '<input id="field-Debit" class="form-control form-control-sm" name="Debit" type="text" value="'.numIndo($value).'">';
        });

        $crud->callback_field('Kredit', function($value = '', $primary_key = null) {
            return '<input id="field-Kredit" class="form-control form-control-sm" name="Kredit" type="text" value="'.numIndo($value).'">';
        });

        $crud->unset_columns(array('created_at', 'updated_at'));
        $crud->unset_fields(array('created_at', 'updated_at'));

        $output = $crud->render();
        $output->_caption = 'Saldo Awal';
        $output->_js_output = '
            <script>
                $(\'.Debit\').mask("#.##0,00", {reverse: true});
                $(\'.Kredit\').mask("#.##0,00", {reverse: true});
            </script>
            ';

        $this->_example_output($output);
    }
}
