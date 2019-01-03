<?php
include_once("website.class.php");
$obj = new website();
$user_id=$_POST['user_id'];
$conn = mysqli_connect("localhost", "root", "", "jewelry");
$date_delete = $obj->get_date($user_id,'request');
    $output = '';    
    if(!empty($_POST['user_id'])){
        //get all msg of user
        $result_user = mysqli_query($conn, "select * from contact where user_id = $user_id order by date");
        //get all msg of admin
        $result_admin = mysqli_query($conn, "select * from replay where user_id = $user_id");
        //when display the msg modify this msg as read
        mysqli_query($conn, "update replay set status='read' where user_id=$user_id");
        //order the massege
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
        }else{
            echo "";
    } 

?>