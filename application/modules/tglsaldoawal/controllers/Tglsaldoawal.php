<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Tglsaldoawal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login', 'refresh');
        }
        $this->load->model('Tglsaldoawal_model');
        $this->load->library('form_validation');
    }

    public $buttonNext;

    public function index()
    {
        $q = urldecode($this->input->get('q', true));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'tglsaldoawal/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tglsaldoawal/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tglsaldoawal/index.html';
            $config['first_url'] = base_url() . 'tglsaldoawal/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = true;
        $config['total_rows'] = $this->Tglsaldoawal_model->total_rows($q);
        $tglsaldoawal = $this->Tglsaldoawal_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tglsaldoawal_data' => $tglsaldoawal,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            );
        // $this->load->view('tglsaldoawal/t99_tglsaldoawal_list', $data);
        $data['_view'] = ($this->buttonNext == 1 ? 'tglsaldoawal/t99_tglsaldoawal_list_next' : 'tglsaldoawal/t99_tglsaldoawal_list');
        $data['_caption'] = 'Tgl. Input Saldo Awal';
        $this->load->view('dashboard/_layout', $data);
    }

    public function read($id)
    {
        $row = $this->Tglsaldoawal_model->get_by_id($id);
        if ($row) {
            $data = array(
                'idtgl' => $row->idtgl,
                'Tanggal' => $row->Tanggal,
                // 'created_at' => $row->created_at,
                // 'updated_at' => $row->updated_at,
                );
            $this->load->view('tglsaldoawal/t99_tglsaldoawal_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tglsaldoawal'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tglsaldoawal/create_action'),
            'idtgl' => set_value('idtgl'),
            'Tanggal' => set_value('Tanggal'),
            // 'created_at' => set_value('created_at'),
            // 'updated_at' => set_value('updated_at'),
            );
        // $this->load->view('tglsaldoawal/t99_tglsaldoawal_form', $data);
        $data['_view'] = 'tglsaldoawal/t99_tglsaldoawal_form';
        $data['_caption'] = 'Tgl. Input Saldo Awal';
        $this->load->view('dashboard/_layout', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = array(
                'Tanggal' => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('Tanggal', true)))),
                // 'updated_at' => $this->input->post('updated_at', true),
                // 'created_at' => $this->input->post('created_at', true),
                );
            $this->Tglsaldoawal_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tglsaldoawal'));
        }
    }

    public function update($id)
    {
        $row = $this->Tglsaldoawal_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tglsaldoawal/update_action'),
                'idtgl' => set_value('idtgl', $row->idtgl),
                'Tanggal' => set_value('Tanggal', date_format(date_create($row->Tanggal), 'd/m/Y')),
                // 'created_at' => set_value('created_at', $row->created_at),
                // 'updated_at' => set_value('updated_at', $row->updated_at),
                );
            // $this->load->view('tglsaldoawal/t99_tglsaldoawal_form', $data);
            $data['_view'] = 'tglsaldoawal/t99_tglsaldoawal_form';
            $data['_caption'] = 'Tgl. Input Saldo Awal';
            $this->load->view('dashboard/_layout', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tglsaldoawal'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->update($this->input->post('idtgl', true));
        } else {
            $data = array(
                // 'Tanggal' => $this->input->post('Tanggal', true),
                'Tanggal' => date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('Tanggal', true)))),
                // 'created_at' => $this->input->post('created_at', true),
                // 'updated_at' => $this->input->post('updated_at', true),
                );

            $this->Tglsaldoawal_model->update($this->input->post('idtgl', true), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tglsaldoawal'));
        }
    }

    public function delete($id)
    {
        $row = $this->Tglsaldoawal_model->get_by_id($id);

        if ($row) {
            $this->Tglsaldoawal_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tglsaldoawal'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tglsaldoawal'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('Tanggal', 'tanggal', 'trim|required');
        // $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
        // $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

        $this->form_validation->set_rules('idtgl', 'idtgl', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function withNext()
    {
        $this->buttonNext = 1;
        $this->index();
    }
}

/* End of file Tglsaldoawal.php */
/* Location: ./application/controllers/Tglsaldoawal.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-01 20:05:57 */
/* http://harviacode.com */
