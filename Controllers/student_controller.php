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
function view(&$data) {
    $data['student_data'] = m_get_data();
    $data['page'] = "students/view";
}
//add functioin
function add(&$data) {
    $data['class_data'] = get_class_data();
    $data['subject_data'] = get_subject_data();
    $data['page'] = "students/add";
}
// setpermission
function setpermission(&$data){
    $data['class_data'] = get_class_data();
    $data['subject_data'] = get_subject_data();
    $data['page'] = "students/addpermission";
}

//form_data function
function form_data(&$data) {
    $add_data = student_add_data($_POST);
    if($add_data) {
        $action = "view";
    }else {
        $action = "add";
    }
    header("Location: index.php?action=$action");
}

// permission function
function permission(&$data) {
    $add_data_permission = student_add_permission($_POST);
    if($add_data_permission) {
        $action = "view";
    }else {
        $action = "addpermission";
    }
    header("Location: index.php?action=$action");
}

//delete function
function delete(&$data) {
    //code here
    $result = m_delete();
    if($result) {
        $action = "view";
    }else {
        echo "Cannot delete this record!!!";
    }
    header("Location: index.php?action=$action");
}







