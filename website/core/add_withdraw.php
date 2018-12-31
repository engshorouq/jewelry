<?php 
$conn = mysqli_connect("localhost", "root", "", "jewelry");
include_once('website.class.php');
$obj = new website();
$dateTime = date("Y-m-d h:i:sa", time());
mysqli_query($conn,"INSERT withdraw (saller_id,amount,description,date) VALUES (".$_POST['saller_id'].",".$_POST['amount'].",'".$_POST['description']."','".$dateTime."') ");
$result = $obj->display_withdraw($_POST['saller_id']);
$counter = 1;
$total_withdraw = 0;
$output = '';
foreach($result as $ydata){
    $total_withdraw+=$ydata['amount'];
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
$output .= '<tr id="total">
<td>Total Withdraw</td>
<td></td>
<td>'.$total_withdraw.' $</td>
</tr>';
echo $output;


?>