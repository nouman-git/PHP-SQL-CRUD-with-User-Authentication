<!DOCTYPE html>
<html lang="en">

<?php
include 'DB_conn/database.php';
include 'Login/check_and_set_session.php';
include 'header.php';
?>


<body>
    <!-- Add Modal HTML -->
    <div id="addEmployeeModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="save_data.php" method="post">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Record</h4>
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="sname" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="saddress" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label>Class</label>
                            <!-- <textarea class="form-control" required></textarea> -->
                            <select class="form-control" name="sclass">
                                <option value="" select disabled>Select Class</option>
                                <?php
                                // $conn = mysqli_connect('localhost', 'root', "", "crud_php_sql") or die("Connection with DB Failed !!");
                                
                                $db = Database::getInstance();
                                $conn = $db->getConnection();

                                $query = "SELECT *
                                    FROM studentclass as Ctable";


                                $result = mysqli_query($conn, $query) or die("Query Failed");
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <option value="<?php echo $row['cid'] ?>"> <?php echo $row['cname'] ?> </option>

                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="sphone" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"> -->
                        <a href="index.php" class="btn btn-default">Cancel</a>
                        <input type="submit" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>




</body>

</html>