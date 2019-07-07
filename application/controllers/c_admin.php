<?php
class c_admin extends CI_Controller
{
    function admin()
    {
        $data['guru'] = $this->Model_siswa->data_guru();
        $data['siswa'] = $this->Model_siswa->data_siswa();
    $this->load->view('menu_admin',$data);
    }
    public function fungsi_simpan_guru()
    {
        $data = array(
            'nama_guru' => $this->input->post('nama_guru'),
            'golongan' => $this->input->post('golongan'),
            'alamat' => $this->input->post('alamat'),
            'bidang_study' => $this->input->post('bidang_study')
        );
        $data2 = array(
        'user_name' => $this->input->post('user_name'),
        'nama'=>$this->input->post('nama_guru'),
        'level'=>"guru",
        'pass' => md5($this->input->post('pass')));

    //    print_r($data);
    //     print_r($data2);
       $this->Model_siswa->insert('guru',$data);
       $this->Model_siswa->insert('tb_user',$data2);
      
       redirect('c_admin/admin');
    }
}
?>