<?php
session_start();
$serverName = "partnershipserver.database.windows.net";
$connectionOptions = array(
    "Database" => "Partnership",
    "Uid" => "Lokesh",
    "PWD" => "partnership!23"
);
$con = sqlsrv_connect($serverName, $connectionOptions);
if($con== FALSE)
	die(print_r(sqlsrv_errors(),true));


 
function postProject($con)
{
 $projecttitle = $_POST['projecttitle'];
 $projectdesc = $_POST['projectdesc'];
 $projectadv = $_POST['projectadv'];
 $projectcoowner = $_POST['projectcoowner'];
 $leader = $_SESSION['username'];
 $startdate = $_POST['startdate'];
 $enddate = $_POST['enddate'];
 $idealdesc = $_POST['idealdesc'];
 $technologiesarray = $_POST['technologiesarray'];
 $tags=$_POST['tags'];
 
 $sql="INSERT INTO project (title, description, leader, s_date, e_date,tags,is_published) VALUES ('" . $projecttitle . "', '" . $projectdesc . "', '" . $leader . "', '2018-02-14', '2018-02-23','".$tags."',0);";
 if ($result=sqlsrv_query($con,$sql))
    {
        echo "0";
    }else
    {
        echo sqlsrv_errors();
		echo "@34";
    }
 $current_project=sqlsrv_query($con,"select id from project where '".$projecttitle."' like title;");
 $current_project=sqlsrv_fetch_array($current_project,SQLSRV_FETCH_ASSOC);
 $technologiesparts=explode(",",$technologiesarray);
 foreach($technologiesparts as $techparts){
	if(!isset($techparts[0]))
		break;
	$tech=explode(":",$techparts);
	$sql="Exec project_tech_requirement '".$current_project."', '".$tech[0]."', '".$tech[1]."', '".$tech[2]."';";
	$result=sqlsrv_query($con,$sql);
 }
 $projectcoowner=explode(",",$projectcoowner);
 foreach($projectcoowner as $coowner){
    $sql="insert into co_owner '".$coowner."','".$current_project."';";
	$result=sqlsrv_query($con,$sql);
 }
	$destination_id=sqlsrv_query($con,"select id from Destination_set where '".$idealdesc."' like destination_name;");
	$destination_id=sqlsrv_fetch_array($destination_id,SQLSRV_FETCH_ASSOC);	
	$sql="insert into destination '".$destination_id."','".$current_project."';";
	$result=sqlsrv_query($con,$sql);
}

postProject($con);

