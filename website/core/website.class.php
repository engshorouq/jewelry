<?php 
class website
{
    private $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "jewelry");
    }
    /**Display all stores */
    public function display_store(){
        $result = mysqli_query($this->conn,"select * from stores");
        if(mysqli_num_rows($result)>0){
            $output = array();
            while($row = mysqli_fetch_array($result)){
                $output[]=$row;
            }
        }
        return $output;
    }

    /**display products base on store id */
    public function display_products($id){
        if ($id == '0') {
            $result_pro = mysqli_query($this->conn, "select * from product order by id desc");
        } else {
            $result_pro = mysqli_query($this->conn, "select * from product where store_id=$id order by id desc");
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

    /**Get Category name from the category id */
    public function get_category_name($id){
        $result = mysqli_query($this->conn,"select name from category where id=$id");
        if(mysqli_num_rows($result)>0){
            $data = array();
            while($row = mysqli_fetch_array($result)){
                $data[]=$row;
            }
        }
        return $data;
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
    public function category_names(){
        $result = mysqli_query($this->conn,"select * from category");
        if(mysqli_num_rows($result)>0){
            $data = array();
            while($row = mysqli_fetch_array($result)){
                $data[]=$row;
            }
        }
        return $data;
    }

    public function search_category_name($name){
        $result = mysqli_query($this->conn,"select * from category where name like '%$name%'");
        if(mysqli_num_rows($result)>0){
            $data = array();
            while($row = mysqli_fetch_array($result)){
                $data[]=$row;
            }
            return $data;
        }else{
            return null;
        }
        
    }

    public function display_withdraw($id){
        $result = mysqli_query($this->conn,"select * from withdraw where saller_id=$id order by id desc");
        if(mysqli_num_rows($result)>0){
            $data = array();
            while($row = mysqli_fetch_array($result)){
                $data[]=$row;
            }
            return $data;
        }else{
            return null;
        }
        
    }

//display store name based on store id
public function get_store_name($store_id)
    {
        $result_store = mysqli_query($this->conn, "select name from stores where id=$store_id");
        while ($name = mysqli_fetch_array($result_store)) {
            $store_name = $name['name'];
        }
        return $store_name;
    }
//display product based on product id
public function product_information($product_id)
    {
        $result = mysqli_query($this->conn, "select * from product where id=$product_id");
        $data=array();
        while ($row = mysqli_fetch_array($result)) {
            $data[]=$row;
        }
        return $data;
    }

    //display user information based on user id
 public function user_information($id){
        $result_user=mysqli_query($this->conn,"select * from users where id=$id");
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

    //get the date of the user delete the messages
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
    //display all products
    public function display_all_products(){
        $result = mysqli_query($this->conn,"SELECT * FROM product ORDER BY id DESC");
        if(mysqli_num_rows($result)>0){
            $data = array();
            while($row = mysqli_fetch_array($result)){
                $data[]=$row;
            }
            return $data;
        }else{
            return null;
        }
    }

    //display most popular product
    public function display_popular_products(){
        $result = mysqli_query($this->conn,"SELECT * FROM product ORDER BY number_buy DESC");
        if(mysqli_num_rows($result)>0){
            $data = array();
            while($row = mysqli_fetch_array($result)){
                $data[]=$row;
            }
            return $data;
        }else{
            return null;
        }
    }

}

?>