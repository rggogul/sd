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


<table width="600" border="0" cellspacing="0" cellpadding="0" align="center" class="table_border">

  <tr>
    <td class="projects_project_type"><div align="center">View of Project Details</div></td>
  </tr>
  <tr>
    <td>
    <table width="100%" border="0" cellspacing="1" cellpadding="5">
          <tr>
            <td class="body_title12px"><table width="100%" border="1">
              <tr>
                <td class="projects_project_type"><div align="center">Project Name</div></td>
                <td class="projects_project_type"><div align="center">Project Type</div></td>
                <td class="projects_project_type"><div align="center">Mobile </div></td>
                <td class="projects_project_type"><div align="center">Email</div></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              
				<?php
				$getProject= $obj_user ->getProject();
                for($i = 0; $i < count($getProject); $i++)
                {
				?>
              <tr>
                <td><?php echo $getProject[$i]['project_name'];?></td>
				<?php
				$getProjectType= $obj_user ->getProjectType('',$getProject[$i]['project_type']);
                for($j = 0; $j < count($getProjectType); $j++)
                {
				?>
                <td>
				 <?php echo $getProjectType[$j]['project_type_name']; ?>                </td>
				<?php
                }
                ?>
                <td><?php echo $getProject[$i]['mobile'];?></td>
                <td><?php echo $getProject[$i]['email'];?></td>
              </tr>
                    <?php
                }
                ?>
            </table></td>
          </tr>
      </table>
       </td>
  </tr>
</table>
</body>
</html>
