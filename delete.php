<!DOCTYPE html>
<html lang="en">

<?php
include 'Login/check_and_set_session.php';
include 'header.php';

// $student_id = $_GET['id'];
// var_dump($token_id);
// var_dump($user_id);

$student_id = $_POST['sid'];


?>


<body>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="delete_data.php?id=<?php echo $student_id; ?>" method="post" >
				<!-- <form action="delete_data.php" method="post" > -->

					<div class="modal-header">
						<h4 class="modal-title">Delete Record</h4>
						<!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
					</div>
					<div class="modal-body">
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<!-- <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"> -->
						<a href="index.php" class="btn btn-default">Cancel</a>
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>





</body>

</html>