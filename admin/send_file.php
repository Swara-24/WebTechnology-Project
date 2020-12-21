<?php
	include('session.php');
	
	
	#if(isset($_POST['id'])){
	#$id=$_POST['id'];	
	
	$fileInfo = PATHINFO($_FILES["file_name"]["name"]);
	
	if (empty($_FILES["file_name"]["name"])){
		$location=$srowfile['file'];
		?>
			<script>
				window.alert('Uploaded file is empty!');
				window.history.back();
			</script>
		<?php
	}
	else{
			
		if ($fileInfo['extension'] == "jpg" OR $fileInfo['extension'] == "png" OR $fileInfo['extension'] == "pdf") {
			$newFilename = $fileInfo['filename'] . "_" . time() . "." . $fileInfo['extension'];
			move_uploaded_file($_FILES["file_name"]["tmp_name"], "../upload/files/" . $newFilename);
			$location = "../upload/files/" . $newFilename;
			mysqli_query($conn,"insert into `file` (userid,file,file_date) values ('".$_SESSION['id']."','$location',NOW())");
			?>
				<script>
					window.alert('File uploaded successfully!');
					window.history.back();
				</script>
			<?php
			
		
		}
		else{
			?>
				<script>
					window.alert('File not uploaded. Please upload JPG or PNG or PDF files only!');
					window.history.back();
				</script>
			<?php
		}
	}

?>