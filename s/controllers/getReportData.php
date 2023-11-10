<?php
// Take the following input values: 

// startDate endDate
// viewBy

// clientId
// projectId
// personId
// deptId
// activityId
// subactivityId
// taskId
// companyId,
// teamId
// isBillable

// Use an alias for each of the tables to be used. Company comp,Project proj,client cl,Employee emp, Activity act, SubActivity subact, Department dept, Task task, Team team, Timesheet ts
// Segregate the work into functions.

include("common.php");

session_start();

function getQuery($selection)
{
	$queryString = "";
	
	if(isset($_SESSION['uaccesslevel']) && $_SESSION['uaccesslevel'] == 1)
	{
		switch($selection)
		{
			case "company" : $queryString = "SELECT id,name FROM Company";break;
			case "client" : $queryString = "SELECT id,name FROM Client"; break;
			case "project" : $queryString = "SELECT id,name FROM Project";break;
			case "employee" : $queryString = "SELECT empId AS id,empName AS name FROM Employee" ; break ;
			case "team" : $queryString = "SELECT id,name FROM Team"; break;
			case "activity" : $queryString = "SELECT activityId AS id,activityName AS name FROM Activity"; break;
			case "subactivity" : $queryString = "SELECT moduleId AS id,moduleName AS name FROM SubActivity"; break;
			case "task" : $queryString = "SELECT id,name FROM Task"; break;
		}
	}
	else if(isset($_SESSION['uaccesslevel']) && $_SESSION['uaccesslevel'] == 2)
	{	
		switch($selection)
		{
			case "company" : $queryString = "SELECT Client.companyId AS id,Company.name AS name FROM Company,Client WHERE Client.companyId=Company.id AND Client.teamId=(" . getQuery('teamId')  .  ")";break;
			
			case "client" : $queryString = "SELECT id,name FROM Client WHERE teamId=(" . getQuery('teamId') . ")"; break;
			
			case "project" : $queryString = "SELECT id,name FROM Project WHERE clientId IN (" . getQuery('clientId') . ")";break;
			
			case "employee" : $queryString = "SELECT empId AS id,empName AS name FROM Employee WHERE currentTeamId=(" . getQuery('teamId') . ")"; break;
			
			case "team" : $queryString = "SELECT id,name FROM Team WHERE leader='" . $_SESSION['uid']  . "'"; break;
			
			case "activity" : $queryString = "SELECT activityId AS id,activityName AS name FROM Activity"; break;
			
			case "subactivity" : $queryString = "SELECT moduleId AS id,moduleName AS name FROM SubActivity"; break;
			
			case "task" : $queryString = "SELECT id,name FROM Task"; break;
			
			case "teamId" : $queryString = "SELECT id FROM Team WHERE leader='" . $_SESSION['uid']  . "'"; break;
			
			case "clientId" : $queryString = "SELECT id FROM Client WHERE teamId=(" . getQuery('teamId') . ")"; break;
		
		}
	}
	

	return $queryString;
}

