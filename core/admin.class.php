<?php
class admin
{
    private $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "jewelry");
    }

    public function check_login($email, $password)
    {
        $result = mysqli_query($this->conn, "select * from admin where email='$email' and password='$password'");
        if (mysqli_num_rows($result) == 0) {
            return null;
        } else {

            $row = mysqli_fetch_array($result);
            return $row;
        }
    }
    public function admin_info($id){
        $result=mysqli_query($this->conn,"select * from admin where id=$id");
        if(mysqli_num_rows($result)>0){
            $data=array();
            while($row=mysqli_fetch_array($result)){
                $data[]=$row;
            }
        }
        return $data;
    }
    public function update_price($price_24)
    {
        $price_12 = $price_24 * 0.50;
        $price_14 = $price_24 * 0.583;
        $price_18 = $price_24 * 0.750;
        $price_21 = $price_24 * 0.875;
        $price_22 = $price_24 * 0.916;
        $dateTime = date("Y-m-d h:i:sa", time());
        mysqli_query($this->conn, "update price_gold set price_12=$price_12, price_14=$price_14, price_18=$price_18, price_21=$price_21, price_22=$price_22, price_24=$price_24, last_update='$dateTime' where id=1");
    }
    /*get commission */
    public function commission(){
        $result = mysqli_query($this->conn, "select * from commission");

        return mysqli_fetch_array($result);
    }
    /*end of function */
    public function last_update()
    {
        $result = mysqli_query($this->conn, "select * from price_gold where id=1");

        return mysqli_fetch_array($result);
    }
    public function Search_users($text)
    {
        if (empty($text)) {
            $display = mysqli_query($this->conn, "select * from users");
            $arr = array();
            if(mysqli_num_rows($display)>0){
                while ($row = mysqli_fetch_array($display)) {
                    $arr[] = $row;
                }
                return $arr;
            }else{
                return null;
            }
        } else {

        }
    }
    public function display_cat()
    {
        $result = mysqli_query($this->conn, "select * from category");
        $arr = array();
        if (mysqli_num_rows($result) == 0) {
            return null;
        } else {

            while ($row = mysqli_fetch_array($result)) {
                $arr[] = $row;
            }
        }
        return $arr;
    }
///To Display Product
    public function display_products($cat_id)
    {
        if ($cat_id == '0') {
            $result_pro = mysqli_query($this->conn, "select * from product");
        } else {
            $result_pro = mysqli_query($this->conn, "select * from product where cat_id=$cat_id");
        }
        if (mysqli_num_rows($result_pro) > 0) {
            $row = array();
            while ($row_prod = mysqli_fetch_array($result_pro)) {
                $row[] = $row_prod;
            }
            return $row;
        } else {
            return null;
        }

    }
    public function get_store_name($store_id)
    {
        $result_store = mysqli_query($this->conn, "select name from stores where id=$store_id");
        while ($name = mysqli_fetch_array($result_store)) {
            $store_name = $name['name'];
        }
        return $store_name;
    }
    public function get_price($gold_kerat)
    {
        $result_price = mysqli_query($this->conn, 'select * from price_gold');
        while ($price_data = mysqli_fetch_array($result_price)) {
            if ($gold_kerat == '24') {
                $price = $price_data['price_24'];
            } else if ($gold_kerat == '22') {
                $price = $price_data['price_22'];
            } else if ($gold_kerat == '21') {
                $price = $price_data['price_21'];
            } else if ($gold_kerat == '18') {
                $price = $price_data['price_18'];
            } else if ($gold_kerat == '14') {
                $price = $price_data['price_14'];
            } else {
                $price = $price_data['price_12'];
            }
        }
        return $price;
    }
    /*get id of s search for store name */
    public function get_store_id($store_name)
    {
        $result_store = mysqli_query($this->conn, "select id from store where name like '%$store_name%'");
        if (mysqli_num_rows($result_store) > 0) {
            $data = array();
            while ($id = mysqli_fetch_array($result_store)) {
                $data[] = $id;
            }
            return $data;
        } else {
            return null;
        }
    }
    /** functions for contact */
    public function display_contact(){
        $result=mysqli_query($this->conn,"select user_id from contact order by date desc");
        if(mysqli_num_rows($result)>0){
            $data=array();
            while($row=mysqli_fetch_array($result)){
                $data[]=$row;
            }
        }else{
            return null;
        }

        return $data;
    }

    public function users_contact($user_id){
        $result=mysqli_query($this->conn,"select * from contact where user_id=$user_id order by date desc");
        if(mysqli_num_rows($result)>0){
            $data=array();
            while($row=mysqli_fetch_array($result)){
                $data[]=$row;
            }
            return $data;
        }else{
            return null;
        }
    }
    public function user_type($type){
        $result_user=mysqli_query($this->conn,"select * from users where type='$type'");
        if(mysqli_num_rows($result_user)>0){
            $data=array();
            while($row=mysqli_fetch_array($result_user)){
                $data[]=$row;
            }
            return $data;
        }else{
            return null;
        }
        
    }
    //get the date of the admin delete the messages
    public function get_date($user_id,$type){
        $result = mysqli_query($this->conn,"SELECT date FROM delete_conversation WHERE user_id=$user_id and type='$type'");
        if(mysqli_num_rows($result)>0){
            $data=array();
            while($row = mysqli_fetch_array($result)){
                $data[]=$row;
            }
            return $data;
        }else{
            return null;
        }
    }
    
}
