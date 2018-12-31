<?php 
$conn = mysqli_connect("localhost", "root", "", "jewelry");
$id=$_POST['id'];
$search=$_POST['search'];
include_once('website.class.php');
$obj = new website();
$output = '';
    $result = mysqli_query($conn,"SELECT * FROM withdraw WHERE saller_id=$id and amount LIKE '%$search%' or description like '%$search%' or date like '%$search%' or status like '%$search%' order by id desc");
    $data_search=array();
    while($row = mysqli_fetch_array($result)){
        $data_search[]=$row;
    }
    $counter = 1;
    foreach($data_search as $ydata){
        if($ydata['status']=='pending'){
            $output .= '<tr data-id="'.$ydata['id'].'">
            <td>'.$counter++.'<td>
            <td>'.$ydata['amount'].' $<td>
            <td>'.$ydata['description'].'<td>
            <td>'.$ydata['date'].'<td>
            <td>
                <span class="btn btn-danger">'.$ydata['status'].'</span></td>   
            </tr>';
        }else{
            $output .= '<tr data-id="'.$ydata['id'].'">
            <td>'.$counter++.'<td>
            <td>'.$ydata['amount'].' $<td>
            <td>'.$ydata['description'].'<td>
            <td>'.$ydata['date'].'<td>
            <td>
                <span class="btn btn-info">'.$ydata['status'].'</span></td>   
            </tr>';
        }
    }
    $result = $obj->display_withdraw($id);
    $total_withdraw = 0;
    foreach($result as $ydata){
        $total_withdraw+=$ydata['amount']; 
    }
    $output .= '<tr id="total">
    <td>Total Withdraw</td>
    <td></td>
    <td>'.$total_withdraw.' $</td>
    </tr>';
    echo $output;

?>