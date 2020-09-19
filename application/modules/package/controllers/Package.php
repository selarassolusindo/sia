<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Package extends CI_Controller
{

    public $table = 't01_package';

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
        $crud->set_subject('Package');
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

        $crud->callback_field('SN3LN', function($value = '', $primary_key = null) {
            return 'USD <input type="text" maxlength="50" value="'.$value.'" name="SN3LN">';
        });
        $crud->callback_field('SN6LN', function($value = '', $primary_key = null) {
            return 'USD <input type="text" maxlength="50" value="'.$value.'" name="SN6LN">';
        });
        $crud->callback_field('SNELN', function($value = '', $primary_key = null) {
            return 'USD <input type="text" maxlength="50" value="'.$value.'" name="SNELN">';
        });
        $crud->callback_field('PN1LN', function($value = '', $primary_key = null) {
            return 'USD <input type="text" maxlength="50" value="'.$value.'" name="PN1LN">';
        });
        $crud->callback_field('PN1DN', function($value = '', $primary_key = null) {
            return 'IDR <input type="text" maxlength="50" value="'.$value.'" name="PN1DN">';
        });

        $crud
            ->callback_column('SN3LN', array($this, 'valueToUsd'))
            ->callback_column('SN6LN', array($this, 'valueToUsd'))
            ->callback_column('SNELN', array($this, 'valueToUsd'))
            ->callback_column('PN1LN', array($this, 'valueToUsd'))
            ->callback_column('PN1DN', array($this, 'valueToIdr'))
            ;

        $crud->columns(['PackageName', 'PackageCode', 'SN3LN', 'SN6LN', 'SNELN', 'PN1LN', 'PN1DN']);
        $crud->fields('PackageName', 'PackageCode', 'SN3LN', 'SN6LN', 'SNELN', 'PN1LN', 'PN1DN',
            'SN3C', 'SN3CP', 'SN6C', 'SN6CP', 'SNEC', 'SNECP', 'PN3C', 'PN3CP', 'PN6C', 'PN6CP',
            'PNEC', 'PNECP'
            );
        $crud->change_field_type('SN3C', 'invisible');
        $crud->change_field_type('SN3CP', 'invisible');
        $crud->change_field_type('SN6C', 'invisible');
        $crud->change_field_type('SN6CP', 'invisible');
        $crud->change_field_type('SNEC', 'invisible');
        $crud->change_field_type('SNECP', 'invisible');
        $crud->change_field_type('PN3C', 'invisible');
        $crud->change_field_type('PN3CP', 'invisible');
        $crud->change_field_type('PN6C', 'invisible');
        $crud->change_field_type('PN6CP', 'invisible');
        $crud->change_field_type('PNEC', 'invisible');
        $crud->change_field_type('PNECP', 'invisible');

        $crud->callback_before_insert(array($this, 'updateCost'));
        $crud->callback_before_update(array($this, 'updateCost'));

        $output = $crud->render();
        $output->_caption = 'Package';
        $this->_example_output($output);
    }

    public function updateCost($postArray)
    {
        $postArray['PN3C']  = $postArray['PN1LN'] * 3; // piw price 3 night cost
        $postArray['PN3CP'] = round($postArray['PN3C'] / $postArray['SN3LN'], 2); // piw price 3 night %
        $postArray['PN6C']  = $postArray['PN1LN'] * 6; // piw price 6 night cost
        $postArray['PN6CP'] = round($postArray['PN6C'] / $postArray['SN6LN'], 2); // piw price 6 night %
        $postArray['PNEC']  = $postArray['PN1LN']; // piw price extend /night cost
        $postArray['PNECP'] = round($postArray['PNEC'] / $postArray['SNELN'], 2); // piw price extend /night %

        $postArray['SN3C']  = $postArray['SN3LN'] - $postArray['PN3C']; // ssw price 3 night cost
        $postArray['SN3CP'] = round($postArray['SN3C'] / $postArray['SN3LN'], 2); // ssw price 3 night %
        $postArray['SN6C']  = $postArray['SN6LN'] - $postArray['PN6C']; // ssw price 6 night cost
        $postArray['SN6CP'] = round($postArray['SN6C'] / $postArray['SN6LN'], 2); // ssw price 6 night %
        $postArray['SNEC']  = $postArray['SNELN'] - $postArray['PNEC']; // ssw price extend /night cost
        $postArray['SNECP'] = round($postArray['SNEC'] / $postArray['SNELN'], 2); // ssw price extend /night %

        return $postArray;
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
