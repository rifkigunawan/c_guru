<?php
class c_table extends CI_Controller
{
    //fungsi untuk data siswa
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status_login') !== true) {
            $this->session->set_flashdata('error', 'maaf hak akses anda di tolak');
            redirect('c_ortu/login');
        }
    }
    public function test()
    {
        echo $this->session->userdata('nama');

    }

    public function siswa()
    {
        $data['siswa'] = $this->Model_siswa->data_siswa();
        $this->load->view('data_siswa', $data);
    }

    public function fungsi_simpan()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'jurusan' => $this->input->post('jurusan'),
        );
        $this->Model_siswa->simpan_siswa($data);
        redirect('c_table/siswa');
    }

    public function hapus($data)
    {
        $this->Model_siswa->hapus($data);
        redirect('c_table/siswa');
    }

    public function edit_siswa($data)
    {
        $b['siswa'] = $this->Model_siswa->edit_siswa($data);
        // print_r($a);
        $this->load->view('edit_siswa', $b);
    }
    public function fungsi_simpan_edit($data)
    {
        $simpan_edit = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'jurusan' => $this->input->post('jurusan'),
        );
        //print_r($simpan_edit);
        $this->Model_siswa->simpan_edit($data, $simpan_edit);
        redirect('c_table/siswa');
    }

   

}
?>
