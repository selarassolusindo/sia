<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Klasak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Klasak_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'klasak?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'klasak?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'klasak';
            $config['first_url'] = base_url() . 'klasak';
        }

        $config['per_page'] = 10000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Klasak_model->total_rows($q);
        $klasak = $this->Klasak_model->getLimitData($config['per_page'], $start, $q);
        $klasakLastLevel = $this->Klasak_model->getAllLastLevel(); //echo pre($akunLastLevel); die();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'klasak_data' => $klasak,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'klasakLastLevel' => $klasakLastLevel,
        );
        // $this->load->view('klasak/v02_klasak_list', $data);
        $data['_view'] = 'klasak/v02_klasak_list';
        $data['_caption'] = 'Klasifikasi Akun';
        $this->load->view('dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->Klasak_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idakun' => $row->idakun,
		'KodeBB' => $row->KodeBB,
		'KodeBP' => $row->KodeBP,
		'Nama' => $row->Nama,
		'Induk' => $row->Induk,
		'Urut' => $row->Urut,
		'c' => $row->c,
	    );
            $this->load->view('klasak/v02_klasak_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('klasak'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('klasak/create_action'),
	    'idakun' => set_value('idakun'),
	    'KodeBB' => set_value('KodeBB'),
	    'KodeBP' => set_value('KodeBP'),
	    'Nama' => set_value('Nama'),
	    'Induk' => set_value('Induk'),
	    'Urut' => set_value('Urut'),
	    'c' => set_value('c'),
	);
        $this->load->view('klasak/v02_klasak_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idakun' => $this->input->post('idakun',TRUE),
		'KodeBB' => $this->input->post('KodeBB',TRUE),
		'KodeBP' => $this->input->post('KodeBP',TRUE),
		'Nama' => $this->input->post('Nama',TRUE),
		'Induk' => $this->input->post('Induk',TRUE),
		'Urut' => $this->input->post('Urut',TRUE),
		'c' => $this->input->post('c',TRUE),
	    );

            $this->Klasak_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('klasak'));
        }
    }

    public function update($id)
    {
        $row = $this->Klasak_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('klasak/update_action'),
		'idakun' => set_value('idakun', $row->idakun),
		'KodeBB' => set_value('KodeBB', $row->KodeBB),
		'KodeBP' => set_value('KodeBP', $row->KodeBP),
		'Nama' => set_value('Nama', $row->Nama),
		'Induk' => set_value('Induk', $row->Induk),
		'Urut' => set_value('Urut', $row->Urut),
		'c' => set_value('c', $row->c),
	    );
            $this->load->view('klasak/v02_klasak_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('klasak'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'idakun' => $this->input->post('idakun',TRUE),
		'KodeBB' => $this->input->post('KodeBB',TRUE),
		'KodeBP' => $this->input->post('KodeBP',TRUE),
		'Nama' => $this->input->post('Nama',TRUE),
		'Induk' => $this->input->post('Induk',TRUE),
		'Urut' => $this->input->post('Urut',TRUE),
		'c' => $this->input->post('c',TRUE),
	    );

            $this->Klasak_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('klasak'));
        }
    }

    public function delete($id)
    {
        $row = $this->Klasak_model->get_by_id($id);

        if ($row) {
            $this->Klasak_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('klasak'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('klasak'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('idakun', 'idakun', 'trim|required');
	$this->form_validation->set_rules('KodeBB', 'kodebb', 'trim|required');
	$this->form_validation->set_rules('KodeBP', 'kodebp', 'trim|required');
	$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('Induk', 'induk', 'trim|required');
	$this->form_validation->set_rules('Urut', 'urut', 'trim|required');
	$this->form_validation->set_rules('c', 'c', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "v02_klasak.xls";
        $judul = "v02_klasak";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Idakun");
	xlsWriteLabel($tablehead, $kolomhead++, "KodeBB");
	xlsWriteLabel($tablehead, $kolomhead++, "KodeBP");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Induk");
	xlsWriteLabel($tablehead, $kolomhead++, "Urut");
	xlsWriteLabel($tablehead, $kolomhead++, "C");

	foreach ($this->Klasak_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idakun);
	    xlsWriteLabel($tablebody, $kolombody++, $data->KodeBB);
	    xlsWriteLabel($tablebody, $kolombody++, $data->KodeBP);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nama);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Induk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Urut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->c);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=v02_klasak.doc");

        $data = array(
            'v02_klasak_data' => $this->Klasak_model->get_all(),
            'start' => 0
        );

        $this->load->view('klasak/v02_klasak_doc',$data);
    }

}

/* End of file Klasak.php */
/* Location: ./application/controllers/Klasak.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-12 18:31:08 */
/* http://harviacode.com */
