<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-center text-white">
                    <h2>Student Information Form</h2>
                </div>
                <?php
                foreach ($data['student'] as $row) {
                ?>
                <form action="index.php?action=edit_data&id=<?php echo $row['id'];?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                            <div class="form-group">
                                <label for="name">Full Name:</label>
                                <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="class">Class:</label>
                                <select name="class" id="class" class="form-control">
                                    <option <?php if($row['class']=='WEP2020-A'){?> selected="selected" <?php } ?> value="WEP2020-A">WEP2020-A</option>
                                    <option <?php if($row['class']=='WEP2020-B'){?> selected="selected" <?php } ?> value="WEP2020-B">WEP2020-B</option>
                                    <option <?php if($row['class']=='SNA2020'){?> selected="selected" <?php } ?> value="SNA2020">SNA2020</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mark">Mark:</label>
                                <input type="number" name="mark" id="mark" value="<?php echo $row['mark']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="sex">Gender:</label><br>
                                <input type="radio" <?php if($row['sex']=='Male'){?> checked="checked" <?php } ?> name="sex" value="Male">Male <br>
                                <input type="radio" <?php if($row['sex']=='Female'){?> checked="checked" <?php } ?> name="sex" value="Female">Female
                            </div>
                    </div>
                    <div class="card-footer">
                        <a href="index.php?action=view" class="btn btn-success">Go Back</a>
                        <input type="submit" name="create" value="Submit" class="btn btn-primary float-right">
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