<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T02_akunl1 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T02_akunl1_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't02_akunl1/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't02_akunl1/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't02_akunl1/index.html';
            $config['first_url'] = base_url() . 't02_akunl1/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T02_akunl1_model->total_rows($q);
        $t02_akunl1 = $this->T02_akunl1_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't02_akunl1_data' => $t02_akunl1,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('t02_akunl1/t02_akunl1_list', $data);
        $data['_view'] = 't02_akunl1/t02_akunl1_list';
        $data['_caption'] = 'Akun Level-1';
        $this->load->view('dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->T02_akunl1_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idl1' => $row->idl1,
		'Kode' => $row->Kode,
		'Nama' => $row->Nama,
		// 'created_at' => $row->created_at,
		// 'updated_at' => $row->updated_at,
	    );
            $this->load->view('t02_akunl1/t02_akunl1_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t02_akunl1'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t02_akunl1/create_action'),
	    'idl1' => set_value('idl1'),
	    'Kode' => set_value('Kode'),
	    'Nama' => set_value('Nama'),
	    // 'created_at' => set_value('created_at'),
	    // 'updated_at' => set_value('updated_at'),
	);
        // $this->load->view('t02_akunl1/t02_akunl1_form', $data);
        $data['_view'] = 't02_akunl1/t02_akunl1_form';
        $data['_caption'] = 'Akun Level-1';
        $this->load->view('dashboard/_layout', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'Kode' => $this->input->post('Kode',TRUE),
		'Nama' => $this->input->post('Nama',TRUE),
		// 'created_at' => $this->input->post('created_at',TRUE),
		// 'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->T02_akunl1_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t02_akunl1'));
        }
    }

    public function update($id)
    {
        $row = $this->T02_akunl1_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t02_akunl1/update_action'),
		'idl1' => set_value('idl1', $row->idl1),
		'Kode' => set_value('Kode', $row->Kode),
		'Nama' => set_value('Nama', $row->Nama),
		// 'created_at' => set_value('created_at', $row->created_at),
		// 'updated_at' => set_value('updated_at', $row->updated_at),
	    );
            // $this->load->view('t02_akunl1/t02_akunl1_form', $data);
            $data['_view'] = 't02_akunl1/t02_akunl1_form';
            $data['_caption'] = 'Akun Level-1';
            $this->load->view('dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t02_akunl1'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idl1', TRUE));
        } else {
            $data = array(
		'Kode' => $this->input->post('Kode',TRUE),
		'Nama' => $this->input->post('Nama',TRUE),
		// 'created_at' => $this->input->post('created_at',TRUE),
		// 'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->T02_akunl1_model->update($this->input->post('idl1', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t02_akunl1'));
        }
    }

    public function delete($id)
    {
        $row = $this->T02_akunl1_model->get_by_id($id);

        if ($row) {
            $this->T02_akunl1_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t02_akunl1'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t02_akunl1'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('Kode', 'kode', 'trim|required');
	$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
	// $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	// $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('idl1', 'idl1', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t02_akunl1.xls";
        $judul = "t02_akunl1";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Kode");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Created At");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

	foreach ($this->T02_akunl1_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Kode);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Nama);
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
        header("Content-Disposition: attachment;Filename=t02_akunl1.doc");

        $data = array(
            't02_akunl1_data' => $this->T02_akunl1_model->get_all(),
            'start' => 0
        );

        $this->load->view('t02_akunl1/t02_akunl1_doc',$data);
    }

}

/* End of file T02_akunl1.php */
/* Location: ./application/controllers/T02_akunl1.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-09-13 15:23:38 */
/* http://harviacode.com */
