<?php 
$conn = mysqli_connect("localhost", "root", "", "jewelry");
$result = mysqli_query($conn,"select * from purchase order by id");
$data = array();
while($row = mysqli_fetch_array($result)){
    $data[]=array(
        'id'=>$row['id'],
        'title'=>$row['title'],
        'start'=>$row['start_event'],
        'end'=>$row['end_event'],
    );
}
echo json_encode($data);
?>