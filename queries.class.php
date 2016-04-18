<?php
require("includes/functions.php");
getDB();

class queries
{
	public $query_type = "";
	
	
	//function to insert project
	
	public function addNewProject($project_name, $project_type, $mobile, $email, $is_deleted)
	{
		$query = "INSERT INTO projects VALUES('','".$project_name."', $project_type, $mobile, '".$email."', $is_deleted)";
		$query_type = "insert";
		return $this->execute_query($query, $query_type);
		//return $query;
	}
	
	//function to retrieve projects

	public function getProject($project_name = '', $id='')
	{
		$query = "SELECT * FROM projects WHERE id != 0";
		
		if($project_name != "")
		{
			$query .= " AND project_name = '$project_name'";
		}
		if($id != "")
		{
			$query .= " AND id = '$id'";
		}
		
		$query .= " AND is_deleted = 0";
		//return $query;
		return $this->execute_query($query);
	}
	
	
	//function for updating projects
	
	public function updateProject($id, $project_name, $project_type, $mobile, $email)
	{
		$query = "UPDATE projects SET project_name = '$project_name', project_type = '$project_type', mobile = '$mobile', email = '$email'  WHERE id = ".$id;
		$query_type = "update";
		return $this->execute_query($query, $query_type);
	}
	
	//function to retrieve project_types

	public function getProjectType($project_type_name = '', $id='')
	{
		$query = "SELECT * FROM project_types WHERE id != 0";
		
		if($project_type_name != "")
		{
			$query .= " AND project_type_name = '$project_type_name'";
		}
		if($id != "")
		{
			$query .= " AND id = '$id'";
		}
		$query .= " AND is_deleted = 0";
		return $this->execute_query($query);
	}
	
	// For executing All queries.
	public function execute_query($get_query, $query_type = '')
	{
		if(($query_type == "insert") || ($query_type == "update") || ($query_type == "delete"))
		{
			if($sql = mysql_query($get_query))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			$sql = mysql_query($get_query);
			$num_rows = $this->getRowCount($get_query);
	
			if($num_rows < 1)
			{
				return false;
			}
			else
			{
				while($res = mysql_fetch_assoc($sql))
				{
					$result[] = $res;
				}
				return $result;
			}
		}
	}
	
	// For getting count of returned result set.
	public function getRowCount($cnt_query)
	{   
		$i = 0;
		$sql = mysql_query($cnt_query);
		@$total_rows = mysql_num_rows($sql);
		if($total_rows > 0)
		{
			return $total_rows;
		}
		else
		{
			return $i;
		}
	}
	
	// function for date configuration					5/21/2012  2012-5-21  2012-21-05  02/05/1990
	public function configureDate($input_date)
	{
		
		return $dt = date("Y-m-d",strtotime($input_date));
	}
	
	// function for date re-configure
	public function dateReconfigure($input_date)
	{
		return $dt = date("d-M-Y", strtotime($input_date));
	}
	
	
}
?>