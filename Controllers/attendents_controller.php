<?php
 $data = array();
get_action($data);

function get_action(&$data){
    $function = 'view';
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        $function = $action;
    }
    $function($data);
}


function view(&$data){
    $data['attendents_data'] = attends_get_data();
    $data['page'] = "attendents/view";
}
function setpermission(&$data){
    $data['class_data'] = get_class_data();
   $data['subject_data'] = get_subject_data();
    $data['page'] = "attendents/addpermission";
}

function permission(&$data) {
    $add_data =  attendents_add_permission($_POST);
    if($add_data) {
        $action = "view";
    }else {
        $action = "setpermission";
    }
    header("Location: index4.php?action=$action");
} 


