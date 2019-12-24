<link rel="stylesheet" href="Views/bootstrap-4.3.1/css/bootstrap.min.css">
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-border">
                <?php
                if (isset($data['student'])) {
                    foreach ($data['student'] as $row) {
                        ?>

                        <tbody>
                                
                        </tbody>
                <?php
                    }
                }
                ?>
            </table>

        </div>
    </div>
</div>