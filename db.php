<?php

$serverName = "partnershipserver.database.windows.net";
$connectionOptions = array(
    "Database" => "Partnership",
    "Uid" => "Lokesh",
    "PWD" => "partnership!23"
);

//Establishes the connection
$conn = sqlsrv_connect($serverName, $connectionOptions);
if($conn== FALSE)
	die(print_r(sqlsrv_errors(),true));
$query="select * from Status";
$result=sqlsrv_query($conn,$query);
if ($result == false)
    echo (sqlsrv_errors());
else{
	while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
		echo $row['id']."    ".$row['status'];
	}
	echo"asdf";

}
?>