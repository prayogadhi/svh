<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales_model extends CI_Model
{
    function simpan_penjualan($transaction_id,$order_date,$order_from,$transaction_cust_id, $total, $shipping_charges, $grand_total)
    {
        // $idadmin = $this->session->userdata('idadmin');
        $this->db->query("INSERT INTO sales (transaction_id,order_date,order_from,transaction_cust_id,total,shipping_charges,grand_total) VALUES ('$transaction_id', '$order_date','$order_from',$transaction_cust_id, '$total', '$shipping_charges', '$grand_total')");
        foreach ($this->cart->contents() as $item) {
            $data = array(
                'sales_transaction_id'  =>  $transaction_id,
                'sales_product_code'    =>  $item['product_code'],
                'sales_stock_from'      =>  $item['stock_order'],
                'sales_name'            =>  $item['name'],
                'sales_price'           =>  $item['amount'],
                'sales_qty'             =>  $item['qty'],
                'sales_discount'        =>  $item['disc'],
                'sales_total'           =>  $item['subtotal']
            );
            $this->db->insert('sales_details', $data);
            if ($item['stock_order'] == 'WhatsApp') {
                # code...
                $this->db->query("update product set stock1=stock1-'$item[qty]' where product_code='$item[product_code]'");
            }elseif ($item['stock_order'] == 'Shopee') {
                # code...
                $this->db->query("update product set stock2=stock2-'$item[qty]' where product_code='$item[product_code]'");
            }elseif ($item['stock_order'] == 'Websites') {
                # code...
                $this->db->query("update product set stock3=stock3-'$item[qty]' where product_code='$item[product_code]'");
            }
            
        }
        return true;
    }

    function update_status_sales($status, $id)
    {
        // $user_id = $this->session->userdata('idadmin');
        $hsl = $this->db->query('UPDATE sales SET STATUS = "'.$status.'" WHERE transaction_id = "'.$id.'"');
        return $hsl;
    }

    function tampil_sales()
    {
        $hsl = $this->db->query("SELECT * FROM sales");
        return $hsl;
    }

    // Procedure
	public function get_sales()
	{

		$data = $this->db->query("CALL get_sales_list");
       	mysqli_next_result($this->db->conn_id);
     	$result = $data->result();

		return $result;
     
    }
    
    public function get_sales_by_id($transaction_id)
    {
        $hsl = $this->db->query("SELECT * FROM sales where transaction_id='$transaction_id'")->result();
        return $hsl;
    }

    function get_transaction_id()
    {
        $this->db->select('RIGHT(sales.transaction_id,4) as transaction_id', FALSE);
        $this->db->order_by('transaction_id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('sales');      //cek dulu apakah ada sudah ada id di tabel.    
        if ($query->num_rows() <> 0) {
            //jika id ternyata sudah ada.      
            $data = $query->row();
            $transaction_id = intval($data->transaction_id) + 1;
        } else {
            //jika id belum ada      
            $transaction_id = 1;
        }
        $codemax = str_pad($transaction_id, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $d = date('dm');
        $coderesult = "CART-" . $d . "-" . $codemax;    // hasilnya ODJ-9921-0001 dst.
        return $coderesult;
    }

    public function array_from_post($fields){
		$data = array();
		foreach ($fields as $field) {
			$data[$field] = $this->input->post($field);
		}
		return $data;
	}

    // function cetak_faktur()
    // {
    //     $nofak = $this->session->userdata('nofak');
    //     $hsl = $this->db->query("SELECT jual_nofak,DATE_FORMAT(jual_tanggal,'%d/%m/%Y %H:%i:%s') AS jual_tanggal,jual_total,jual_jml_uang,jual_kembalian,jual_keterangan,d_jual_barang_nama,d_jual_barang_satuan,d_jual_barang_harjul,d_jual_qty,d_jual_diskon,d_jual_total FROM tbl_jual JOIN tbl_detail_jual ON jual_nofak=d_jual_nofak WHERE jual_nofak='$nofak'");
    //     return $hsl;
    // }
}
