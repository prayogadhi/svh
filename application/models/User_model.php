<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    function delete_user($id)
    {
        $hsl = $this->db->query("DELETE FROM user where id='$id'");
        return $hsl;
    }

    function update_user($user_id, $name, $email, $image, $password, $role_id)
    {
        // $user_id = $this->session->userdata('idadmin');
        $hsl = $this->db->query("UPDATE user SET name='$name',email='$email',image='$image',password='$password',updated_at=NOW() WHERE id='$user_id'");
        return $hsl;
    }

    function user_list()
    {
        $hsl = $this->db->query("SELECT id,name,username,image,role_id FROM user");
        return $hsl;
    }

    function save_user($user_id, $name, $username, $image, $password, $role_id, $is_active, $date_created)
    {
        // $user_id = $this->session->userdata('idadmin');
        $hsl = $this->db->query("INSERT INTO user (user_id,name,username,password,role_id,date_created) VALUES ('$user_id', '$name', '$username', '$password', '$role_id', '$date_created')");
        return $hsl;
    }

    function get_barang($name)
    {
        $hsl = $this->db->query("SELECT * FROM product where name='$name'");
        return $hsl;
    }

    function get_user_by_code($id)
    {
        $hsl = $this->db->query("SELECT * FROM user where id='$id'")->result();
        return $hsl;
    }

    public function create_code()
    {
        $this->db->select('RIGHT(product.product_code,4) as product_code', FALSE);
        $this->db->order_by('product_code', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('product');      //cek dulu apakah ada sudah ada id di tabel.    
        if ($query->num_rows() <> 0) {
            //jika id ternyata sudah ada.      
            $data = $query->row();
            $product_code = intval($data->product_code) + 1;
        } else {
            //jika id belum ada      
            $product_code = 1;
        }
        $codemax = str_pad($product_code, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $coderesult = "SVH-9921-" . $codemax;    // hasilnya ODJ-9921-0001 dst.
        return $coderesult;
    }

    public function fetch_data($query)
    {
        $this->db->like('name', $query);
        $query = $this->db->get('product');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $output[] = array(
                    'code'  => $row["product_code"],
                    'name'  => $row["name"]
                );
            }
            echo json_encode($output);
        }
    }
}
