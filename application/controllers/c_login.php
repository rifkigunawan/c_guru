<?php
class c_login extends CI_Controller
{
    function login()
    {
        
        $this->load->view('login');
    }
    public function simpan_register()
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'user_name' => $this->input->post('user_name'),
            'level' => "siswa",
            'pass' => md5($this->input->post('pass')),
        );

        $this->Model_siswa->simpan_register($data);
        redirect('c_login/register');
    }
    public function register()
    {
        $this->load->view('register');
    }
    public function verifikasi_login()
    {
        $user_name = $this->input->post('user_name');
        $pass = md5($this->input->post('pass'));
        $cek = $this->Model_siswa->cek_data($user_name, $pass);
// print_r($user_name);
        //print_r($pass);
        //   if ($cek->num_rows()>0) {
        //      echo "berhasil";
        //   } else {
        //    echo "";
        //   }
        if ($cek->num_rows() > 0) {
            $data = $cek->row_array();
            print_r($data);
            $sesdata = array(
                'nama' => $data['nama'],
                'level' => $data['level'],
                "status_login" => true,
            );
            //print_r($data);}}
            $this->session->set_userdata($sesdata);
            //akses login
            if ($data['level'] === 'guru') {
                redirect('c_guru/guru');
            } elseif ($data['level'] === 'siswa') {
                redirect('c_table/siswa');
            } else {
                redirect('c_login/login');
            }
            //print_r($sesdata);
        } else {
            $this->session->set_flashdata("error", "passwor atau username yang anda masukan salah");
            redirect('c_login/login');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('c_login/login');
    }
}
?>