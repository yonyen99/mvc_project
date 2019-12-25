<div class="row">
    <div class="col-md-12">
        <a href="index.php?action=setpermission" class="btn btn-warning">Set Permission</a>
    </div>
</div>
<table class="table table-bordered mt-3">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">FirstName</th>
      <th scope="col">LastName</th>
      <th scope="col">Sex</th>
      <th scope="col">Class_Name</th>
      <th scope="col">Subjects</th>
      <th scope="col">Permission</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php 
    if(isset($data['student_data'])){
      $id = 1;
        foreach ($data['student_data'] as $rows) {
         
  ?>
  <tbody>
    <tr>
      <td><?php echo $id;?></td>
      <td><?php echo $rows['firstname'];?></td>
      <td><?php echo  $rows['lastname'];?></td>
      <td><?php echo $rows['sex'];?></td>
      <td><?php echo $rows['classname'];?></td>
      <td><?php echo $rows['subject'];?></td>
      <td><?php echo $rows['permission'];?></td>
      <td><?php echo $rows['description'];?></td>
      <td>
        <a href="index.php?action=detail&id=<?php echo $rows['id'];?>" ><i class="material-icons" >remove_red_eye</i></a>
        <a href="index.php?action=edit&id=<?php echo $rows['id'];?>"><i class="material-icons">edit</i></a>
        <a href="index.php?action=delete&id=<?php echo $rows['id'];?>"><i class="material-icons" onclick="return confirm('Are you sure you want to delete?');">delete</i></a>
      </td>
    </tr>
  </tbody>
  <?php
        $id++;
        }
    }
  ?>
</table>