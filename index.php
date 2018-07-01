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

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Partnership</title>
<link rel="stylesheet" href="lib/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="lib/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="lib/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<script defer src="lib/fontawesome-free-5.0.6/svg-with-js/js/fontawesome-all.js"></script>
</head>

<body>


<?php

function createUser($con){
    
    $sql="INSERT INTO users (email,roll,name,dept,password) VALUES ('" . $_POST["email"] . "', '" . $_POST["username"] . "', '" . $_POST["name"] . "', '" . $_POST["department_name"] . "', '" . $_POST["password"] . "');";
        
    if ($result=sqlsrv_query($con,$sql))
    {
        echo '<div class="alert alert-success" role="alert">
        Registration Successful!
      </div>';
    }
    
}

function getNumberOfProjects($con)
{
    $sql="SELECT count(*) as count FROM project";
    
    if ($result=sqlsrv_query($con,$sql))
    {
		$result= sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC);
        $rowcount=$result['count'];
       // mysqli_free_result($result);
    }

    return $rowcount;
}
function getNumberOfPProjects($con)
{
    $sql="SELECT count(*) as count FROM project where is_published=1";
    
    if ($result=sqlsrv_query($con,$sql))
    {
		$result= sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC);
        $rowcount=$result['count'];
       // mysqli_free_result($result);
    }

    return $rowcount;
}
function getNumberOfContributors($con)
{
$sql="SELECT count(distinct(roll)) as count FROM contributor";
    
    if ($result=sqlsrv_query($con,$sql))
    {
		$result= sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC);
        $rowcount=$result['count'];
       // mysqli_free_result($result);
    }

    return $rowcount;}

function getCategories($con)
{
    $sql="SELECT * FROM technology_set";
    
    if ($result=sqlsrv_query($con,$sql))
    {
        while($row=sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC))
        {
            echo "<option>" . $row['tech_name'] . "</option>";
        }

        //mysqli_free_result($result);
    }

    return $row;
}
function getIdealDestination($con)
{
  $sql = "SELECT * FROM destination_set";
  if ($result=sqlsrv_query($con,$sql))
  {
      while($row=sqlsrv_fetch_array($result,SQLSRV_FETCH_ASSOC))
      {
          echo "<option>" . $row['destination_name'] . "</option>";
      }

      //mysqli_free_result($result);
  }

  return $row;

}

if(isset($_POST['user_register_button']))
{
    createUser($con);
}
?>

<!-- NAV BAR -->
<form action="" method="get">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<a class="navbar-brand" href="#">Partnership</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarText">


  
  <ul class="navbar-nav mr-auto" style="width:100%;">
    
  <div class="input-group m-auto w-75">
  <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-search"></i></div>
        </div>
    <input class="form-control m-auto w-75 searchbar" name="search" type="search" placeholder="Search Projects" aria-label="Search" >
  
</div>
    </ul>


  <span class="navbar-text">
  <?php
  if(!isset($_SESSION["username"]))
  {
    echo '<button class="btn btn-outline-light" type="button" data-toggle="modal" data-target="#signinform">Sign In</button>';
  }
  ?>
  
  </span>
</div>
</nav>
	</form>
