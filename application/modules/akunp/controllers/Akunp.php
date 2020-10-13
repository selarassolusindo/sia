<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Akunp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Akunp_model');
        $this->load->library('form_validation');
        $this->load->model('akun/Akun_model');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'akunp?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'akunp?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'akunp';
            $config['first_url'] = base_url() . 'akunp';
        }

        $config['per_page'] = 10000;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Akunp_model->total_rows($q);
        $akunp = $this->Akunp_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'akunp_data' => $akunp,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            );
        $this->load->view('akunp/t04_akunp_list', $data);
    }

    public function read($id)
    {
        $row = $this->Akunp_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'idakun' => $row->idakun,
        		'Kode' => $row->Kode,
        		'Nama' => $row->Nama,
        		'Induk' => $row->Induk,
        		'Urut' => $row->Urut,
        		// 'created_at' => $row->created_at,
        		// 'updated_at' => $row->updated_at,
        	    );
            $this->load->view('akunp/t04_akunp_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('akunp'));
        }
    }

    public function create($idakun)
    {
        /**
         * cari data akun berdasarkan idakun
         */
        $row = $this->Akun_model->get_by_id($idakun);
        if ($row) {
            $data = array(
                'button' => 'Create',
                'action' => site_url('akunp/create_action'),
        	    'idakun' => set_value('idakun'),
        	    // 'Kode' => set_value('Kode'),
                'Kode' => set_value('Kode', $this->Akunp_model->getNewKode($idakun, $row->Kode)),
        	    'Nama' => set_value('Nama'),
                'Induk' => set_value('Induk', $idakun),
        	    'Urut' => set_value('Urut'),
        	    // 'created_at' => set_value('created_at'),
        	    // 'updated_at' => set_value('updated_at'),
                'KodeInduk' => $row->Kode,
                'NamaInduk' => $row->Nama,
                );
            // $this->load->view('akunp/t04_akunp_form', $data);
            $data['_view'] = 'akunp/t04_akunp_form';
            $data['_caption'] = 'Klasifikasi Akun';
            $this->load->view('dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('klasifikasi-akun'));
        }
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create($this->input->post('idakun', TRUE));
        } else {
            $data = array(
        		'Kode' => $this->input->post('Kode',TRUE),
        		'Nama' => $this->input->post('Nama',TRUE),
        		'Induk' => $this->input->post('Induk',TRUE),
                'Urut' => $this->input->post('Kode',TRUE),
        		// 'created_at' => $this->input->post('created_at',TRUE),
        		// 'updated_at' => $this->input->post('updated_at',TRUE),
        	    );

            $this->Akunp_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('klasifikasi-akun'));
        }
    }

    public function update($id)
    {
        $row = $this->Akunp_model->get_by_id($id);

        if ($row) {
            $rowInduk = $this->Akun_model->get_by_id($row->Induk);
            $data = array(
                'button' => 'Update',
                'action' => site_url('akunp/update_action'),
        		'idakun' => set_value('idakun', $row->idakun),
        		'Kode' => set_value('Kode', $row->Kode),
        		'Nama' => set_value('Nama', $row->Nama),
        		'Induk' => set_value('Induk', $row->Induk),
        		'Urut' => set_value('Urut', $row->Urut),
        		// 'created_at' => set_value('created_at', $row->created_at),
        		// 'updated_at' => set_value('updated_at', $row->updated_at),
                'KodeInduk' => $rowInduk->Kode,
                'NamaInduk' => $rowInduk->Nama,
        	    );
            // $this->load->view('akunp/t04_akunp_form', $data);
            $data['_view'] = 'akunp/t04_akunp_form';
            $data['_caption'] = 'Klasifikasi Akun';
            $this->load->view('dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('klasifikasi-akun'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idakun', TRUE));
        } else {
            $data = array(
        		'Kode' => $this->input->post('Kode',TRUE),
        		'Nama' => $this->input->post('Nama',TRUE),
        		'Induk' => $this->input->post('Induk',TRUE),
        		'Urut' => $this->input->post('Kode',TRUE),
        		// 'created_at' => $this->input->post('created_at',TRUE),
        		// 'updated_at' => $this->input->post('updated_at',TRUE),
        	    );

            $this->Akunp_model->update($this->input->post('idakun', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('klasifikasi-akun'));
        }
    }

    public function delete($id)
    {
        $row = $this->Akunp_model->get_by_id($id);

        if ($row) {
            $this->Akunp_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('klasifikasi-akun'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('klasifikasi-akun'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('Kode', 'kode', 'trim|required');
	$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('Induk', 'induk', 'trim|required');
	// $this->form_validation->set_rules('Urut', 'urut', 'trim|required');
	// $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	// $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('idakun', 'idakun', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t04_akunp.xls";
        $judul = "t04_akunp";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Induk");
    	xlsWriteLabel($tablehead, $kolomhead++, "Urut");
    	xlsWriteLabel($tablehead, $kolomhead++, "Created At");
    	xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

    	foreach ($this->Akunp_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->Kode);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->Nama);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->Induk);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->Urut);
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
        header("Content-Disposition: attachment;Filename=t04_akunp.doc");

        $data = array(
            't04_akunp_data' => $this->Akunp_model->get_all(),
            'start' => 0
            );

        $this->load->view('akunp/t04_akunp_doc',$data);
    }

}

/* End of file Akunp.php */
/* Location: ./application/controllers/Akunp.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-12 15:51:35 */
/* http://harviacode.com */
