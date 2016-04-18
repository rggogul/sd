<?php
include("../queries.class.php"); 
$objInsertProject = new queries();
extract($_POST);
	$is_deleted=0;
	//echo $testQuery = $objInsertProject->addNewProject($project_name,$project_type,$mobile,$email,$is_deleted);
	
	if($objInsertProject->updateProject($id,$project_name,$project_type,$mobile,$email,$is_deleted))
	{
		redirect("editForm.php?msg=success");
	}
	else
	{
		echo $msg = "Failure";
		redirect("editForm.php?msg=failure");
	}
?>