<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T03_akunl2 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) redirect('auth/login', 'refresh');
        $this->load->model('T03_akunl2_model');
        $this->load->library('form_validation');
        $this->load->library('grocery_CRUD');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't03_akunl2/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't03_akunl2/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't03_akunl2/index.html';
            $config['first_url'] = base_url() . 't03_akunl2/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T03_akunl2_model->total_rows($q);
        $t03_akunl2 = $this->T03_akunl2_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't03_akunl2_data' => $t03_akunl2,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('t03_akunl2/t03_akunl2_list', $data);
        $data['_view'] = 't03_akunl2/t03_akunl2_list';
        $data['_caption'] = 'Akun Level-2';
        $this->load->view('dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->T03_akunl2_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idl2' => $row->idl2,
		'idl1' => $row->idl1,
		'Kode' => $row->Kode,
		'Nama' => $row->Nama,
		'created_at' => $row->created_at,
		'updated_at' => $row->updated_at,
	    );
            // $this->load->view('t03_akunl2/t03_akunl2_read', $data);
            $data['_view'] = 't03_akunl2/t03_akunl2_read';
            $data['_caption'] = 'Akun Level-2';
            $this->load->view('dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t03_akunl2'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t03_akunl2/create_action'),
	    'idl2' => set_value('idl2'),
	    'idl1' => set_value('idl1'),
	    'Kode' => set_value('Kode'),
	    'Nama' => set_value('Nama'),
	    'created_at' => set_value('created_at'),
	    'updated_at' => set_value('updated_at'),
	);
        // $this->load->view('t03_akunl2/t03_akunl2_form', $data);
        $data['_view'] = 't03_akunl2/t03_akunl2_form';
        $data['_caption'] = 'Akun Level-2';
        $this->load->view('dashboard/_layout', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idl1' => $this->input->post('idl1',TRUE),
		'Kode' => $this->input->post('Kode',TRUE),
		'Nama' => $this->input->post('Nama',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->T03_akunl2_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t03_akunl2'));
        }
    }

    public function update($id)
    {
        $row = $this->T03_akunl2_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t03_akunl2/update_action'),
		'idl2' => set_value('idl2', $row->idl2),
		'idl1' => set_value('idl1', $row->idl1),
		'Kode' => set_value('Kode', $row->Kode),
		'Nama' => set_value('Nama', $row->Nama),
		'created_at' => set_value('created_at', $row->created_at),
		'updated_at' => set_value('updated_at', $row->updated_at),
	    );
            // $this->load->view('t03_akunl2/t03_akunl2_form', $data);
            $data['_view'] = 't03_akunl2/t03_akunl2_form';
            $data['_caption'] = 'Akun Level-2';
            $this->load->view('dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t03_akunl2'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idl2', TRUE));
        } else {
            $data = array(
		'idl1' => $this->input->post('idl1',TRUE),
		'Kode' => $this->input->post('Kode',TRUE),
		'Nama' => $this->input->post('Nama',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->T03_akunl2_model->update($this->input->post('idl2', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t03_akunl2'));
        }
    }

    public function delete($id)
    {
        $row = $this->T03_akunl2_model->get_by_id($id);

        if ($row) {
            $this->T03_akunl2_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t03_akunl2'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t03_akunl2'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('idl1', 'idl1', 'trim|required');
	$this->form_validation->set_rules('Kode', 'kode', 'trim|required');
	$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
	// $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	// $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('idl2', 'idl2', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t03_akunl2.xls";
        $judul = "t03_akunl2";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Idl1");
	xlsWriteLabel($tablehead, $kolomhead++, "Kode");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Created At");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

	foreach ($this->T03_akunl2_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idl1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Kode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_at);
	    xlsWriteLabel($tablebody, $kolombody++, $data->updated_at);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t03_akunl2.doc");

        $data = array(
            't03_akunl2_data' => $this->T03_akunl2_model->get_all(),
            'start' => 0
        );

        $this->load->view('t03_akunl2/t03_akunl2_doc',$data);
    }

    public function _example_output($output = null) {
        //$output->_view    = 'd01_kls/d01_kls_form2';
  		$output->_caption = 'Akun Level-2';
  		$this->load->view('dashboard/_layout', (array)$output);
    }

    public function index2()
    {
        $crud = new grocery_CRUD();
        $crud->set_table('t03_akunl2');
        $crud->set_relation('idl1', 't02_akunl1', '{Kode} - {Nama}');
        $crud->display_as('idl1', 'Kode - Nama L-1');
        $crud->set_subject('Akun Level-2');
        $crud->unset_columns(array('created_at', 'updated_at'));
        $crud->unset_add_fields(array('created_at', 'updated_at'));

        $output = $crud->render();
        $this->_example_output($output);
    }

}

/* End of file T03_akunl2.php */
/* Location: ./application/controllers/T03_akunl2.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-09-13 16:23:59 */
/* http://harviacode.com */