<!-- MAIN PAGE -->

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 leftsidebar">
        <button type="button" class="btn btn-success btn-lg btn-block mt-3"  data-toggle="modal" data-target="#modalproject">Post a Project</button>
        <hr>
		<h5>Filter By</h5>
        <select class="form-control form-control-md" id="filterbox" onchange="onSelectFilter(this.value);">
        <option>All Categories</option>
		<option value="filter1"> filter 1</option>
        <option value="filter2"> filter 2</option>
		<option value="filter3"> filter 3</option>
		<option value="filter4"> filter 4</option>
		<option value="filter5"> filter 5</option>
        </select>
		
		
        <div id = "newFilter">
		</div>
       
        </div>
        <div class="col-md-7 centerbar mt-4">
        <h5>ALL PROJECTS</h5>
        <hr>
        <ul class="nav nav-tabs">
    <li class="nav-item">
    <a class="nav-link <?php if(isset($_GET['published']) || (!isset($_GET['popular']) && !isset($_GET['admin']))){echo 'active';} ?>" href="?published=true">PUBLISHED PROJECTS</a>
    </li>
    <li class="nav-item">
    <a class="nav-link <?php if(isset($_GET['popular'])){echo 'active';} ?>" href="?popular=true">Popular</a>
    </li>
	<?php ?>
	<?php
	$temp  = "";
	if(isset($_GET['admin'])){$temp = 'active';} 
	if(isset($_SESSION["is_admin"])){
		echo '<li class="nav-item">
		<a class="nav-link '  . $temp . '" href="?admin=true">UNPUBLISHED PROJECTS</a>
		</li>';
	}
	?>
    </ul>

        <div class="row p-3">
            <div class="col-md-12">
				<?php
				if(isset($_GET['filter'])){
					$all_projects=sqlsrv_query($con,"select * from project where is_published=1 and tags like '%" . $_GET['filter'] . "%';");
				}elseif(isset($_GET['search']))
				{
					$all_projects=sqlsrv_query($con,"select * from project where is_published=1 and title like '%" . $_GET['search'] . "%';");
				}elseif(isset($_GET['admin']) && isset($_SESSION["is_admin"])){
					$all_projects=sqlsrv_query($con,"select * from project where is_published=0;");
				}elseif(isset($_GET['popular']))
				{
					$all_projects=sqlsrv_query($con,"select * from project where is_published=1;");
				}else
				{
					$all_projects=sqlsrv_query($con,"select * from project where is_published=1;");
				}
				
                while ($al_projects = sqlsrv_fetch_array($all_projects, SQLSRV_FETCH_ASSOC)) {					
                $heading = $al_projects['title'];
                $description = $al_projects['description'];
                $owner = $al_projects['leader'];
                $nooflikes = '10';
                $tags = $al_projects['tags'];

                $tagparts = explode(",", $tags);

                $tagelements = "";

                foreach($tagparts as $tagpartscomp)
                {
                  $tagelements .= '<span class="badge badge-pill badge-secondary mr-1">' . $tagpartscomp . '</span>';
                }

                echo '<div><h3><img src="src/placeholder.png" class="rounded-circle project-image">' . $heading . '</h3></div>
                <div><h5>Project Owner: <small>' . $owner . '</small></h5></div>
                <div class="prestrict">' . $description . '</div>
                <button type="button" class="btn btn-link readmorespecial" onclick="showfull(this);">Show More</button>
               
                <div>' . $tagelements . '</div><br>
                <button type="button" class="btn btn-primary">
                Likes <span class="badge badge-light">' . $nooflikes . '</span>
                </button>
                <hr>';
				}
                ?>	
            </div>
        </div>

       
        </div>
        <div class="col-md-2 rightsidebar">
            <?php 
            if(isset($_SESSION["username"]))
            {
              echo "<small class='mt-2'>Logged in as</small>";
              echo "<h6>" . $_SESSION["name"] . "</h6>";
              echo '<p>
              <button class="btn btn-dark settingsbutton" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
              <i class="fas fa-cog"></i>
              </button>
                    </p>
            <div class="collapse" id="collapseExample">
              

              <div class="list-group">
            
              <a href="#" class="list-group-item list-group-item-action">Update Profile</a>
              <a href="#" class="list-group-item list-group-item-action" onclick="signOut()">Sign Out</a>
            </div>
              
            </div>';
              
            }
            ?>
            <div class="counter-blue mt-3">
            SUBMITTED PROJECTS<h1><?php echo getNumberOfProjects($con); ?></h1>
            </div>
			<div class="counter-blue mt-3">
            PUBLISHED PROJECTS<h1><?php echo getNumberOfPProjects($con); ?></h1>
            </div>
            <div class="counter-green mt-3">
            NUMBER OF CONTRIBUTIONS<h1><?php echo getNumberOfContributors($con); ?></h1>
            </div>
        </div>
    </div>
</div>




<!-- Modal SignInForm -->
<div class="modal fade" id="signinform" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sign In</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" name="usernamebox" id="usernamebox" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">Username is your roll number</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="passwordbox" id="passwordbox" placeholder="Password">
  </div>


  Don't have an account yet? 

  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm ml-2" data-dismiss="modal" data-toggle="modal" data-target="#modalregister">
  Register
</button>


      <div id="signin_validation_text"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" name="user_signin_button" class="btn btn-primary" onclick="signIn()">Login</button>
        
      </div>
      
    </div>
  </div>
</div>



<!-- Modal Register -->
<div class="modal fade" id="modalregister" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form action="" method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Roll number">
    <small id="emailHelp" class="form-text text-muted">Username is your roll number</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Last">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Department Name</label>
    <input type="text" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Department Name" disabled>
  </div>
  <input type="hidden" name="department_name" value="AMCS">
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
  </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" name="user_register_button">Register</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- POST PROJECT MODAL -->
<!-- POST PROJECT MODAL -->
<div class="modal fade" id="modalproject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">New Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Title</label>
      <input type="text" class="form-control" id="projecttitle" placeholder="Project Title" >
    </div>
  </div>
  <div class="form-group">
  <label for="exampleFormControlTextarea1">Description</label>
  <textarea class="form-control" id="projectdesc" rows="3" placeholder="Description of the Project"></textarea>
