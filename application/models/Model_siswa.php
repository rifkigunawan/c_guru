<?php
class Model_siswa extends CI_Model
{
	function data_siswa()
	{
		return $this->db->get('siswa')->result();
    }
    function simpan_siswa($data)
    {
    	$this->db->insert('siswa',$data);
    }
    function hapus($data)
    {
    	$this->db->where('id',$data);
    	$this->db->delete('siswa');
    }
    function edit_siswa($data)
    {
    	$this->db->where('id',$data);
    	return $this->db->get('siswa')->result();
    }
    function simpan_edit($data,$simpan_edit)
    {
    	$this->db->where('id',$data);
    	$this->db->update('siswa',$simpan_edit);
    }
    function data_guru()
    {
      return $this->db->get('guru')->result();
      }
      function simpan_guru($data)
      {
        $this->db->insert('guru',$data);
      }
      function hapus_guru($data)
      {
        $this->db->where('id_guru',$data);
        $this->db->delete('guru');
      }
      function edit_guru($data)
      {
        $this->db->where('id_guru',$data);
        return $this->db->get('guru')->result();
      }
      function simpan_edit_guru($data,$simpan_edit_guru)
      {
        $this->db->where('id_guru',$data);
        $this->db->update('guru',$simpan_edit_guru);
      }
          function data_ortu()
      {
        return $this->db->get('ortu')->result();
        }
        function simpan_ortu($data)
        {
          $this->db->insert('ortu',$data);
        }
        function hapus_ortu($data)
        {
          $this->db->where('id',$data);
          $this->db->delete('ortu');
        }
        function edit_ortu($data)
        {
          $this->db->where('id',$data);
          return $this->db->get('ortu')->result();
        }
        function simpan_edit_ortu($data,$simpan_edit_ortu)
        {
          $this->db->where('id',$data);
          $this->db->update('ortu',$simpan_edit_ortu);
        }
        function lapdel()
        {
          $this->db->select ('*');
          $this->db->from('siswa');
          $this->db->from('guru');
          $this->db->from('ortu');
          $this->db->where('guru.id_guru=siswa.id');
           $this->db->where('ortu.id=siswa.id');
          return $this->db->get()->result();
          
        }
        function register()
        {
           return $this->db->get('siswa')->result();
        }
        function simpan_register($data)
        {
           $this->db->insert('tb_user',$data);
        }
        function cek_data($user_name,$pass)
        {
          $this->db->where('user_name',$user_name);
          $this->db->where('pass',$pass);
          return $this->db->get('tb_user');
        }
        function insert($table,$data)
        {
          $this->db->insert($table,$data);
          
        }
}
?>