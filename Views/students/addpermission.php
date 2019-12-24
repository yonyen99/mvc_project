<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-center text-white">
                    <h2>Student Set Permission Form</h2>
                </div>
                <form action="index.php?action=permission" method="post">
                    <div class="card-body">
                        <!-- firstname -->
                        <div class="form-group">
                            <label for="fname">First Name:</label>
                            <input type="text" name="fname" id="fname" class="form-control">
                        </div>
                        <!-- lastname -->
                        <div class="form-group">
                            <label for="lname">Last Name:</label>
                            <input type="text" name="lname" id="lname" class="form-control">
                        </div>
                        <!-- sex -->
                        <div class="form-group">
                            <label for="sex">Gender:</label><br>
                            <input type="radio" name="sex" value="Male">Male <br>
                            <input type="radio" name="sex" value="Female">Female
                        </div>
                        <!-- class -->
                        <div class="form-group">
                            <label for="class">Class:</label>
                            <select name="class" id="class" class="form-control">
                                <?php
                                foreach ($data['class_data'] as $rows) {
                                    ?>
                                    <option value="<?php echo $rows['id']; ?>"><?php echo $rows['title']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <!-- subject -->
                        <div class="form-group">
                            <label for="subject">Subjects:</label>
                            <select name="subjects[]" class="form-control" multiple>
                                <?php
                                foreach ($data['subject_data'] as $rows) {
                                    ?>
                                    <option value="<?php echo $rows['id']; ?>"><?php echo $rows['sub_title']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <!-- permission -->
                        <div class="form-group">
                            <select class="form-control" name="permissions">
                                <option value="0" disabled selected>Permission:</option>
                                <option value="Yes">Have Permission</option>
                                <option value="No">No Permission</option>
                            </select>
                        </div>

                        <!-- description -->
                        <div class="form-group">
                            <label for="">description:</label>
                            <textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="index.php?action=view" class="btn btn-success">Go Back</a>
                        <input type="submit" name="create" value="Submit" class="btn btn-primary float-right">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>