function getCommaSeparatedList($selection)
{
	$result = executeSelectQuery(getQuery($selection));
	while($row = mysql_fetch_assoc($result))
	{
		$rows[] = "'" . $row['id'] . "'";
	}
	if(!empty($rows))
	{
		return "(" . implode(",",$rows) . ")";
	}
	return "('0')";
}

		
function getConditionClauseForManager($clientId,$projectId,$empId,$deptId,$activityId,$subactivityId,$taskId,$teamId,$companyId,$isBillable,$startDate,$endDate)
{

	$conditionClause = "";

	if(is_numeric($clientId) && $clientId != '0')
	{
		$conditionClause .= " AND ts.clientId=" . 	$clientId;
	}
	else if(is_numeric($clientId) && $clientId == '0')
	{
		//$conditionClause .= " AND ts.clientId IN " . getCommaSeparatedList("client");
	}
	

	if(is_numeric($projectId) && $projectId != '0')
	{
		$conditionClause .= " AND ts.projectId=" . $projectId;
	}
	else if(is_numeric($projectId) && $projectId == '0')
	{
		//$conditionClause .= " AND ts.projectId IN " . getCommaSeparatedList("project");
	}

	
	if(is_numeric($deptId) && $deptId != '0')
	{
		$conditionClause .= " AND ts.deptId=" . $deptId;
	}
	
	
	
	if(is_numeric($activityId) && $activityId != '0')
	{
		$conditionClause .= " AND ts.activityId=" . $activityId;
	}
	

	
	if(is_numeric($subactivityId) && $subactivityId != '0')
	{
		$conditionClause .= " AND ts.subactivityId=" . $subactivityId;
	}
	
	
	if(is_numeric($taskId) && $taskId != '0')
	{
		$conditionClause .= " AND ts.taskId=" . $taskId;
	}
	
	//echo "EmpId is:" . $empId;
	if($empId != 0 || $empId != '0') 
	{
		$conditionClause .= " AND ts.empId='" . $empId . "'";
	}
	else if(is_numeric($empId) && $empId == '0')
	{
		$conditionClause .= " AND ts.empId IN " . getCommaSeparatedList("employee");
	}
	
	
	if(is_numeric($teamId) && $teamId != '0')
	{
		$conditionClause = $conditionClause . " AND ts.teamId=" . 	$teamId;
	}
	else if(is_numeric($teamId) && $teamId == '0')
	{
		//$conditionClause .= " AND ts.teamId IN " . getCommaSeparatedList("team");
	}
	
	
	if(is_numeric($companyId) && $companyId != '0')
	{
		$conditionClause .= " AND ts.companyId=" . 	$companyId;
	}
	else if(is_numeric($companyId) && $companyId == '0')
	{
		//$conditionClause .= " AND ts.companyId IN " . getCommaSeparatedList("company");
	}
	
	
	if($startDate !="" && $startDate !='0' && $startDate !=null )
	{
		//$startDate = strtotime($startDate);
		//$conditionClause .= " AND UNIX_TIMESTAMP(ts.date)>=" . $startDate;
                $startDate =date("y-m-d", strtotime($startDate));
                $conditionClause .= " AND ts.date >='" . $startDate."'";
	}
	
	
	if($endDate!="" && $endDate!='0' && $endDate !=null)
	{
		//$endDate = strtotime($endDate);
		//$conditionClause .= " AND UNIX_TIMESTAMP(ts.date)<=" . $endDate;
                $endDate =date("y-m-d", strtotime($endDate));
                $conditionClause .= " AND ts.date <='" . $endDate."'";
                
	}
	
	
	
	
	// Value 2 indicates both Billable and Non-billable hence no filtering is required.
	if(is_numeric($isBillable) && $isBillable != '2')
	{
		
		$conditionClause = $conditionClause . " AND ts.billable=" . 	$isBillable;
	}
	
	//echo "Returning the following condition clause:" . $conditionClause . "<br/>";
	
	return 	$conditionClause;
}

	


function getConditionClause($clientId,$projectId,$empId,$deptId,$activityId,$subactivityId,$taskId,$teamId,$companyId,$isBillable,$startDate,$endDate)
{

	$conditionClause = "";

	if(is_numeric($clientId) && $clientId != '0')
	{
		$conditionClause .= " AND ts.clientId=" . 	$clientId;
	}

	if(is_numeric($projectId) && $projectId != '0')
	{
		$conditionClause .= " AND ts.projectId=" . $projectId;
	}

	if(is_numeric($deptId) && $deptId != '0')
	{
		$conditionClause .= " AND ts.deptId=" . $deptId;
	}

	if(is_numeric($activityId) && $activityId != '0')
	{
		$conditionClause .= " AND ts.activityId=" . $activityId;
	}


	if(is_numeric($subactivityId) && $subactivityId != '0')
	{
		$conditionClause .= " AND ts.subactivityId=" . $subactivityId;
	}


	if(is_numeric($taskId) && $taskId != '0')
	{
		$conditionClause .= " AND ts.taskId=" . $taskId;
	}
	
	
	//echo "EmpId is:" . $empId;
	if($empId != 0 || $empId != '0') 
	{
		$conditionClause .= " AND ts.empId='" . $empId . "'";
	}

	
	if(is_numeric($teamId) && $teamId != '0')
	{
		$conditionClause = $conditionClause . " AND ts.teamId=" . 	$teamId;
	}
	
	if(is_numeric($companyId) && $companyId != '0')
	{
		$conditionClause .= " AND ts.companyId=" . 	$companyId;
	}
	
	if($startDate !="" && $startDate !='0' && $startDate !=null )
	{
		$startDate = strtotime($startDate);
		$conditionClause .= " AND UNIX_TIMESTAMP(ts.date)>=" . $startDate;
	}
	
	if($endDate!="" && $endDate!='0' && $endDate !=null)
	{
		$endDate = strtotime($endDate);
		$conditionClause .= " AND UNIX_TIMESTAMP(ts.date)<=" . $endDate;	
	}
	
	
	// Value 2 indicates both Billable and Non-billable hence no filtering is required.
	if(is_numeric($isBillable) && $isBillable != '2')
	{
		
		$conditionClause = $conditionClause . " AND ts.billable=" . 	$isBillable;
	}
	
	//echo "Returning the following condition clause:" . $conditionClause . "<br/>";
	
	return 	$conditionClause;
}

