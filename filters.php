<?php

$myObj->filters = array($_POST["tech"],$_POST["tech"], $_POST["tech"], "f3");
$myJSON = json_encode($myObj);

echo $myJSON;
?>