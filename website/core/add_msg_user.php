<?php 
include_once("website.class.php");
$obj = new website();
$user_id=$_POST['user_id'];
$conn = mysqli_connect("localhost", "root", "", "jewelry");
$date_delete = $obj->get_date($user_id,'request');
$output = '';

//$result_admin = mysqli_query($conn, "select * from replay where user_id = $user_id");
if(!empty($_FILES["file"]["type"])){
    $ext=pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
    $new_name_image=uniqid().date("dmyish").".".$ext;
    $valid_extensions = array("jpeg", "jpg", "png");
    if((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && in_array($ext, $valid_extensions)){
    
        move_uploaded_file($_FILES['file']['tmp_name'],"../../assets/conversation_img/".$new_name_image);
    }
    $dateTime = date("Y-m-d h:i:sa", time());
    $user_id=$_POST['user_id'];
    mysqli_query($conn,'INSERT INTO contact (user_id,img,date) VALUES ('.$user_id.',"'.$new_name_image.'","'.$dateTime.'")');
    $result_user = mysqli_query($conn, "select * from contact where user_id = $user_id order by date");
    $result_admin = mysqli_query($conn, "select * from replay where user_id = $user_id");
    mysqli_query($conn, "update replay set status='read' where user_id=$user_id");
    if (mysqli_num_rows($result_user) > 0 || mysqli_num_rows($result_admin) > 0) {
        /*if there is msg from the admin */
            $udata = array();
            $adata = array();
            while ($row_user = mysqli_fetch_array($result_user)) {
                $udata[] = $row_user;
            }
            while ($row_admin = mysqli_fetch_array($result_admin)) {
                $adata[] = $row_admin;
            }
            $merge = array_merge($udata, $adata);
            $date = array();
            foreach ($merge as $key => $row) {
                $date[$key] = $row['date'];
            }
            array_multisort($date, SORT_ASC, $merge);
            //display the array after sort it
            //if there is any delete messages
            if($date_delete==null){
                foreach($merge as $data){
                        if($data['type']=='request'){
                            if ($data['img'] != null) {
                                $output .= '<div class="content_msg_user" style="color:white;background:#3e98f8;" title="' . $data['date'] . '"><img src="../assets/conversation_img/' . $data['img'] . '" alt="image" class="img-thumbnail" style="width: 100%;height: 180px;"></div>';
                                }
                                if($data['msg']!=null)
                                $output .= '<div class="row msg-row"><div class="content_msg_user" style="color:white;background:#3e98f8;" title="' . $data['date'] . '">' . $data['msg'] . '</div></div>';
                                
                                
                        }else{
                            if ($data['img'] != null) {
                                $output .= '<div class="content_msg_admin" style="color:black;background:white;" title="' . $data['date'] . '"><img src="../assets/conversation_img/' . $data['img'] . '" alt="image" class="img-thumbnail" style="width: 100%;height: 180px;"></div>';
                                }
                                if($data['msg']!=null)
                                $output .= '<div class="row msg-row"><div class="content_msg_admin" style="color:black;background:white;" title="' . $data['date'] . '">' . $data['msg'] . '</div></div>';
                                
                        } 
                }
                echo $output;
            }else{
                foreach($merge as $data){
                    if($date_delete[0]['date']<$data['date']){
                        

                        if($data['type']=='request'){
                            if ($data['img'] != null) {
                                $output .= '<div class="content_msg_user" style="color:white;background:#3e98f8;" title="' . $data['date'] . '"><img src="../assets/conversation_img/' . $data['img'] . '" alt="image" class="img-thumbnail" style="width: 100%;height: 180px;"></div>';
                                }
                                if($data['msg']!=null)
                                $output .= '<div class="row msg-row"><div class="content_msg_user" style="color:white;background:#3e98f8;" title="' . $data['date'] . '">' . $data['msg'] . '</div></div>';
                                
                                
                        }else{
                            if ($data['img'] != null) {
                                $output .= '<div class="content_msg_admin" style="color:black;background:white;" title="' . $data['date'] . '"><img src="../assets/conversation_img/' . $data['img'] . '" alt="image" class="img-thumbnail" style="width: 100%;height: 180px;"></div>';
                                }
                                if($data['msg']!=null)
                                $output .= '<div class="row msg-row"><div class="content_msg_admin" style="color:black;background:white;" title="' . $data['date'] . '">' . $data['msg'] . '</div></div>';
                                
                        }
                     }   
                        
                }
                echo $output;
            }
    }  
}
if($_POST['flag']==1 and $_POST['text_msg']!=''){
    $dateTime = date("Y-m-d h:i:sa", time());
    $user_id=$_POST['user_id'];
    mysqli_query($conn,'INSERT INTO contact (user_id,msg,date) VALUES ('.$user_id.',"'.$_POST['text_msg'].'","'.$dateTime.'")');
    $result_user = mysqli_query($conn, "select * from contact where user_id = $user_id order by date");
    $result_admin = mysqli_query($conn, "select * from replay where user_id = $user_id");
    mysqli_query($conn, "update replay set status='read' where user_id=$user_id");
    if (mysqli_num_rows($result_user) > 0 || mysqli_num_rows($result_admin) > 0) {
        /*if there is msg from the admin */
            $udata = array();
            $adata = array();
            while ($row_user = mysqli_fetch_array($result_user)) {
                $udata[] = $row_user;
            }
            while ($row_admin = mysqli_fetch_array($result_admin)) {
                $adata[] = $row_admin;
            }
            $merge = array_merge($udata, $adata);
            $date = array();
            foreach ($merge as $key => $row) {
                $date[$key] = $row['date'];
            }
            array_multisort($date, SORT_ASC, $merge);
            //display the array after sort it
            //if there is any delete messages
            if($date_delete==null){
                foreach($merge as $data){
                        if($data['type']=='request'){
                            if ($data['img'] != null) {
                                $output .= '<div class="content_msg_user" style="color:white;background:#3e98f8;" title="' . $data['date'] . '"><img src="../assets/conversation_img/' . $data['img'] . '" alt="image" class="img-thumbnail" style="width: 100%;height: 180px;"></div>';
                                }
                                if($data['msg']!=null)
                                $output .= '<div class="row msg-row"><div class="content_msg_user" style="color:white;background:#3e98f8;" title="' . $data['date'] . '">' . $data['msg'] . '</div></div>';
                                
                                
                        }else{
                            if ($data['img'] != null) {
                                $output .= '<div class="content_msg_admin" style="color:black;background:white;" title="' . $data['date'] . '"><img src="../assets/conversation_img/' . $data['img'] . '" alt="image" class="img-thumbnail" style="width: 100%;height: 180px;"></div>';
                                }
                                if($data['msg']!=null)
                                $output .= '<div class="row msg-row"><div class="content_msg_admin" style="color:black;background:white;" title="' . $data['date'] . '">' . $data['msg'] . '</div></div>';
                                
                        } 
                }
                echo $output;
            }else{
                foreach($merge as $data){
                    if($date_delete[0]['date']<$data['date']){
                        

                        if($data['type']=='request'){
                            if ($data['img'] != null) {
                                $output .= '<div class="content_msg_user" style="color:white;background:#3e98f8;" title="' . $data['date'] . '"><img src="../assets/conversation_img/' . $data['img'] . '" alt="image" class="img-thumbnail" style="width: 100%;height: 180px;"></div>';
                                }
                                if($data['msg']!=null)
                                $output .= '<div class="row msg-row"><div class="content_msg_user" style="color:white;background:#3e98f8;" title="' . $data['date'] . '">' . $data['msg'] . '</div></div>';
                                
                                
                        }else{
                            if ($data['img'] != null) {
                                $output .= '<div class="content_msg_admin" style="color:black;background:white;" title="' . $data['date'] . '"><img src="../assets/conversation_img/' . $data['img'] . '" alt="image" class="img-thumbnail" style="width: 100%;height: 180px;"></div>';
                                }
                                if($data['msg']!=null)
                                $output .= '<div class="row msg-row"><div class="content_msg_admin" style="color:black;background:white;" title="' . $data['date'] . '">' . $data['msg'] . '</div></div>';
                                
                        }
                     }   
                        
                }
                echo $output;
            }
    }

}

?>