function getClauseToJoinTables()
{
	$clauseToJoinTables = "  ts.activityId=act.activityId AND ts.subactivityId=subact.moduleId AND ts.taskId=task.id AND ts.empId=emp.empId AND ts.projectId=proj.id";
	
	return $clauseToJoinTables;
}

function getSqlQuery($clientId,$projectId,$empId,$deptId,$activityId,$subactivityId,$taskId,$teamId,$companyId,$isBillable,$viewBy,$startDate,$endDate)
{
		

		

		$query = "SELECT comp.name AS companyName,cl.name AS clientName,proj.name AS projectName,emp.empName as employeeName,dept.deptName AS departmentName,act.activityName AS activityName,subact.moduleName AS subactivityName,task.name AS taskName,team.name AS teamName,ts.timeUnits AS timeUnits,ts.billable AS Billable,ts.comments AS Description FROM Timesheet ts LEFT JOIN Company comp ON ts.companyId=comp.id LEFT JOIN Client cl ON ts.clientId=cl.id LEFT JOIN Project proj ON ts.projectId=proj.id LEFT JOIN Employee emp ON ts.empId=emp.empId LEFT JOIN Department dept ON ts.deptId=dept.deptId LEFT JOIN Activity act ON ts.activityId=act.activityId LEFT JOIN SubActivity subact ON ts.subactivityId=subact.moduleId LEFT JOIN Task task ON ts.taskId=task.id LEFT JOIN Team team ON ts.teamId=team.id WHERE 1 " ;
		
		if($_SESSION['uaccesslevel'] == 1)
		{
			//FOR ADMIN
			
			$query = $query . getConditionClause($clientId,$projectId,$empId,$deptId,$activityId,$subactivityId,$taskId,$teamId,$companyId,$isBillable,$startDate,$endDate) . getGroupByClause($viewBy);
		}
		else if($_SESSION['uaccesslevel'] == 2)
		{
			//FOR MANAGER.
			$query = $query . getConditionClauseForManager($clientId,$projectId,$empId,$deptId,$activityId,$subactivityId,$taskId,$teamId,$companyId,$isBillable,$startDate,$endDate) . getGroupByClause($viewBy);
			
		}
		
		return $query;
}


function getGroupByClause($viewBy)
{
	$groupByClause = " ORDER BY date DESC";
	
	switch($viewBy)
	{
		case "" : return "";
		case "company": $groupByClause = " ORDER BY companyName ASC,date DESC"; break;
		case "client": $groupByClause = " ORDER BY clientName ASC,date DESC"; break;
		case "project": $groupByClause = " ORDER BY projectName ASC,date DESC"; break;
		case "team" :  $groupByClause = " ORDER BY teamName ASC,date DESC"; break;
		case "department" : $groupByClause = " ORDER BY departmentName ASC,date DESC"; break;
		case "activity" :  $groupByClause = " ORDER BY activityName ASC,date DESC"; break;
		case "subactivity" : $groupByClause = " ORDER BY subactivityName ASC,date DESC"; break;
		case "task" :  $groupByClause = " ORDER BY taskName ASC,date DESC"; break;
		case "employee" :  $groupByClause = " ORDER BY employeeName ASC,date DESC"; break;
	}
	
	//echo "Group By Clause is:" . $groupByClause . "<br>";
	
	return $groupByClause; 
}
///MAIN THREAD of execution.

