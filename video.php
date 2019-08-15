<?php
	//$max_file_size = 10485760;
	$fileName = $_FILES['videopreview']['name'];
  $fileName2 = $_FILES['videofile']['name'];
	include 'connector.php';

   	$max_file_size = 9048576000;
		$target = "uploads/";
		$fileTarget = $target.$fileName;
    $fileTarget2 = $target.$fileName2;
    $tempFileName = $_FILES["videopreview"]["tmp_name"];
    $tempFileName2 = $_FILES["videofile"]["tmp_name"];
   $filetitle = $_POST['videotitle'];
    $fileuploaddate = $_POST['videouploaddate'];
      $filedescription = $_POST['videodescription'];
		$result = move_uploaded_file($tempFileName, $fileTarget);
    $result2  = move_uploaded_file ($tempFileName2,$fileTarget2);


		if($result ['size'] <= $max_file_size && $result2 ['size'] <= $max_file_size) {

      $query = "INSERT INTO `videodownload`(`videopreview`, `videodownload`,`videotitle`, `uploaddate`, `videodescription`)VALUES ( '$fileTarget', '$fileTarget2','$filetitle','$fileuploaddate', '$filedescription')";
			$connection->query($query) or die("Error : ".mysqli_error($connection));

		//	include 'firebasevideo.php';

		}
		else {
			echo "Sorry !!! There was an error in uploading your file";


		}
		mysqli_close($connection);



?>
