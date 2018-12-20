<?php 
   $conn=mysqli_connect("localhost","root","","jewelry");
   $output = '';
   $text = $_POST['search'];
   $result = mysqli_query($conn,"select * from users where first_name like '%$text%' or last_name like '%$text%' or email like '%$text%' or type like '%$text%'");
   if(mysqli_num_rows($result)>0){
       while($ydata = mysqli_fetch_array($result)){
           $output .= '<tr data-id='. $ydata['id'].'>
           <td><img src="assets/img/'.$ydata['photo'].'" alt="personal photo" class="img-thumbnail rounded-circle" id="personal-photo"></td>
           <td>'.$ydata['first_name'].'</td>
           <td>'.$ydata['last_name'].'</td>
           <td>'.$ydata['email'].'</td>
           <td>'.$ydata['type'].'</td>
           <td><a href="javascript:delete_user('. $ydata['id'].');" class="btn btn-danger">delete</a></td>
           
         </tr>';
       }
       echo $output;

   }else{
       echo "Data Not Found !";
   }
    ?>