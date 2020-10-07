<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tamu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) redirect('auth/login', 'refresh');
        $this->load->model('Tamu_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'tamu/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tamu/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tamu/index.html';
            $config['first_url'] = base_url() . 'tamu/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Tamu_model->total_rows($q);
        $tamu = $this->Tamu_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tamu_data' => $tamu,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('tamu/t02_tamu_list', $data);
        $data['_view'] = 'tamu/t02_tamu_list';
        $data['_caption'] = 'Data Tamu';
        $this->load->view('dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->Tamu_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idtamu' => $row->idtamu,
		'TripNo' => $row->TripNo,
		'TripTgl' => $row->TripTgl,
		'Nama' => $row->Nama,
		'MFC' => $row->MFC,
		'Country' => $row->Country,
		'PackageNight' => $row->PackageNight,
		'PackageType' => $row->PackageType,
		'CheckIn' => $row->CheckIn,
		'CheckOut' => $row->CheckOut,
		'Agent' => $row->Agent,
		'Status' => $row->Status,
		'DaysStay' => $row->DaysStay,
		'Price' => $row->Price,
		'created_at' => $row->created_at,
		'updated_at' => $row->updated_at,
	    );
            $this->load->view('tamu/t02_tamu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tamu'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tamu/create_action'),
	    'idtamu' => set_value('idtamu'),
	    'TripNo' => set_value('TripNo'),
	    'TripTgl' => set_value('TripTgl'),
	    'Nama' => set_value('Nama'),
	    'MFC' => set_value('MFC'),
	    'Country' => set_value('Country'),
	    'PackageNight' => set_value('PackageNight'),
	    'PackageType' => set_value('PackageType'),
	    'CheckIn' => set_value('CheckIn'),
	    'CheckOut' => set_value('CheckOut'),
	    'Agent' => set_value('Agent'),
	    'Status' => set_value('Status'),
	    'DaysStay' => set_value('DaysStay'),
	    'Price' => set_value('Price'),
	    'created_at' => set_value('created_at'),
	    'updated_at' => set_value('updated_at'),
	);
        $this->load->view('tamu/t02_tamu_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'TripNo' => $this->input->post('TripNo',TRUE),
		'TripTgl' => $this->input->post('TripTgl',TRUE),
		'Nama' => $this->input->post('Nama',TRUE),
		'MFC' => $this->input->post('MFC',TRUE),
		'Country' => $this->input->post('Country',TRUE),
		'PackageNight' => $this->input->post('PackageNight',TRUE),
		'PackageType' => $this->input->post('PackageType',TRUE),
		'CheckIn' => $this->input->post('CheckIn',TRUE),
		'CheckOut' => $this->input->post('CheckOut',TRUE),
		'Agent' => $this->input->post('Agent',TRUE),
		'Status' => $this->input->post('Status',TRUE),
		'DaysStay' => $this->input->post('DaysStay',TRUE),
		'Price' => $this->input->post('Price',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Tamu_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tamu'));
        }
    }

    public function update($id)
    {
        $row = $this->Tamu_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tamu/update_action'),
		'idtamu' => set_value('idtamu', $row->idtamu),
		'TripNo' => set_value('TripNo', $row->TripNo),
		'TripTgl' => set_value('TripTgl', $row->TripTgl),
		'Nama' => set_value('Nama', $row->Nama),
		'MFC' => set_value('MFC', $row->MFC),
		'Country' => set_value('Country', $row->Country),
		'PackageNight' => set_value('PackageNight', $row->PackageNight),
		'PackageType' => set_value('PackageType', $row->PackageType),
		'CheckIn' => set_value('CheckIn', $row->CheckIn),
		'CheckOut' => set_value('CheckOut', $row->CheckOut),
		'Agent' => set_value('Agent', $row->Agent),
		'Status' => set_value('Status', $row->Status),
		'DaysStay' => set_value('DaysStay', $row->DaysStay),
		'Price' => set_value('Price', $row->Price),
		'created_at' => set_value('created_at', $row->created_at),
		'updated_at' => set_value('updated_at', $row->updated_at),
	    );
            $this->load->view('tamu/t02_tamu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tamu'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idtamu', TRUE));
        } else {
            $data = array(
		'TripNo' => $this->input->post('TripNo',TRUE),
		'TripTgl' => $this->input->post('TripTgl',TRUE),
		'Nama' => $this->input->post('Nama',TRUE),
		'MFC' => $this->input->post('MFC',TRUE),
		'Country' => $this->input->post('Country',TRUE),
		'PackageNight' => $this->input->post('PackageNight',TRUE),
		'PackageType' => $this->input->post('PackageType',TRUE),
		'CheckIn' => $this->input->post('CheckIn',TRUE),
		'CheckOut' => $this->input->post('CheckOut',TRUE),
		'Agent' => $this->input->post('Agent',TRUE),
		'Status' => $this->input->post('Status',TRUE),
		'DaysStay' => $this->input->post('DaysStay',TRUE),
		'Price' => $this->input->post('Price',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->Tamu_model->update($this->input->post('idtamu', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tamu'));
        }
    }

    public function delete($id)
    {
        $row = $this->Tamu_model->get_by_id($id);

        if ($row) {
            $this->Tamu_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tamu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tamu'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('TripNo', 'tripno', 'trim|required');
	$this->form_validation->set_rules('TripTgl', 'triptgl', 'trim|required');
	$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('MFC', 'mfc', 'trim|required');
	$this->form_validation->set_rules('Country', 'country', 'trim|required');
	$this->form_validation->set_rules('PackageNight', 'packagenight', 'trim|required');
	$this->form_validation->set_rules('PackageType', 'packagetype', 'trim|required');
	$this->form_validation->set_rules('CheckIn', 'checkin', 'trim|required');
	$this->form_validation->set_rules('CheckOut', 'checkout', 'trim|required');
	$this->form_validation->set_rules('Agent', 'agent', 'trim|required');
	$this->form_validation->set_rules('Status', 'status', 'trim|required');
	$this->form_validation->set_rules('DaysStay', 'daysstay', 'trim|required');
	$this->form_validation->set_rules('Price', 'price', 'trim|required|numeric');
	$this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	$this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('idtamu', 'idtamu', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t02_tamu.xls";
        $judul = "t02_tamu";
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
	xlsWriteLabel($tablehead, $kolomhead++, "TripNo");
	xlsWriteLabel($tablehead, $kolomhead++, "TripTgl");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "MFC");
	xlsWriteLabel($tablehead, $kolomhead++, "Country");
	xlsWriteLabel($tablehead, $kolomhead++, "PackageNight");
	xlsWriteLabel($tablehead, $kolomhead++, "PackageType");
	xlsWriteLabel($tablehead, $kolomhead++, "CheckIn");
	xlsWriteLabel($tablehead, $kolomhead++, "CheckOut");
	xlsWriteLabel($tablehead, $kolomhead++, "Agent");
	xlsWriteLabel($tablehead, $kolomhead++, "Status");
	xlsWriteLabel($tablehead, $kolomhead++, "DaysStay");
	xlsWriteLabel($tablehead, $kolomhead++, "Price");
	xlsWriteLabel($tablehead, $kolomhead++, "Created At");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

	foreach ($this->Tamu_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TripNo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TripTgl);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->MFC);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Country);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PackageNight);
	    xlsWriteLabel($tablebody, $kolombody++, $data->PackageType);
	    xlsWriteLabel($tablebody, $kolombody++, $data->CheckIn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->CheckOut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Agent);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->DaysStay);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Price);
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
        header("Content-Disposition: attachment;Filename=t02_tamu.doc");

        $data = array(
            't02_tamu_data' => $this->Tamu_model->get_all(),
            'start' => 0
        );

        $this->load->view('tamu/t02_tamu_doc',$data);
    }

}

/* End of file Tamu.php */
/* Location: ./application/controllers/Tamu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-08 05:41:42 */
/* http://harviacode.com */
