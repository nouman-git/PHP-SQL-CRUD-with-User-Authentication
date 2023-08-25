<!DOCTYPE html>
<html lang="en">

<?php
// include '../DB_conn/database.php';
include 'DB_conn/database.php';


include 'Login/check_and_set_session.php';
include 'header.php';

// var_dump($token_id);
// var_dump($user_id);

// print_r($_COOKIE);
?>


<body>

	<!-- ALL Records -->
	<div class="container-xl">
		<div class="table-responsive">
			<div class="table-wrapper">

				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
							<?php
							// $user_id=null;
							// $token_id=null;
							

							// if (isset($_GET['user_id']) && isset($_GET['token_id'])) {
							// 	$user_id = $_GET['user_id'];
							// 	$token_id = $_GET['token_id'];
							
							// var_dump($user_id);
							// var_dump($token_id);
							
							//$conn = mysqli_connect('localhost', 'root', "", "crud_php_sql") or die("Connection with DB Failed !!");
							
							$db = Database::getInstance();
							$conn = $db->getConnection();

							$query = "SELECT *
                          			FROM user 
                          			WHERE id = $user_id";

							$result = mysqli_query($conn, $query) or die("Query Failed");
							$row = mysqli_fetch_assoc($result);

							echo "<strong><h2>Welcome {$row['name']}, All Records here...</h2></strong>";

							?>
						</div>
						<div class="col-sm-6">

							<a href="add.php" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add
									New Record</span></a>

							<a href="show_deleted_records.php" class="btn btn-info"><i
									class="material-icons">&#xE16C;</i>
								<span>Show Deleted Records</span></a>

							<a href="logout.php" class="btn btn-danger"><i class="material-icons">&#xe9ba;</i>
								<span>Logout</span></a>
						</div>
					</div>
				</div>


				<?php
				// HERE..........................................................
				// Building Conection with DB
				
				// step 1 make connection
				// step 2 pass query get result
				// step 3 connection close
				
				//$mysqli -> new mysqli(host, username, password, dbname, port, socket)
				
				//$conn = mysqli_connect('localhost', 'root', "", "crud_php_sql") or die("Connection with DB Failed !!");

				$query = "SELECT *
          			FROM student as STable, studentclass as Ctable
          			WHERE STable.sclass = Ctable.cid";

				$result = mysqli_query($conn, $query) or die("Query Failed");

				if (mysqli_num_rows($result) > 0) {
					?>

					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<!-- <th>
									<span class="custom-checkbox">
										<input type="checkbox" id="selectAll">
										<label for="selectAll"></label>
									</span>
								</th> -->
								<th>Id</th>
								<th>Name</th>
								<th>Address</th>
								<th>Class</th>
								<th>Phone</th>
								<th>Actions</th>
							</tr>
						</thead>

						<tbody>
							<?php
							while ($row = mysqli_fetch_assoc($result)) {
								?>
								<tr>
									<!-- <td>
										<span class="custom-checkbox">
											<input type="checkbox" id="checkbox1" name="options[]" value="1">
											<label for="checkbox1"></label>
										</span>
									</td> -->
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
										<?php echo $row['cname'] ?>
									</td>
									<td>
										<?php echo $row['sphone'] ?>
									</td>


									<td>
										<div style="display: flex; align-items: center;">
											<form action="edit.php" method="post"
												style="display: inline-block; margin-right: 10px;">
												<input type="hidden" name="sid" value="<?php echo $row['sid']; ?>">
												<button type="submit" class="edit"
													style="border: none; background: none; cursor: pointer;">
													<i class="material-icons" data-toggle="tooltip" title="Edit"
														style="color: #FFC107;">&#xE254;</i>
												</button>
											</form>

											<form action="delete.php" method="post" style="display: inline-block;">
												<input type="hidden" name="sid" value="<?php echo $row['sid']; ?>">
												<button type="submit" class="delete"
													style="border: none; background: none; cursor: pointer;">
													<i class="material-icons" data-toggle="tooltip" title="Delete"
														style="color: red;">&#xE872;</i>
												</button>
											</form>
										</div>


								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
					<?php
				} else {
					echo "<h2>No Records Found!!</h2>";
					mysqli_close($conn);
				}
				?>

				<!-- <div class="clearfix">
				<div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
				<ul class="pagination">
					<li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li>
				</ul>
			</div> -->
			</div>
		</div>
	</div>









</body>

</html>