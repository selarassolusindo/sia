<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'sa?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sa?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sa';
            $config['first_url'] = base_url() . 'sa';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Sa_model->total_rows($q);
        // $sa = $this->Sa_model->get_limit_data($config['per_page'], $start, $q);
        $sa = $this->Sa_model->getLimitData($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sa_data' => $sa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('sa/v03_sa_list', $data);
        $data['_view'] = 'sa/v03_sa_list';
        $data['_caption'] = 'Saldo Awal';
        $this->load->view('dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->Sa_model->get_by_id($id);
        if ($row) {
            $data = array(
    		'idsa' => $row->idsa,
    		'idakun' => $row->idakun,
    		'Debit' => $row->Debit,
    		'Kredit' => $row->Kredit,
    		'c' => $row->c,
    	    );
            $this->load->view('sa/v03_sa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sa'));
        }
    }

    public function create()
    {
        $this->load->model('klasak/Klasak_model');
        $akun = $this->Klasak_model->getAllLastLevel2();
        $data = array(
            'button' => 'Create',
            'action' => site_url('sa/create_action'),
    	    'idsa' => set_value('idsa'),
    	    'idakun' => set_value('idakun'),
    	    'Debit' => set_value('Debit'),
    	    'Kredit' => set_value('Kredit'),
    	    'c' => set_value('c'),
            'akun_data' => $akun,
            );
        // $this->load->view('sa/v03_sa_form', $data);
        $data['_view'] = 'sa/v03_sa_form';
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
        		// 'idsa' => $this->input->post('idsa',TRUE),
        		'idakun' => $this->input->post('idakun',TRUE),
        		'Debit' => $this->input->post('Debit',TRUE),
        		'Kredit' => $this->input->post('Kredit',TRUE),
        		// 'c' => $this->input->post('c',TRUE),
        	    );

            if (intval($this->input->post('idakun',TRUE)) > 1000) {
                /**
                 * jika yang diproses akun buku pembantu
                 */
                /**
                 * ekstrak komposisi idakun akun buku pembantu
                 */
                // $induk = subtr($this->input->post('idakun',TRUE), 0, 4) - 1000;
                $idakun = substr($this->input->post('idakun',TRUE), 4);
                $data['idakun'] = $idakun;
                $this->load->model('saldoawalp/Saldoawalp_model');
                $this->Saldoawalp_model->insert($data);
            } else {
                /**
                 * jika yang diproses akun buku besar
                 */
                $this->load->model('saldoawal/Saldoawal_model');
                $this->Saldoawal_model->insert($data);
            }
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('saldo-awal'));
        }
    }

    public function update($id)
    {
        $row = $this->Sa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sa/update_action'),
		'idsa' => set_value('idsa', $row->idsa),
		'idakun' => set_value('idakun', $row->idakun),
		'Debit' => set_value('Debit', $row->Debit),
		'Kredit' => set_value('Kredit', $row->Kredit),
		'c' => set_value('c', $row->c),
	    );
            $this->load->view('sa/v03_sa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sa'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'idsa' => $this->input->post('idsa',TRUE),
		'idakun' => $this->input->post('idakun',TRUE),
		'Debit' => $this->input->post('Debit',TRUE),
		'Kredit' => $this->input->post('Kredit',TRUE),
		'c' => $this->input->post('c',TRUE),
	    );

            $this->Sa_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sa'));
        }
    }

    public function delete($id)
    {
        $row = $this->Sa_model->get_by_id($id);

        if ($row) {
            $this->Sa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sa'));
        }
    }

    public function _rules()
    {
	// $this->form_validation->set_rules('idsa', 'idsa', 'trim|required');
	$this->form_validation->set_rules('idakun', 'idakun', 'trim|required');
	$this->form_validation->set_rules('Debit', 'debit', 'trim|required|numeric');
	$this->form_validation->set_rules('Kredit', 'kredit', 'trim|required|numeric');
	// $this->form_validation->set_rules('c', 'c', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "v03_sa.xls";
        $judul = "v03_sa";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Idsa");
	xlsWriteLabel($tablehead, $kolomhead++, "Idakun");
	xlsWriteLabel($tablehead, $kolomhead++, "Debit");
	xlsWriteLabel($tablehead, $kolomhead++, "Kredit");
	xlsWriteLabel($tablehead, $kolomhead++, "C");

	foreach ($this->Sa_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->idsa);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idakun);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Debit);
	    xlsWriteNumber($tablebody, $kolombody++, $data->Kredit);
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
        header("Content-Disposition: attachment;Filename=v03_sa.doc");

        $data = array(
            'v03_sa_data' => $this->Sa_model->get_all(),
            'start' => 0
        );

        $this->load->view('sa/v03_sa_doc',$data);
    }

}

/* End of file Sa.php */
/* Location: ./application/controllers/Sa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-13 11:22:02 */
/* http://harviacode.com */
