<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Akun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) redirect('auth/login', 'refresh');
        $this->load->model('Akun_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'akun/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'akun/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'akun/index.html';
            $config['first_url'] = base_url() . 'akun/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Akun_model->total_rows($q);
        // $akun = $this->Akun_model->get_limit_data($config['per_page'], $start, $q);
        $akun = $this->Akun_model->getLimitData($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'akun_data' => $akun,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            );
        // $this->load->view('akun/t02_akun_list', $data);
        $data['_view'] = 'akun/t02_akun_list';
        $data['_caption'] = 'Klasifikasi Akun';
        $this->load->view('dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->Akun_model->get_by_id($id);
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
            // $this->load->view('akun/t02_akun_read', $data);
            $data['_view'] = 'akun/t02_akun_read';
            $data['_caption'] = 'Klasifikasi Akun';
            $this->load->view('dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('akun'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('akun/create_action'),
    	    'idakun' => set_value('idakun'),
    	    'Kode' => set_value('Kode'),
    	    'Nama' => set_value('Nama'),
    	    'Induk' => set_value('Induk'),
    	    'Urut' => set_value('Urut'),
    	    // 'created_at' => set_value('created_at'),
    	    // 'updated_at' => set_value('updated_at'),
            );
        // $this->load->view('akun/t02_akun_form', $data);
        $data['_view'] = 'akun/t02_akun_form';
        $data['_caption'] = 'Klasifikasi Akun';
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
        		'Induk' => $this->input->post('Induk',TRUE),
        		'Urut' => $this->input->post('Urut',TRUE),
        		// 'created_at' => $this->input->post('created_at',TRUE),
        		// 'updated_at' => $this->input->post('updated_at',TRUE),
        	    );

            $this->Akun_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('akun'));
        }
    }

    public function update($id)
    {
        $row = $this->Akun_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('akun/update_action'),
        		'idakun' => set_value('idakun', $row->idakun),
        		'Kode' => set_value('Kode', $row->Kode),
        		'Nama' => set_value('Nama', $row->Nama),
        		'Induk' => set_value('Induk', $row->Induk),
        		'Urut' => set_value('Urut', $row->Urut),
        		// 'created_at' => set_value('created_at', $row->created_at),
        		// 'updated_at' => set_value('updated_at', $row->updated_at),
        	    );
            // $this->load->view('akun/t02_akun_form', $data);
            $data['_view'] = 'akun/t02_akun_form';
            $data['_caption'] = 'Klasifikasi Akun';
            $this->load->view('dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('akun'));
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
        		'Urut' => $this->input->post('Urut',TRUE),
                // 'created_at' => $this->input->post('created_at',TRUE),
        		// 'updated_at' => $this->input->post('updated_at',TRUE),
        	    );

            $this->Akun_model->update($this->input->post('idakun', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('akun'));
        }
    }

    public function delete($id)
    {
        $row = $this->Akun_model->get_by_id($id);

        if ($row) {
            $this->Akun_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('akun'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('akun'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('Kode', 'kode', 'trim|required');
    	$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
    	$this->form_validation->set_rules('Induk', 'induk', 'trim|required');
    	$this->form_validation->set_rules('Urut', 'urut', 'trim|required');
    	// $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
    	// $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

    	$this->form_validation->set_rules('idakun', 'idakun', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t02_akun.xls";
        $judul = "t02_akun";
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

    	foreach ($this->Akun_model->get_all() as $data) {
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
        header("Content-Disposition: attachment;Filename=t02_akun.doc");

        $data = array(
            't02_akun_data' => $this->Akun_model->get_all(),
            'start' => 0
        );

        $this->load->view('akun/t02_akun_doc',$data);
    }

}

/* End of file Akun.php */
/* Location: ./application/controllers/Akun.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-03 23:12:32 */
/* http://harviacode.com */
