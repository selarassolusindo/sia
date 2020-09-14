<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) redirect('auth/login', 'refresh');
        $this->load->library('grocery_CRUD');
    }

    public function _example_output($output = null) {
        //$output->_view    = 'd01_kls/d01_kls_form2';
  		// $output->_caption = 'Akun Level-1';
  		$this->load->view('dashboard/_layout', (array)$output);
    }

    public function l1()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('t02_akunl1');
        $crud->set_subject('Akun Level-1');
        $crud->unset_columns(array('created_at', 'updated_at'));
        $crud->unset_fields(array('created_at', 'updated_at'));

        $output = $crud->render();
        $output->_caption = 'Akun Level-1';
        $this->_example_output($output);
    }

    public function l2()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('t03_akunl2');
        $crud->set_relation('l1_id', 't02_akunl1', '{Kode} - {Nama}');
        $crud->display_as('l1_id', 'Akun Level-1');
        $crud->unset_columns(array('created_at', 'updated_at'));
        $crud->unset_fields(array('created_at', 'updated_at'));

        $output = $crud->render();
        $output->_caption = 'Akun Level-2';
        $this->_example_output($output);
    }

    public function l3()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('t04_akunl3');
        $crud->set_relation('l1_id', 't02_akunl1', '{Kode} - {Nama}');
        $crud->set_relation('l2_id', 't03_akunl2', '{Kode} - {Nama}');
        $crud->display_as('l1_id', 'Akun Level-1');
        $crud->display_as('l2_id', 'Akun Level-2');
        $crud->unset_columns(array('created_at', 'updated_at'));
        $crud->unset_fields(array('created_at', 'updated_at'));

        $this->load->library('gc_dependent_select');

        $fields = array(
            'l1_id' => array(
                'table_name' => 't02_akunl1',
                'title'      => 'Nama',
                'relate'     => null
            ),
            'l2_id' => array(
                'table_name' => 't03_akunl2',
                'title'      => '{Kode} - {Nama}',
                'id_field'   => 'id',
                'relate'     => 'l1_id'
            )
        );

        $config = array(
            'main_table' => 't04_akunl3',
            'main_table_primary' => 'id',
            "url" => base_url() . __CLASS__ . '/' . __FUNCTION__ . '/'
        );

        $akun = new gc_dependent_select($crud, $fields, $config);

        $js = $akun->get_js();
        $output = $crud->render();

        // $output->output .= $js;
        $output->_dependent_js = $js;
        $output->_caption = 'Akun Level-3';

        $this->_example_output($output);
    }

    public function l4()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('t05_akunl4');
        $crud->set_relation('l1_id', 't02_akunl1', '{Kode} - {Nama}');
        $crud->set_relation('l2_id', 't03_akunl2', '{Kode} - {Nama}');
        $crud->set_relation('l3_id', 't04_akunl3', '{Kode} - {Nama}');
        $crud->display_as('l1_id', 'Akun Level-1');
        $crud->display_as('l2_id', 'Akun Level-2');
        $crud->display_as('l3_id', 'Akun Level-3');
        $crud->unset_columns(array('created_at', 'updated_at'));
        $crud->unset_fields(array('created_at', 'updated_at'));

        $this->load->library('gc_dependent_select');

        $fields = array(
            'l1_id' => array(
                'table_name' => 't02_akunl1',
                'title'      => 'Nama',
                'relate'     => null
            ),
            'l2_id' => array(
                'table_name' => 't03_akunl2',
                'title'      => '{Kode} - {Nama}',
                'id_field'   => 'id',
                'relate'     => 'l1_id'
            ),
            'l3_id' => array(
                'table_name' => 't04_akunl3',
                'title'      => '{Kode} - {Nama}',
                'id_field'   => 'id',
                'relate'     => 'l2_id'
            )
        );

        $config = array(
            'main_table' => 't05_akunl4',
            'main_table_primary' => 'id',
            "url" => base_url() . __CLASS__ . '/' . __FUNCTION__ . '/'
        );

        $akun = new gc_dependent_select($crud, $fields, $config);

        $js = $akun->get_js();
        $output = $crud->render();

        // $output->output .= $js;
        $output->_dependent_js = $js;
        $output->_caption = 'Akun Level-4';

        $this->_example_output($output);
    }
}
