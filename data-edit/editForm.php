<?php
include("../queries.class.php");
$obj_user = new queries();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sample PHP Programs by Gogul.R.G</title>
<link href="../css/style.css" rel="stylesheet" type="text/css"><br>
<script src="../js/validator.js"></script>
<script type="text/javascript">
	function validate()
	{
		if(isEmpty('project_name'))
		{
			return false;
		}
		
		if(checkSelected('project_type'))
		{
			return false;
		}
		
		if(isEmpty('mobile'))
		{
			return false;
		}
		
		if(isEmpty('email'))
		{
			return false;
		}


	
		else
		{
			return true;
		}
	}
	
	</script>

</head>

<body>

<?php
$id  = "";
  if((isset($_GET['id']) && (($_GET['id']) != "")))
{
	$id = $_GET['id'];
}
?>

<table width="600" border="0" cellspacing="0" cellpadding="0" align="center" class="table_border">
  <?php 
  if((isset($_GET['msg']) && (($_GET['msg']) == "success")))
  {
  	$msg = "PROJECT DETAILS UPDATED SUCCESSFULLY";
  }
  elseif((isset($_GET['msg']) && (($_GET['msg']) == "failure")))
  {
  	$msg = "Sorry! Details not entered";
  }
   elseif((isset($_GET['msg']) && (($_GET['msg']) == "exists")))
  {
  	$msg = "Project name already exists";
  }
  ?>
<?php
if(isset($msg))
{
?>
  <tr>
    <td class="projects_project_type">&nbsp;</td>
  </tr>
  <tr>
    <td class="projects_project_type" align="center"><?php echo $msg;?></td>
  </tr>
  <tr>
    <td class="projects_project_type">&nbsp;</td>
  </tr>
  <?php
  }
  ?>
  <tr>
    <td class="projects_project_type"><div align="center">Updatation of Project Details</div></td>
  </tr>
  <tr>
    <td>
    <?php
$getProject= $obj_user ->getProject('',$id);
for($j = 0; $j < count($getProject); $j++)
{
$project_name_edit = $getProject[$j]['project_name'];
$project_type_edit = $getProject[$j]['project_type'];
$mobile_edit = $getProject[$j]['mobile'];
$email_edit = $getProject[$j]['email'];
}
?>

    <form method="post" name="formInsert" onsubmit="return validate()" action="updation.php">
    <table width="100%" border="0" cellspacing="1" cellpadding="5">
          <tr> 
            <td class="body_title12px">Enter New Project </td>
            <td><input name="project_name" type="text" class="dropbox" id="project_name" size="30" value="<?php echo $project_name_edit; ?>" ></td>
          </tr>
          <tr> 
            <td class="body_title12px">Select Project Type</td>
            <td><select name="project_type" class="dropbox" id="project_type">
			<option value="">-select-</option>
            
				<?php
				$getProjectType= $obj_user ->getProjectType();
                for($i = 0; $i < count($getProjectType); $i++)
                {
                    ?>
                    <option value="<?php echo $getProjectType[$i]['id']; ?>" <?php selectit($project_type_edit,$getProjectType[$i]['id'])?>> <?php echo $getProjectType[$i]['project_type_name']; ?> </option> 
                    <?php
                }
                ?>
              </select></td>
          </tr>
          <tr> 
            <td class="body_title12px">Mobile Number</td>
            <td><input name="mobile" type="text" class="dropbox" id="mobile" size="30" value="<?php echo $mobile_edit; ?>"></td>
          </tr>
          <tr> 
            <td class="body_title12px">Email Id</td>
            <td><input name="email" type="text" class="dropbox" id="email" size="30" value="<?php echo $email_edit; ?>"></td>
          </tr>
          <tr> 
            <td colspan="2" align="center"> <input name="Submit" type="submit" class="button" value="Update"></td>
          </tr>
          <input type="hidden" value="<?php echo $id; ?>" name="id"  />
          <tr> 
            <td colspan="2" align="center"> <a href="view.php"><input name="Submit" type="button" class="button" value="View"></a></td>
          </tr>
      </table>
      </form>     
       </td>
  </tr>
</table>
</body>
</html>
