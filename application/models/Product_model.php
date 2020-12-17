<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    function delete_product($product_code)
    {
        $hsl = $this->db->query("DELETE FROM product where product_code='$product_code'");
        return $hsl;
    }

    function update_product($product_code, $name, $category, $price, $stock1, $stock2, $stock3)
    {
        // $user_id = $this->session->userdata('idadmin');
        $hsl = $this->db->query("UPDATE product SET name='$name',product_categories_id='$category',price='$price',stock1='$stock1',stock2='$stock2',stock3='$stock3',updated_at=NOW() WHERE product_code='$product_code'");
        return $hsl;
    }

    function tampil_barang()
    {
        $hsl = $this->db->query("SELECT product_code,name,price,product_categories_id,category,stock1,stock2,stock3,image FROM product JOIN categories ON product_categories_id=categories_id");
        return $hsl;
    }

    function save_product($product_code, $name, $category, $price, $stock1, $stock2, $stock3, $image)
    {
        // $user_id = $this->session->userdata('idadmin');
        $hsl = $this->db->query("INSERT INTO product (product_code,name,product_categories_id,price,stock1,stock2,stock3,image) VALUES ('$product_code', '$name', '$category', '$price', '$stock1', '$stock2', '$stock3', '$image')");
        return $hsl;
    }

    function get_barang($name)
    {
        $hsl = $this->db->query("SELECT * FROM product where name='$name'");
        return $hsl;
    }

    function get_barang_by_code($product_code)
    {
        $hsl = $this->db->query("SELECT * FROM product where product_code='$product_code'")->result();
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
