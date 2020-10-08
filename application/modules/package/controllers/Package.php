<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Package extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) redirect('auth/login', 'refresh');
        $this->load->model('Package_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'package?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'package?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'package';
            $config['first_url'] = base_url() . 'package';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Package_model->total_rows($q);
        $package = $this->Package_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'package_data' => $package,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('package/t01_package_list', $data);
        $data['_view'] = 'package/t01_package_list';
        $data['_caption'] = 'Package';
        $this->load->view('dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->Package_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'idprice' => $row->idprice,
        		'PackageName' => $row->PackageName,
        		'PackageCode' => $row->PackageCode,
        		'SN3LN' => $row->SN3LN,
        		'SN6LN' => $row->SN6LN,
        		'SNELN' => $row->SNELN,
        		'PN1LN' => $row->PN1LN,
        		'PN1DN' => $row->PN1DN,
        		'SN3C' => $row->SN3C,
        		'SN3CP' => $row->SN3CP,
        		'SN6C' => $row->SN6C,
        		'SN6CP' => $row->SN6CP,
        		'SNEC' => $row->SNEC,
        		'SNECP' => $row->SNECP,
        		'PN3C' => $row->PN3C,
        		'PN3CP' => $row->PN3CP,
        		'PN6C' => $row->PN6C,
        		'PN6CP' => $row->PN6CP,
        		'PNEC' => $row->PNEC,
        		'PNECP' => $row->PNECP,
        		// 'created_at' => $row->created_at,
        		// 'updated_at' => $row->updated_at,
        	    );
            // $this->load->view('package/t01_package_read', $data);
            $data['_view'] = 'package/t01_package_read';
            $data['_caption'] = 'Package';
            $this->load->view('dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('package'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('package/create_action'),
    	    'idprice' => set_value('idprice'),
    	    'PackageName' => set_value('PackageName'),
    	    'PackageCode' => set_value('PackageCode'),
    	    'SN3LN' => set_value('SN3LN'),
    	    'SN6LN' => set_value('SN6LN'),
    	    'SNELN' => set_value('SNELN'),
    	    'PN1LN' => set_value('PN1LN'),
    	    'PN1DN' => set_value('PN1DN'),
    	    'SN3C' => set_value('SN3C'),
    	    'SN3CP' => set_value('SN3CP'),
    	    'SN6C' => set_value('SN6C'),
    	    'SN6CP' => set_value('SN6CP'),
    	    'SNEC' => set_value('SNEC'),
    	    'SNECP' => set_value('SNECP'),
    	    'PN3C' => set_value('PN3C'),
    	    'PN3CP' => set_value('PN3CP'),
    	    'PN6C' => set_value('PN6C'),
    	    'PN6CP' => set_value('PN6CP'),
    	    'PNEC' => set_value('PNEC'),
    	    'PNECP' => set_value('PNECP'),
    	    // 'created_at' => set_value('created_at'),
    	    // 'updated_at' => set_value('updated_at'),
            );
        // $this->load->view('package/t01_package_form', $data);
        $data['_view'] = 'package/t01_package_form';
        $data['_caption'] = 'Package';
        $this->load->view('dashboard/_layout', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'PackageName' => $this->input->post('PackageName',TRUE),
        		'PackageCode' => $this->input->post('PackageCode',TRUE),
        		'SN3LN' => $this->input->post('SN3LN',TRUE),
        		'SN6LN' => $this->input->post('SN6LN',TRUE),
        		'SNELN' => $this->input->post('SNELN',TRUE),
        		'PN1LN' => $this->input->post('PN1LN',TRUE),
        		'PN1DN' => $this->input->post('PN1DN',TRUE),
        		'SN3C' => $this->input->post('SN3C',TRUE),
        		'SN3CP' => $this->input->post('SN3CP',TRUE),
        		'SN6C' => $this->input->post('SN6C',TRUE),
        		'SN6CP' => $this->input->post('SN6CP',TRUE),
        		'SNEC' => $this->input->post('SNEC',TRUE),
        		'SNECP' => $this->input->post('SNECP',TRUE),
        		'PN3C' => $this->input->post('PN3C',TRUE),
        		'PN3CP' => $this->input->post('PN3CP',TRUE),
        		'PN6C' => $this->input->post('PN6C',TRUE),
        		'PN6CP' => $this->input->post('PN6CP',TRUE),
        		'PNEC' => $this->input->post('PNEC',TRUE),
        		'PNECP' => $this->input->post('PNECP',TRUE),
        		// 'created_at' => $this->input->post('created_at',TRUE),
        		// 'updated_at' => $this->input->post('updated_at',TRUE),
        	    );

            $this->Package_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('package'));
        }
    }

    public function update($id)
    {
        $row = $this->Package_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('package/update_action'),
        		'idprice' => set_value('idprice', $row->idprice),
        		'PackageName' => set_value('PackageName', $row->PackageName),
        		'PackageCode' => set_value('PackageCode', $row->PackageCode),
        		'SN3LN' => set_value('SN3LN', $row->SN3LN),
        		'SN6LN' => set_value('SN6LN', $row->SN6LN),
        		'SNELN' => set_value('SNELN', $row->SNELN),
        		'PN1LN' => set_value('PN1LN', $row->PN1LN),
        		'PN1DN' => set_value('PN1DN', $row->PN1DN),
        		'SN3C' => set_value('SN3C', $row->SN3C),
        		'SN3CP' => set_value('SN3CP', $row->SN3CP),
        		'SN6C' => set_value('SN6C', $row->SN6C),
        		'SN6CP' => set_value('SN6CP', $row->SN6CP),
        		'SNEC' => set_value('SNEC', $row->SNEC),
        		'SNECP' => set_value('SNECP', $row->SNECP),
        		'PN3C' => set_value('PN3C', $row->PN3C),
        		'PN3CP' => set_value('PN3CP', $row->PN3CP),
        		'PN6C' => set_value('PN6C', $row->PN6C),
        		'PN6CP' => set_value('PN6CP', $row->PN6CP),
        		'PNEC' => set_value('PNEC', $row->PNEC),
        		'PNECP' => set_value('PNECP', $row->PNECP),
        		// 'created_at' => set_value('created_at', $row->created_at),
        		// 'updated_at' => set_value('updated_at', $row->updated_at),
        	    );
            // $this->load->view('package/t01_package_form', $data);
            $data['_view'] = 'package/t01_package_form';
            $data['_caption'] = 'Package';
            $this->load->view('dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('package'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idprice', TRUE));
        } else {
            $data = array(
        		'PackageName' => $this->input->post('PackageName',TRUE),
        		'PackageCode' => $this->input->post('PackageCode',TRUE),
        		'SN3LN' => $this->input->post('SN3LN',TRUE),
        		'SN6LN' => $this->input->post('SN6LN',TRUE),
        		'SNELN' => $this->input->post('SNELN',TRUE),
        		'PN1LN' => $this->input->post('PN1LN',TRUE),
        		'PN1DN' => $this->input->post('PN1DN',TRUE),
        		'SN3C' => $this->input->post('SN3C',TRUE),
        		'SN3CP' => $this->input->post('SN3CP',TRUE),
        		'SN6C' => $this->input->post('SN6C',TRUE),
        		'SN6CP' => $this->input->post('SN6CP',TRUE),
        		'SNEC' => $this->input->post('SNEC',TRUE),
        		'SNECP' => $this->input->post('SNECP',TRUE),
        		'PN3C' => $this->input->post('PN3C',TRUE),
        		'PN3CP' => $this->input->post('PN3CP',TRUE),
        		'PN6C' => $this->input->post('PN6C',TRUE),
        		'PN6CP' => $this->input->post('PN6CP',TRUE),
        		'PNEC' => $this->input->post('PNEC',TRUE),
        		'PNECP' => $this->input->post('PNECP',TRUE),
        		// 'created_at' => $this->input->post('created_at',TRUE),
        		// 'updated_at' => $this->input->post('updated_at',TRUE),
        	    );

            $this->Package_model->update($this->input->post('idprice', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('package'));
        }
    }

    public function delete($id)
    {
        $row = $this->Package_model->get_by_id($id);

        if ($row) {
            $this->Package_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('package'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('package'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('PackageName', 'packagename', 'trim|required');
    	$this->form_validation->set_rules('PackageCode', 'packagecode', 'trim|required');
    	$this->form_validation->set_rules('SN3LN', 'sn3ln', 'trim|required|numeric');
    	$this->form_validation->set_rules('SN6LN', 'sn6ln', 'trim|required|numeric');
    	$this->form_validation->set_rules('SNELN', 'sneln', 'trim|required|numeric');
    	$this->form_validation->set_rules('PN1LN', 'pn1ln', 'trim|required|numeric');
    	$this->form_validation->set_rules('PN1DN', 'pn1dn', 'trim|required|numeric');
    	$this->form_validation->set_rules('SN3C', 'sn3c', 'trim|required|numeric');
    	$this->form_validation->set_rules('SN3CP', 'sn3cp', 'trim|required|numeric');
    	$this->form_validation->set_rules('SN6C', 'sn6c', 'trim|required|numeric');
    	$this->form_validation->set_rules('SN6CP', 'sn6cp', 'trim|required|numeric');
    	$this->form_validation->set_rules('SNEC', 'snec', 'trim|required|numeric');
    	$this->form_validation->set_rules('SNECP', 'snecp', 'trim|required|numeric');
    	$this->form_validation->set_rules('PN3C', 'pn3c', 'trim|required|numeric');
    	$this->form_validation->set_rules('PN3CP', 'pn3cp', 'trim|required|numeric');
    	$this->form_validation->set_rules('PN6C', 'pn6c', 'trim|required|numeric');
    	$this->form_validation->set_rules('PN6CP', 'pn6cp', 'trim|required|numeric');
    	$this->form_validation->set_rules('PNEC', 'pnec', 'trim|required|numeric');
    	$this->form_validation->set_rules('PNECP', 'pnecp', 'trim|required|numeric');
    	// $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
    	// $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

    	$this->form_validation->set_rules('idprice', 'idprice', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t01_package.xls";
        $judul = "t01_package";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "PackageName");
    	xlsWriteLabel($tablehead, $kolomhead++, "PackageCode");
    	xlsWriteLabel($tablehead, $kolomhead++, "SN3LN");
    	xlsWriteLabel($tablehead, $kolomhead++, "SN6LN");
    	xlsWriteLabel($tablehead, $kolomhead++, "SNELN");
    	xlsWriteLabel($tablehead, $kolomhead++, "PN1LN");
    	xlsWriteLabel($tablehead, $kolomhead++, "PN1DN");
    	xlsWriteLabel($tablehead, $kolomhead++, "SN3C");
    	xlsWriteLabel($tablehead, $kolomhead++, "SN3CP");
    	xlsWriteLabel($tablehead, $kolomhead++, "SN6C");
    	xlsWriteLabel($tablehead, $kolomhead++, "SN6CP");
    	xlsWriteLabel($tablehead, $kolomhead++, "SNEC");
    	xlsWriteLabel($tablehead, $kolomhead++, "SNECP");
    	xlsWriteLabel($tablehead, $kolomhead++, "PN3C");
    	xlsWriteLabel($tablehead, $kolomhead++, "PN3CP");
    	xlsWriteLabel($tablehead, $kolomhead++, "PN6C");
    	xlsWriteLabel($tablehead, $kolomhead++, "PN6CP");
    	xlsWriteLabel($tablehead, $kolomhead++, "PNEC");
    	xlsWriteLabel($tablehead, $kolomhead++, "PNECP");
    	xlsWriteLabel($tablehead, $kolomhead++, "Created At");
    	xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

    	foreach ($this->Package_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->PackageName);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->PackageCode);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->SN3LN);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->SN6LN);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->SNELN);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->PN1LN);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->PN1DN);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->SN3C);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->SN3CP);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->SN6C);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->SN6CP);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->SNEC);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->SNECP);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->PN3C);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->PN3CP);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->PN6C);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->PN6CP);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->PNEC);
    	    xlsWriteNumber($tablebody, $kolombody++, $data->PNECP);
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
        header("Content-Disposition: attachment;Filename=t01_package.doc");

        $data = array(
            't01_package_data' => $this->Package_model->get_all(),
            'start' => 0
        );

        $this->load->view('package/t01_package_doc',$data);
    }

}

/* End of file Package.php */
/* Location: ./application/controllers/Package.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-08 05:42:04 */
/* http://harviacode.com */
