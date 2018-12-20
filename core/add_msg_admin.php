<?php 
$conn = mysqli_connect("localhost", "root", "", "jewelry");
$output = '';
//$result_admin = mysqli_query($conn, "select * from replay where user_id = $user_id");
if(!empty($_FILES["file"]["type"])){
    $ext=pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
    $new_name_image=uniqid().date("dmyish").".".$ext;
    $valid_extensions = array("jpeg", "jpg", "png");
    if((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && in_array($ext, $valid_extensions)){
    
        move_uploaded_file($_FILES['file']['tmp_name'],"../assets/conversation_img/".$new_name_image);
    }
    $dateTime = date("Y-m-d h:i:sa", time());
    $user_id=$_POST['user_id'];
    mysqli_query($conn,'INSERT INTO replay (user_id,img,date) VALUES ('.$user_id.',"'.$new_name_image.'","'.$dateTime.'")');
    $result_user = mysqli_query($conn, "select * from contact where user_id = $user_id order by date");
    $result_admin = mysqli_query($conn, "select * from replay where user_id = $user_id");
    mysqli_query($conn, "update contact set status='read' where user_id=$user_id");
    if (mysqli_num_rows($result_user) > 0) {
        /*if there is msg from the admin */
        if (mysqli_num_rows($result_admin) > 0) {
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
            foreach($merge as $data){
                if($data['type']=='request'){
                    if ($data['img'] != null) {
                        $output .= '<div class="content_msg_user" title="' . $data['date'] . '"><img src="assets/conversation_img/' . $data['img'] . '" alt="image" class="img-thumbnail" style="width: 100%;height: 180px;"></div>';
                        }
                        if($data['msg']!=null)
                        $output .= '<div class="row msg-row"><div class="content_msg_user" title="' . $data['date'] . '">' . $data['msg'] . '</div></div>';
                    
                        
                }else{
                    if ($data['img'] != null) {
                        $output .= '<div class="content_msg_admin" title="' . $data['date'] . '"><img src="assets/conversation_img/' . $data['img'] . '" alt="image" class="img-thumbnail" style="width: 100%;height: 180px;"></div>';
                        }
                        if($data['msg']!=null)
                        $output .= '<div class="row msg-row"><div class="content_msg_admin" title="' . $data['date'] . '">' . $data['msg'] . '</div></div>';
                        
                }
            }

        } else {
            while ($row_user = mysqli_fetch_array($result_user)) {
                if ($row_user['img'] != null) {
                    $output .= '<div class="content_msg_user" title="' . $row_user['date'] . '"><img src="assets/conversation_img/' . $row_user['img'] . '" alt="image" class="img-thumbnail" style="width: 100%;height: 180px;"></div>';
                }
                if ($row_user['msg'] != null)
                $output .= '<div class="row msg-row"><div class="content_msg_user" title="' . $row_user['date'] . '">' . $row_user['msg'] . '</div> </div>';
            }
        }

    }
    echo $output;    
}
if(isset($_POST['send']) and $_POST['text_msg']!=''){
    $dateTime = date("Y-m-d h:i:sa", time());
    $user_id=$_POST['user_id'];
    mysqli_query($conn,'INSERT INTO replay (user_id,msg,date) VALUES ('.$user_id.',"'.$_POST['text_msg'].'","'.$dateTime.'")');
    $result_user = mysqli_query($conn, "select * from contact where user_id = $user_id order by date");
    $result_admin = mysqli_query($conn, "select * from replay where user_id = $user_id");
    mysqli_query($conn, "update contact set status='read' where user_id=$user_id");
    if (mysqli_num_rows($result_user) > 0) {
        /*if there is msg from the admin */
        if (mysqli_num_rows($result_admin) > 0) {
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
            foreach($merge as $data){
                if($data['type']=='request'){
                    if ($data['img'] != null) {
                        $output .= '<div class="content_msg_user" title="' . $data['date'] . '"><img src="assets/conversation_img/' . $data['img'] . '" alt="image" class="img-thumbnail" style="width: 100%;height: 180px;"></div>';
                        }
                        if($data['msg']!=null)
                        $output .= '<div class="row msg-row"><div class="content_msg_user" title="' . $data['date'] . '">' . $data['msg'] . '</div></div>';
                    
                        
                }else{
                    if ($data['img'] != null) {
                        $output .= '<div class="content_msg_admin" title="' . $data['date'] . '"><img src="assets/conversation_img/' . $data['img'] . '" alt="image" class="img-thumbnail" style="width: 100%;height: 180px;"></div>';
                        }
                        if($data['msg']!=null)
                        $output .= '<div class="row msg-row"><div class="content_msg_admin" title="' . $data['date'] . '">' . $data['msg'] . '</div></div>';
                        
                }
            }

        } else {
            while ($row_user = mysqli_fetch_array($result_user)) {
                if ($row_user['img'] != null) {
                    $output .= '<div class="content_msg_user" title="' . $row_user['date'] . '"><img src="assets/conversation_img/' . $row_user['img'] . '" alt="image" class="img-thumbnail" style="width: 100%;height: 180px;"></div>';
                }
                if ($row_user['msg'] != null)
                $output .= '<div class="row msg-row"><div class="content_msg_user" title="' . $row_user['date'] . '">' . $row_user['msg'] . '</div> </div>';
            }
        }

    }
    echo $output;

}

?>