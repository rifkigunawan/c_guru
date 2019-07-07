<?php
class c_ortu extends CI_Controller
{
    //fungsi untuk data ortu
    public function ortu()
    {
        $data['ortu'] = $this->Model_siswa->data_ortu();
        $this->load->view('data_ortu', $data);
    }
    public function login()
    {
        $this->load->view('login');
    }
    public function fungsi_simpan()
    {
        $data = array(
            'nama_ayah' => $this->input->post('nama_ayah'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'ortu_dari' => $this->input->post('ortu_dari'),
            'alamat' => $this->input->post('alamat'),
        );
        $this->Model_siswa->simpan_ortu($data);
        redirect('c_ortu/ortu');
    }

    public function hapus_ortu($data)
    {
        $this->Model_siswa->hapus_ortu($data);
        redirect('c_ortu/ortu');
    }

    public function edit_ortu($data)
    {
        $b['ortu'] = $this->Model_siswa->edit_ortu($data);
        // print_r($a);
        $this->load->view('edit_ortu', $b);
    }
    public function fungsi_simpan_edit_ortu($data)
    {
        $simpan_edit = array(
            'nama_ayah' => $this->input->post('nama_ayah'),
            'nama_ibu' => $this->input->post('nama_ibu'),
            'ortu_dari' => $this->input->post('ortu_dari'),
            'alamat' => $this->input->post('alamat'),
        );
        // print_r($simpan_edit);
        $this->Model_siswa->simpan_edit_ortu($data, $simpan_edit);
        redirect('c_ortu/ortu');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('c_ortu/login');
    }
}
