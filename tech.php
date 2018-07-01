<?php
$myObj->heading = "John";
$myObj->owner = "owner1";
$myObj->description = "sdf fds fsdf sdf sdfsf sdf sfs fsf sf sf sf sdf sdf sdf sf sdf dsf sfsdfdsfsd fsdfds fsd fs f dsfsf";
$myObj->tags = array("tag1", "tag2", "tag3");
$myObj->nooflikes = 10;
$myJSON = json_encode($myObj);

echo $myJSON;
?>