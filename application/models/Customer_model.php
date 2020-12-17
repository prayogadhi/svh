<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_model extends CI_Model
{
    function delete_customer($cust_id)
    {
        $hsl = $this->db->query("DELETE FROM customer where cust_id='$cust_id'");
        return $hsl;
    }

    function update_customer($cust_id, $name, $phone, $email, $address)
    {
        $hsl = $this->db->query("UPDATE customer SET cust_id='$cust_id',cust_name='$name',cust_phone='$phone',cust_email='$email',cust_address='$address',updated_at=NOW() WHERE cust_id='$cust_id'");
        return $hsl;
    }

    function customer_list()
    {
        $hsl = $this->db->query("SELECT * FROM customer");
        return $hsl;
    }

    function save_customer($name, $phone, $email, $address)
    {
        $hsl = $this->db->query("INSERT INTO customer (cust_name,cust_phone,cust_email,cust_address) VALUES ('$name', '$phone', '$email', '$address')");
        return $hsl;
    }

    function get_customer($cust_id)
    {
        $hsl = $this->db->query("SELECT * FROM customer where cust_id='$cust_id'");
        return $hsl;
    }

    function get_customer_by_name($cust_name)
    {
        $sql = "SELECT * FROM customer where cust_name ='$cust_name'";
        $query = $this->db->query($sql)->result();
		return $query;
    
    }

    

    // public function create_code()
    // {
    //     $this->db->select('RIGHT(customer.cust_id,4) as cust_id', FALSE);
    //     $this->db->order_by('cust_id', 'DESC');
    //     $this->db->limit(1);
    //     $query = $this->db->get('customer');   
    //     if ($query->num_rows() <> 0) {    
    //         $data = $query->row();
    //         $cust_id = intval($data->cust_id) + 1;
    //     } else {
    //         $cust_id = 1;
    //     }
    //     $codemax = str_pad($cust_id, 4, "0", STR_PAD_LEFT);
    //     $coderesult = "SVH-9921-" . $codemax;
    //     return $coderesult;
    // }

    public function fetch_data($query)
    {
        $this->db->like('cust_name', $query);
        $query = $this->db->get('customer');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $output[] = array(
                    'code'  => $row["cust_id"],
                    'cust_name'  => $row["cust_name"]
                );
            }
            echo json_encode($output);
        }
    }
}
