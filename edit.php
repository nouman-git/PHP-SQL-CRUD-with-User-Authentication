<!DOCTYPE html>
<html lang="en">

<?php



include 'DB_conn/database.php';
include 'Login/check_and_set_session.php';
include 'header.php';
?>


<body>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <?php

                // $conn = mysqli_connect('localhost', 'root', "", "crud_php_sql") or die("Connection with DB Failed !!");
                
                $db = Database::getInstance();
                $conn = $db->getConnection();

                //get id from URL passed for Edit Icon href="edit.php?id=<?php echo $row['sid']
                // $id_form_URL = $_GET['id'];
                $sid = $_POST['sid'];


                $query = "SELECT *
                        FROM student
                        WHERE sid = $sid";

                $result = mysqli_query($conn, $query) or die("Query Failed");

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                        <form action="update_data.php" method="post">

                            <input type="hidden" name="id" value="<?php echo $sid; ?>">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Record</h4>
                                <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" required name="sname"
                                        value="<?php echo $row['sname']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" required name="saddress"
                                        value="<?php echo $row['saddress']; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Class</label>
                                    <!-- <textarea class="form-control" required></textarea> -->
                                    <?php

                                    $query1 = "SELECT *
    FROM studentclass as Ctable";

                                    $result1 = mysqli_query($conn, $query1) or die("Query Failed");
                                    if (mysqli_num_rows($result1) > 0) {
                                        echo '<select name="sclass" class="form-control">';
                                        while ($row1 = mysqli_fetch_assoc($result1)) {
                                            if ($row['sclass'] == $row1['cid']) {
                                                $select = "selected";
                                            } else {
                                                $select = "";
                                            }
                                            echo "<option value='{$row1["cid"]}' $select>{$row1["cname"]}</option>";
                                        }
                                        echo '</select>'; // Move the closing </select> outside of the while loop
                                    }
                                    ?>

                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" required name="sphone"
                                        value="<?php echo $row['sphone']; ?>">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!-- <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"> -->
                                <a href="index.php" class="btn btn-default">Cancel</a>
                                <input type="submit" class="btn btn-info" value="Save">
                            </div>
                        </form>
                        <?php
                    }
                } ?>
            </div>
        </div>
    </div>




</body>

</html>