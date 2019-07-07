<?php
class c_guru extends CI_Controller
{
    //fungsi untuk from data guru
    public function guru()
    {
        $data['guru'] = $this->Model_siswa->data_guru();
        $this->load->view('data_guru', $data);
        //print_r($data);
    }

    public function fungsi_simpan()
    {
        $data = array(
            'nama_guru' => $this->input->post('nama_guru'),
            'golongan' => $this->input->post('golongan'),
            'alamat' => $this->input->post('alamat'),
            'bidang_study' => $this->input->post('bidang_study'),
        );
        $this->Model_siswa->simpan_guru($data);
        redirect('c_guru/guru');
    }
    public function hapus_guru($data)
    {
        $this->Model_siswa->hapus_guru($data);
        redirect('c_guru/guru');
    }
    public function edit_guru($data)
    {
        $b['guru'] = $this->Model_siswa->edit_guru($data);
        // print_r($a);
        $this->load->view('edit_guru', $b);
    }
    public function fungsi_simpan_edit_guru($data)
    {
        $simpan_edit_guru = array(
            'nama_guru' => $this->input->post('nama_guru'),
            'golongan' => $this->input->post('golongan'),
            'alamat' => $this->input->post('alamat'),
            'bidang_study' => $this->input->post('bidang_study'),
        );
        //print_r($simpan_edit);
        $this->Model_siswa->simpan_edit_guru($data, $simpan_edit_guru);
        redirect('c_guru/guru');
    }
    //fungsi untuk from data keseluruah
    public function lapdel()
    {
        $data['lapdel'] = $this->Model_siswa->lapdel();
        $this->load->view('detail_laporan', $data);
        //print_r($data);
        //echo json_encode($data, JSON_PRETTY_PRINT);
    }
}
?>
