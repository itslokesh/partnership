<?php
session_start();

//DB Connection

$serverName = "partnershipserver.database.windows.net";
$connectionOptions = array(
    "Database" => "Partnership",
    "Uid" => "Lokesh",
    "PWD" => "partnership!23"
);

//Establishes the connection
$con = sqlsrv_connect($serverName, $connectionOptions);
if($con== FALSE)
	die(print_r(sqlsrv_errors(),true));

function signIn($con)
{
  
    $sql="SELECT * FROM users WHERE roll = '" . $_POST["usernamebox"] . "'";
    $count="SELECT count(roll) as name FROM users WHERE roll = '" . $_POST["usernamebox"] . "'";
	$count_result=sqlsrv_query($con,$count);
	$outp= sqlsrv_fetch_array($count_result,SQLSRV_FETCH_ASSOC);
    if ($result=sqlsrv_query($con,$sql))
    {
        $rowcount=$outp['name'];
        $data = sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC);		
        if($rowcount > 0)
        {
            if($data["password"] == $_POST["passwordbox"])
            {
                $_SESSION['username'] = $data["roll"];
                $_SESSION['email'] = $data["email"];
                $_SESSION['name'] = $data["name"];
				$_SESSION['is_admin'] = $data["is_admin"];
                echo "0";
            }else{
                echo "1";
            }
          
        }else
        {
         echo "2";
        }
      //  mysqli_free_result($result);
    }
  
}


if(isset($_POST["signout"]))
{
    unset($_SESSION["username"]);
    unset($_SESSION["email"]);
    unset($_SESSION["name"]);
    echo "0";
}else
{
    signIn($con);
}

