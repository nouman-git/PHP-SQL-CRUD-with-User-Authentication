<!DOCTYPE html>
<html lang="en">

<?php
include 'Login/check_and_set_session.php';
include 'header.php';
?>

<body>

    <!-- ALLdeleted Records -->
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">

                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <strong>
                                <h2>All Deleted Records here...</h2>
                            </strong>
                        </div>
                        <div class="col-sm-6">
                            <a href="add.php" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add
                                    New Record</span></a>
                            <a href="index.php" class="btn btn-info"><i class="material-icons">&#xe88a;</i>
                                <span>Back</span></a>
                            <a href="logout.php" class="btn btn-danger"><i class="material-icons">&#xe9ba;</i>
                                <span>Logout</span></a>
                        </div>
                    </div>
                </div>

                <?php
                $deletedRecords = json_decode(file_get_contents('deleted_records.json'), true);

                if (!empty($deletedRecords)) {
                    ?>

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Class</th>
                                <th>Phone</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            foreach ($deletedRecords as $row) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $row['sid'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['sname'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['saddress'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['sclass'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['sphone'] ?>
                                    </td>



                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    echo "<h2>No Deleted Records Found!!</h2>";
                }
                ?>

            </div>
        </div>
    </div>

</body>

</html>