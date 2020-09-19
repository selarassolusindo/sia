<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Price extends CI_Controller
{

    public $table = 't01_price';

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
        $crud->set_subject('Price');
        $crud->unset_columns(array('created_at', 'updated_at'));
        $crud->unset_fields(array('created_at', 'updated_at'));

        $crud
            ->display_as('PackageName', 'Package Name')
            ->display_as('PackageCode', 'Code')
            ->display_as('SN3LN', '3 Night (LN)')
            ->display_as('SN6LN', '6 Night (LN)')
            ->display_as('SNELN', 'Extend / Night (LN)')
            ->display_as('PN1LN', '1 Night (LN)')
            ->display_as('PN1DN', '1 Night (DN)')
            ;

        $crud->callback_add_field('SN3LN', function() {
            return 'USD <input type="text" maxlength="50" value="" name="SN3LN">';
        });
        $crud->callback_add_field('SN6LN', function() {
            return 'USD <input type="text" maxlength="50" value="" name="SN6LN">';
        });
        $crud->callback_add_field('SNELN', function() {
            return 'USD <input type="text" maxlength="50" value="" name="SNELN">';
        });
        $crud->callback_add_field('PN1LN', function() {
            return 'USD <input type="text" maxlength="50" value="" name="PN1LN">';
        });
        $crud->callback_add_field('PN1DN', function() {
            return 'IDR <input type="text" maxlength="50" value="" name="PN1DN">';
        });

        $crud
            ->callback_column('SN3LN', array($this, 'valueToUsd'))
            ->callback_column('SN6LN', array($this, 'valueToUsd'))
            ->callback_column('SNELN', array($this, 'valueToUsd'))
            ->callback_column('PN1LN', array($this, 'valueToUsd'))
            ->callback_column('PN1DN', array($this, 'valueToIdr'))
            ;

        $output = $crud->render();
        $output->_caption = 'Price';
        $this->_example_output($output);
    }

    public function valueToUsd($value, $row)
    {
        return 'USD ' . $value;
    }

    public function valueToIdr($value, $row)
    {
        return 'IDR ' . $value;
    }
}