function vneGet($paramName)
{
	if(isset($_GET[$paramName]))
	{
		return trim($_GET[$paramName]);
	}
	else
		return "";
}


function defaultVNE($param)
{
	$param = vne($param);
	if($param == NULL || $param == "")
	{
		return '0';
	}
	return $param;
	
}

$startDate = vne("startDate"); 
$endDate = vne("endDate");

$viewBy = defaultVNE("viewBy");

$clientId = defaultVNE("clientId");
$projectId = defaultVNE("projectId");
$empId = defaultVNE("employeeId");
$deptId = defaultVNE("deptId");
$activityId = defaultVNE("activityId");
$subactivityId = defaultVNE("subactivityId");
$taskId = defaultVNE("taskId");
$companyId = defaultVNE("companyId");
$teamId = defaultVNE("teamId");
$isBillable = defaultVNE("isBillable");
$includeDesc = vne("desc");

$query = getSqlQuery($clientId,$projectId,$empId,$deptId,$activityId,$subactivityId,$taskId,$teamId,$companyId,$isBillable,$viewBy,$startDate,$endDate);
//echo $query;
//die;
$_SESSION['report_query']= $query;
$_SESSION['viewBy']= $viewBy;

//echo "Query string is:$query <br/>";
//echo $query . "<br/>";
//die;
//Running the query string and returning back the data set.

$result = executeSelectQuery($query);

$templateStr = '{"companyName":"%s","clientName":"%s","projectName":"%s","employeeName":"%s","departmentName":"%s","activityName":"%s","subactivityName":"%s","taskName":"%s","teamName":"%s","timeUnits":"%s","Billable":"%s"}';

$templateStr1 = '{"companyName":"%s","clientName":"%s","projectName":"%s","employeeName":"%s","departmentName":"%s","activityName":"%s","subactivityName":"%s","taskName":"%s","teamName":"%s","timeUnits":"%s","Billable":"%s","Description":"%s"}';


if(mysql_num_rows($result) > 0)
{
	echo '[{"status":"SUCCESS"}';
	
	while($row = mysql_fetch_assoc($result))
	{
		if($row["Billable"] == 1)
		{
			$row["Billable"] = "Yes";
		}
		else if($row["Billable"] == 0)
		{
			$row["Billable"] = "No";
		}
		
		if($includeDesc == 1)
		{
			$myString = sprintf($templateStr1,str_replace('"', '\"', $row["companyName"]),str_replace('"', '\"', $row["clientName"]),str_replace('"', '\"', $row["projectName"]),str_replace('"', '\"', $row["employeeName"]),str_replace('"', '\"', $row["departmentName"]),str_replace('"', '\"', $row["activityName"]),str_replace('"', '\"', $row["subactivityName"]),str_replace('"', '\"', $row["taskName"]),str_replace('"', '\"', $row["teamName"]),$row["timeUnits"],$row["Billable"],str_replace('"', '\"', $row["Description"]));
		}
		else
		{
			$myString = sprintf($templateStr,str_replace('"', '\"', $row["companyName"]),str_replace('"', '\"', $row["clientName"]),str_replace('"', '\"', $row["projectName"]),str_replace('"', '\"', $row["employeeName"]),str_replace('"', '\"', $row["departmentName"]),str_replace('"', '\"', $row["activityName"]),str_replace('"', '\"', $row["subactivityName"]),str_replace('"', '\"', $row["taskName"]),str_replace('"', '\"', $row["teamName"]),$row["timeUnits"],$row["Billable"]);
		}
		echo "," . $myString;
	}

	echo "]";
}
else
	echo '[{"status":"SUCCESSFUL"}]';

?>