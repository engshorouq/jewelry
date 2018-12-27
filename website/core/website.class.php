<?php 
class website
{
    private $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "jewelry");
    }
    
}

?>