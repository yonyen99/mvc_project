<?php

function m_get_data() {

    $query = "SELECT st.id,firstname,lastname,sex,cl.title 
                FROM student st 
                LEFT JOIN class cl ON cl.id = st.class_id WHERE st.class_id = 2";
    // $query = "SELECT * FROM student stu INNER JOIN class cla ON stu.class_id = cla.id WHERE stu.class_id = 1";
    include "connection.php";   
  
    $result = mysqli_query($connection,$query);
 
    $rows = [];
   
    if($result && mysqli_num_rows($result) > 0 ){
        foreach ($result as $record) {
           
            $rec = [];
            $subject = [];
            $querySubject = "SELECT sub_title FROM subjects su
                                INNER JOIN student_has_subjects ss ON su.id = ss.subjects_id
                                INNER JOIN student st ON st.id = ss.student_id
                                WHERE st.id=".$record['id'];
      
            $res = mysqli_query($connection,$querySubject);
       
            foreach($res as $sub){
               array_push($subject,$sub['sub_title']);               
            }
           
            $rec = $record;
            $rec['sub_title'] = $subject;      
            array_push($rows,$rec);
        }
        
    }
  
    return $rows;
}

function get_class_data() {
    $query = "select * from class";
    include "connection.php";
    $result = mysqli_query($connection,$query);
    $rows = [];
    if($result && mysqli_num_rows($result) > 0 ){
        foreach ($result as $record) {
            $rows[] = $record;
        }
    }
    return $rows;
}

function get_subject_data() {
    $query = "select * from subjects";
    include "connection.php";
    $result = mysqli_query($connection,$query);
    $rows = [];
    if($result && mysqli_num_rows($result) > 0 ){
        foreach ($result as $record) {
            $rows[] = $record;
        }
    }
    return $rows;
}
//delet add_student
function student_add_data($data) {
    include "connection.php";
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $sex = $_POST['sex'];
    $class_id = $_POST['class'];
    $subjects= $_POST['subjects'];

    $query = "INSERT INTO student(firstname,lastname,sex,class_id)
              VALUES('$firstname','$lastname','$sex','$class_id')";
    mysqli_query($connection, $query);

    foreach ($subjects as $subject) {
        $last_student = "SELECT id FROM student ORDER BY id DESC LIMIT 1";
        $last_student = mysqli_query($connection, $last_student);
        // var_dump($student_id);die();
        foreach($last_student  as $student_id ){
            $id = $student_id['id'];
            $query_subject = "INSERT INTO student_has_subjects(student_id, subjects_id) VALUES($id,$subject)";
        }
        $result = mysqli_query($connection, $query_subject);
    } 
    return $result;
}

// add_setpermission
function student_add_permission($data) {
    include "connection.php";
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $sex = $_POST['sex'];
    $class_id = $_POST['class'];
    $subjects= $_POST['subjects'];
    $permissions= $_POST['permissions'];
    $description= $_POST['description'];

    $query = "INSERT INTO attendents(firstname,lastname,sex,classname,subject,permission,description)
              VALUES('$firstname','$lastname','$sex','$class_id','$subjects,'$permissions','$description')";
    $result=mysqli_query($connection, $query);
    return $result;
}




function m_delete() {
    include "connection.php";
    $id = $_GET['id'];
    $result = mysqli_query($connection, "DELETE FROM student WHERE id= $id");
    return $result;
}
