<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_User extends CI_Model
{
    public function get_data()
    {
        $result = $this->db->query('SELECT * FROM tbl_login l, role_id v WHERE l.EMAIL="' . $this->session->userdata('email') . '" AND l.ID="' . $this->session->userdata('role_id') . '" AND l.ID=v.ID group by l.EMAIL')->row_array();
        return $result;
    }
    public function edit_data($nama, $email)
    {
        $this->db->query("UPDATE tbl_login SET NAME='" . $nama . "', EMAIL='" . $email . "' WHERE EMAIL='" . $this->session->userdata('email') . "'");
        return $this->db->affected_rows();
    }
    public function tambah_user($nama, $alamat, $umur, $bapak, $ibu, $nohp, $jk, $jenjang, $paket)
    {
        $this->db->query("INSERT INTO tbl_pendaftaran (ID_DAFTAR, NAMA, ALAMAT, UMUR, NAMA_BAPAK, NAMA_IBU, NO_HP, ID_JK, ID_JENJANG, ID_PAKET) VALUES ('', '" . $nama . "', '" . $alamat . "', '" . $umur . "', '" . $bapak . "', '" . $ibu . "', '" . $nohp . "', '" . $jk . "', '" . $jenjang . "', '" . $paket . "');");
        return $this->db->affected_rows();
    }

}
