<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Saldoawal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) redirect('auth/login', 'refresh');
        $this->load->model('Saldoawal_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'saldoawal?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'saldoawal?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'saldoawal';
            $config['first_url'] = base_url() . 'saldoawal';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Saldoawal_model->total_rows($q);
        // $saldoawal = $this->Saldoawal_model->get_limit_data($config['per_page'], $start, $q);
        $saldoawal = $this->Saldoawal_model->getLimitData($config['per_page'], $start, $q);
        $saldoawalTotal = $this->Saldoawal_model->getTotal();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        // echo pre($config['total_rows']); die();
        if ($config['total_rows'] > 0 and $start == '') {
            // echo pre($config['total_rows']); die();
            if ($config['total_rows'] % $config['per_page'] == 0) {
                // $start_ = $config['total_rows']-$config['per_page'];
            } else {
                // $start_ = $config['total_rows']-1;
            }
            // redirect(site_url('saldoawal?start='.$start_));
        }

        $data = array(
            'saldoawal_data' => $saldoawal,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'total' => $saldoawalTotal,
            );
        // $this->load->view('saldoawal/t03_saldoawal_list', $data);
        $data['_view'] = 'saldoawal/t03_saldoawal_list';
        $data['_caption'] = 'Saldo Awal';
        $this->load->view('dashboard/_layout', $data);
    }

    public function read($id)
    {
        // $row = $this->Saldoawal_model->get_by_id($id);
        $row = $this->Saldoawal_model->getById($id);
        if ($row) {
            $data = array(
        		'idsa' => $row->idsa,
        		'idakun' => $row->idakun,
        		'Debit' => $row->Debit,
        		'Kredit' => $row->Kredit,
        		// 'created_at' => $row->created_at,
        		// 'updated_at' => $row->updated_at,
                'Kode' => $row->Kode,
                'Nama' => $row->Nama,
        	    );
            // $this->load->view('saldoawal/t03_saldoawal_read', $data);
            $data['_view'] = 'saldoawal/t03_saldoawal_read';
            $data['_caption'] = 'Saldo Awal';
            $this->load->view('dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('saldoawal'));
        }
    }

    public function create()
    {
        $this->load->model('akun/Akun_model');
        $akun = $this->Akun_model->getAllLastLevelNotExist();
        $data = array(
            'button' => 'Create',
            'action' => site_url('saldoawal/create_action'),
    	    'idsa' => set_value('idsa'),
    	    // 'idakun' => set_value('idakun'),
    	    'Debit' => set_value('Debit', 0),
    	    'Kredit' => set_value('Kredit', 0),
    	    // 'created_at' => set_value('created_at'),
    	    // 'updated_at' => set_value('updated_at'),
            'akun_data' => $akun,
            );
        // $this->load->view('saldoawal/t03_saldoawal_form', $data);
        $data['_view'] = 'saldoawal/t03_saldoawal_form';
        $data['_caption'] = 'Saldo Awal';
        $this->load->view('dashboard/_layout', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'idakun' => $this->input->post('idakun',TRUE),
        		'Debit' => $this->input->post('Debit',TRUE),
        		'Kredit' => $this->input->post('Kredit',TRUE),
        		// 'created_at' => $this->input->post('created_at',TRUE),
        		// 'updated_at' => $this->input->post('updated_at',TRUE),
        	    );

            $this->Saldoawal_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('saldo-awal'));
        }
    }

    public function update($id)
    {
        $row = $this->Saldoawal_model->get_by_id($id);

        if ($row) {
            $this->load->model('akun/Akun_model');
            $akun = $this->Akun_model->getAllLastLevel();
            $data = array(
                'button' => 'Update',
                'action' => site_url('saldoawal/update_action'),
        		'idsa' => set_value('idsa', $row->idsa),
        		'idakun' => set_value('idakun', $row->idakun),
        		'Debit' => set_value('Debit', $row->Debit),
        		'Kredit' => set_value('Kredit', $row->Kredit),
        		// 'created_at' => set_value('created_at', $row->created_at),
        		// 'updated_at' => set_value('updated_at', $row->updated_at),
                'akun_data' => $akun,
        	    );
            // $this->load->view('saldoawal/t03_saldoawal_form', $data);
            $data['_view'] = 'saldoawal/t03_saldoawal_form';
            $data['_caption'] = 'Saldo Awal';
            $this->load->view('dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('saldoawal'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idsa', TRUE));
        } else {
            $data = array(
        		'idakun' => $this->input->post('idakun',TRUE),
        		'Debit' => $this->input->post('Debit',TRUE),
        		'Kredit' => $this->input->post('Kredit',TRUE),
        		// 'created_at' => $this->input->post('created_at',TRUE),
        		// 'updated_at' => $this->input->post('updated_at',TRUE),
        	    );

            $this->Saldoawal_model->update($this->input->post('idsa', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('saldo-awal'));
        }
    }

    public function delete($id)
    {
        $row = $this->Saldoawal_model->get_by_id($id);

        if ($row) {
            $this->Saldoawal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('saldo-awal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('saldo-awal'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('idakun', 'idakun', 'trim|required');
	$this->form_validation->set_rules('Debit', 'debit', 'trim|required|numeric');
	$this->form_validation->set_rules('Kredit', 'kredit', 'trim|required|numeric');
	// $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	// $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('idsa', 'idsa', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t03_saldoawal.xls";
        $judul = "t03_saldoawal";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Debit");
    	xlsWriteLabel($tablehead, $kolomhead++, "Kredit");
    	xlsWriteLabel($tablehead, $kolomhead++, "Created At");
    	xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

    	foreach ($this->Saldoawal_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->idakun);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->Debit);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->Kredit);
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
        header("Content-Disposition: attachment;Filename=t03_saldoawal.doc");

        $data = array(
            't03_saldoawal_data' => $this->Saldoawal_model->get_all(),
            'start' => 0
        );

        $this->load->view('saldoawal/t03_saldoawal_doc',$data);
    }

}

/* End of file Saldoawal.php */
/* Location: ./application/controllers/Saldoawal.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-03 19:38:12 */
/* http://harviacode.com */
