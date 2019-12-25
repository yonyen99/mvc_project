<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-center text-white">
                    <h2>Class Form</h2>
                </div>
                  <?php
                  foreach ($data['class'] as $rows) {
                  ?>
                <form action="index2.php?action=form_edit&id=<?php echo $rows['id'];?>"  method="post" enctype="multipart/form-data">
                    <div class="card-body">
                            <div class="form-group">
                                <label for="name">Class Name:</label>
                                <input type="text" name="class_title" value="<?php echo $rows['title']?>" id="name" class="form-control">
                            </div>
                    </div>
                    <div class="card-footer">
                        <a href="index2.php?action=list_class" class="btn btn-success">Go Back</a>
                        <input type="submit" name="edit" value="Submit" class="btn btn-primary float-right">
                    </div>
                </form>
                <?php
                  }
                ?>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>