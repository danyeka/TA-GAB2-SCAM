<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpotongan_gaji extends CI_Model {

    function get_data($id)
    {
        $this->db->select("*");
        $this->db->from("potongan_gaji");
        if(empty($id)) $this->db->order_by("potongan", "ASC");
        else $this->db->where("id = '$id'");
        return $this->db->get()->result();
    }

    function save_data($data)
    {
      return $this->db->insert("potongan_gaji", $data);
    }

    function update_data($id, $data)
    {
      $where = array(
        'id' => $id
      );
      return $this->db->update("potongan_gaji", $data, $where);
    }

    function delete_data($id)
    {
      $this->db->where(array('id' => $id));
      return $this->db->delete("potongan_gaji");
    }
}

