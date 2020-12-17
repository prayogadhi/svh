<?php
class Category_model extends CI_Model
{

    function delete_categories($code)
    {
        $hsl = $this->db->query("DELETE FROM categories where categories_id='$code'");
        return $hsl;
    }

    function update_categories($code, $cat)
    {
        $hsl = $this->db->query("UPDATE categories set category='$cat' where categories_id='$code'");
        return $hsl;
    }

    function get_categories()
    {
        $hsl = $this->db->query("select * from categories order by categories_id desc");
        return $hsl;
    }

    function save_categories($cat)
    {
        $hsl = $this->db->query("INSERT INTO categories(category) VALUES ('$cat')");
        return $hsl;
    }
}
