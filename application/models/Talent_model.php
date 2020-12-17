<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Talent_model extends CI_Model
{
    function delete_talent($talent_id)
    {
        $hsl = $this->db->query("DELETE FROM talent where talent_id='$talent_id'");
        return $hsl;
    }

    function update_talent($talent_id, $name, $contact, $type, $address)
    {
        $hsl = $this->db->query("UPDATE talent SET talent_id='$talent_id',name='$name',contact='$contact',type='$type',address='$address',updated_at=NOW() WHERE talent_id='$talent_id'");
        return $hsl;
    }

    function talent_list()
    {
        $hsl = $this->db->query("SELECT * FROM talent");
        return $hsl;
    }

    function save_talent($name, $contact, $type, $address)
    {
        $hsl = $this->db->query("INSERT INTO talent (name,contact,type,address) VALUES ('$name', '$contact', '$type', '$address')");
        return $hsl;
    }

    function get_talent($name)
    {
        $hsl = $this->db->query("SELECT * FROM talent where name='$name'");
        return $hsl;
    }

    // public function create_code()
    // {
    //     $this->db->select('RIGHT(talent.talent_id,4) as talent_id', FALSE);
    //     $this->db->order_by('talent_id', 'DESC');
    //     $this->db->limit(1);
    //     $query = $this->db->get('talent');
    //     if ($query->num_rows() <> 0) {
    //         $data = $query->row();
    //         $talent_id = intval($data->talent_id) + 1;
    //     } else {
    //         $talent_id = 1;
    //     }
    //     $codemax = str_pad($talent_id, 4, "0", STR_PAD_LEFT);
    //     $coderesult = "TLN-1920-" . $codemax;
    //     return $coderesult;
    // }

    public function fetch_data($query)
    {
        $this->db->like('name', $query);
        $query = $this->db->get('talent');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $output[] = array(
                    'code'  => $row["talent_id"],
                    'name'  => $row["name"]
                );
            }
            echo json_encode($output);
        }
    }
}
