<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_tugas');
    }

    public function index()
    {
        $this->form_validation->set_rules('nama', 'Nama Pembeli', 'required', ['required' => 'Nama Pembeli harus di isi']);

        $this->form_validation->set_rules('nhp', 'No Hp', 'required', ['required' => 'No Hp harus di isi']);

        if ($this->form_validation->run() == false)
        {
            $data['merk'] = ['Nike', 'Adidas', 'Kickers', 'Eiger', 'Bucherri'];
        
            $this->load->view('v_input', $data);
        }
        else
        {
            $data =
            [
                'nama' => $this->input->post('nama'),
                'nhp' => $this->input->post('nhp'),
                'merk' => $this->input->post('merk'),
                'ukuran' => $this->input->post('ukuran'),
                'harga' => $this->Model_tugas->proses( $this->input->post('merk'))
            ];
        
        $this->load->view('v_output', $data);
        }
    }
}