</div>
  <div class="form-group">
    <label for="inputAddress2">Project Advisor</label>
    <input type="text" class="form-control" id="projectadv" placeholder="Roll No. of Project Advisor" >
  </div>
  <div class="form-group">
    <label for="inputAddress2">Co-Owners</label>
    <input type="text" class="form-control" id="projectcoowner" placeholder="Roll No's of Co-Owners" >
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputAddress2">Start date</label>
    <input type="text" class="form-control" id="startdate" placeholder="mm/dd/yy">
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress2">End date</label>
    <input type="text" class="form-control" id="enddate" placeholder="mm/dd/yy">
  </div>
  </div>
    <div class="form-group">
      <label for="inputEmail4">Ideal Destination</label>
      <select id="idealdesc" class="form-control">
        <option selected>Select</option>
        <?php
        getIdealDestination($con);
        ?>
      </select>
      <!--input- type="text" class="form-control" id="idealdesc" placeholder="Apartment, studio, or floor" -->
    </div>

    <div class="form-group">
      <label for="inputEmail4">Github Link</label>
      <input type="text" class="form-control" id="github" placeholder="Link to Github Account" >
    </div>

    <div class="form-group">
      <label for="inputEmail4">References</label>
      <input type="text" class="form-control" id="references" placeholder="Link to Resources" >
    </div>

    <div class="form-group">
      <label for="inputEmail4">Project Tags</label><br>
      <input type="text" class="form-control tagsinputcontainer" id="tags" placeholder="" data-role="tagsinput">
    </div>

    <div class="form-row">
    <div class="col-md-7 p-2">
    <span>Technology</span>
      
    </div>
    <div class="col-md-4 p-2">
      <span>No. of Hours</span>
      
    </div>
    <div class="col-md-1 p-2">
      
    </div>
  </div>

  <div id="technologygroup">
  <div class="form-row">
    <div class="form-group col-md-7">
      
      <select id="technologyName0" class="form-control">
        <option selected>Select</option>
        <?php
        getCategories($con);
        ?>
      </select>
    </div>
    <div class="form-group col-md-4">
      
      <select id="technologyHours0" class="form-control">
        <option selected>Select</option>
        <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>
        
      </select>
    </div>
    
    
    <div class="form-group col-md-1">
      <button class="btn btn-primary btn-primary" type="submit"  onclick="addtechnologyitem()"><i class="fas fa-plus" style="color:white;"></i></button>
    </div>
    <div class="form-group col-md-12">
      <input type="text" class="form-control" id="technologydescription0" placeholder="Description">
    </div>
  </div>
  </div>
  


      </div>
      <div id="postproject_validation_text"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="processProjectSubmission()">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- HIDDEN DROPDOWN FIELD -->
<div id="hiddencategories" style="display:none";>
<?php
getCategories($con);
?>
</div>
<script>
function onChangeFilter(value){
	$.ajax({
	  dataType: "json",
	  url: "tech.php",
	  dataType: 'json',
	  data: value,
	  success: function(result){
				str = "<div><h3><img src='src/placeholder.png' class='rounded-circle project-image'>" +result["heading"]+ "</h3></div>";
                str += "<div><h5>Project Owner: <small>" + result["owner"] + "</small></h5></div>";
                str += "<div class='prestrict'>" + result["description"] + "</div>";
                str += "<button type='button' class='btn btn-link readmorespecial' onclick='showfull(this);'>Show More</button>";
               
                str += "<div>" + result["tags"] + "</div><br>";
                str += "<button type='button' class='btn btn-primary'>";
                str += "Likes <span class='badge badge-light'>" + result["nooflikes"] + "</span>";
                str += "</button> <hr>";
				$("#div1").html(str);
				//a = JSON.parse(result);
				//console.log(result["owner"]);
			}
	});
}
function onSelectFilter(value){
	$.ajax({
	  dataType: "json",
	  url: "filters.php",
	  type:"POST",
	  dataType: 'json',
	  data: {"tech":value},
	  success: function(result){
				str = "<h5>Categories</h5>";
				str += "<select class='form-control form-control-md' id='filterbox' onchange='onChangeFilter(this.value);'>";
				str += "<option value ='all'>All Categories</option>";
				var  count = result["filters"].length;
				for(var i=0;i<count;i++){
					str += "<option value='"+ result["filters"][i]+"' >"+ result["filters"][i] +"</option>";
				}
				str += "</select>";
				$("#newFilter").html(str);
				//a = JSON.parse(result);
				//console.log(result["owner"]);
			}
	});
}
</script>
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="lib/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="lib/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

<script src="script.js"></script>
</body>

</html>