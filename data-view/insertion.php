<?php
include("../queries.class.php"); 
$objInsertProject = new queries();
extract($_POST);
$chkProject = "";
$chkProject = $objInsertProject->getProject($project_name);
if(empty($chkProject))
{
	$is_deleted=0;
	//echo $testQuery = $objInsertProject->addNewProject($project_name,$project_type,$mobile,$email,$is_deleted);
	
	if($objInsertProject->addNewProject($project_name,$project_type,$mobile,$email,$is_deleted))
	{
		redirect("index.php?msg=success");
	}
	else
	{
		echo $msg = "Failure";
		redirect("index.php?msg=failure");
	}
}
else
{
	echo $msg = "Project name Already Exists";
		redirect("index.php?msg=exists");
}
?>