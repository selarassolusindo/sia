<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tamu extends CI_Controller
{

    public $table = 't02_tamu';

    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) redirect('auth/login', 'refresh');
        $this->db = $this->load->database('tamu', true);
        $this->load->library('grocery_CRUD');
    }

    public function _example_output($output = null) {
  		$this->load->view('dashboard/_layout', (array)$output);
    }

    public function index()
    {
        $crud = new grocery_CRUD();
        $crud->set_table($this->table);
        $crud->set_subject('Data Tamu');
        $crud->unset_columns(array('created_at', 'updated_at'));
        $crud->unset_fields(array('created_at', 'updated_at'));

        // $crud->columns(['PackageName', 'PackageCode', 'SN3LN', 'SN6LN', 'SNELN', 'PN1LN', 'PN1DN']);
        // $crud->fields('PackageName', 'PackageCode', 'SN3LN', 'SN6LN', 'SNELN', 'PN1LN', 'PN1DN',
        //     'SN3C', 'SN3CP', 'SN6C', 'SN6CP', 'SNEC', 'SNECP', 'PN3C', 'PN3CP', 'PN6C', 'PN6CP',
        //     'PNEC', 'PNECP'
        //     );
        // $crud->change_field_type('SN3C', 'invisible');
        // $crud->change_field_type('SN3CP', 'invisible');
        // $crud->change_field_type('SN6C', 'invisible');
        // $crud->change_field_type('SN6CP', 'invisible');
        // $crud->change_field_type('SNEC', 'invisible');
        // $crud->change_field_type('SNECP', 'invisible');
        // $crud->change_field_type('PN3C', 'invisible');
        // $crud->change_field_type('PN3CP', 'invisible');
        // $crud->change_field_type('PN6C', 'invisible');
        // $crud->change_field_type('PN6CP', 'invisible');
        // $crud->change_field_type('PNEC', 'invisible');
        // $crud->change_field_type('PNECP', 'invisible');

        // $crud->callback_before_insert(array($this, 'updateCost'));
        // $crud->callback_before_update(array($this, 'updateCost'));

        $output = $crud->render();
        $output->_caption = 'Data Tamu';

        // $output->_js_output = '
        //     <script>
        //         $(\'.SN3LN\').mask("#.##0,00", {reverse: true});
        //         $(\'.SN6LN\').mask("#.##0,00", {reverse: true});
        //         $(\'.SNELN\').mask("#.##0,00", {reverse: true});
        //         $(\'.PN1LN\').mask("#.##0,00", {reverse: true});
        //         $(\'.PN1DN\').mask("#.##0,00", {reverse: true});
        //     </script>
        // ';
        $this->_example_output($output);
    }
}
