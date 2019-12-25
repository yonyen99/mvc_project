
<?php
function attends_get_data()
{
    $query = "select * from attendents";
    include "connection.php";
    $result = mysqli_query($connection, $query);
    $rows = [];
    if ($result && mysqli_num_rows($result) > 0) {
        foreach ($result as $record) {
            $rows[] = $record;
        }
    }
    return $rows;
}

function get_class_data()
{
    $query = "select * from class";
    include "connection.php";
    $result = mysqli_query($connection, $query);
    $rows = [];
    if ($result && mysqli_num_rows($result) > 0) {
        foreach ($result as $record) {
            $rows[] = $record;
        }
    }
    return $rows;
}

function get_subject_data()
{
    $query = "select * from subjects";
    include "connection.php";
    $result = mysqli_query($connection, $query);
    $rows = [];
    if ($result && mysqli_num_rows($result) > 0) {
        foreach ($result as $record) {
            $rows[] = $record;
           
        }
    }
    return $rows;
}

function attendents_add_permission($data)
{
    include "connection.php";
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $sex = $_POST['sex'];
    $class_id = $_POST['class'];
    $subjects = $_POST['subjects'];
    $permissions = $_POST['permissions'];
    $description = $_POST['description'];

    $query = "INSERT INTO attendents(firstname,lastname,sex,classname,subject,permission,description)
              VALUES('$firstname','$lastname','$sex','$class_id','$subjects,'$permissions','$description')";
    mysqli_query($connection, $query);

    

    return $result;
}
