function signIn(){
    var username = $("#usernamebox").val();
    var password = $("#passwordbox").val();

    $.ajax({
        url: "authentication.php",
        data: {
            usernamebox: username,
            passwordbox: password,
        },
        type: 'POST',
        success: function(result){
            if(result == "0") {
                location.reload();
            }else if(result == "1") {
                $("#signin_validation_text").html('<div class="alert alert-danger" role="alert">Password mismatch</div>');    
            }else if(result == "2") {
                $("#signin_validation_text").html('<div class="alert alert-danger" role="alert">Username not found</div>');    
            }
            
        }
    });

}

function updateFilterChanges()
{
	var selectedFilter = $("#filterbox").val();

	window.location = "?filter=" + selectedFilter;
}

function signOut(){

    $.ajax({
        url: "authentication.php",
        data: {
            signout: "true"
        },
        type: 'POST',
        success: function(result){
            if(result == "0") {
                location.reload();
            }
        }
    });
}


$( document ).ready(function() {
    
    $('#startdate').datepicker({
    });
    $('#enddate').datepicker({
    });

});

var lastTechnolodyId = 1;

function addtechnologyitem(){

    $("#technologygroup").append('<div class="form-row">\
    <div class="form-group col-md-7">\
      <select id="technologyName' + lastTechnolodyId + '" class="form-control">\
        <option selected>Select</option>\
      </select>\
    </div>\
    <div class="form-group col-md-4">\
    <select id="technologyHours' + lastTechnolodyId + '" class="form-control">\
        <option selected>Select</option>\
        <option value="1">1</option>\
        <option value="2">2</option>\
        <option value="3">3</option>\
        <option value="4">4</option>\
        <option value="5">5</option>\
        <option value="6">6</option>\
        <option value="7">7</option>\
        <option value="8">8</option>\
        <option value="9">9</option>\
        <option value="10">10</option>\
        <option value="11">11</option>\
        <option value="12">12</option>\
        <option value="13">13</option>\
        <option value="14">14</option>\
        <option value="15">15</option>\
        <option value="16">16</option>\
        <option value="17">17</option>\
        <option value="18">18</option>\
        <option value="19">19</option>\
        <option value="20">20</option>\
        <option value="21">21</option>\
        <option value="22">22</option>\
        <option value="23">23</option>\
        <option value="24">24</option>\
        <option value="25">25</option>\
        <option value="26">26</option>\
        <option value="27">27</option>\
        <option value="28">28</option>\
        <option value="29">29</option>\
        <option value="30">30</option>\
        <option value="31">31</option>\
      </select>\
    </div>\
    <div class="form-group col-md-1">\
      <button class="btn btn-primary btn-primary" type="submit"  onclick="addtechnologyitem()"><i class="fas fa-plus" style="color:white;"></i></button>\
    </div>\
    <div class="form-group col-md-12">\
    <input type="text" class="form-control" id="technologydescription' + lastTechnolodyId + '" placeholder="Description">\
    </div>\
  </div>');

    
    var categorycontents = $("#hiddencategories").html();
    $("#technologyName" + lastTechnolodyId).append(categorycontents);

    lastTechnolodyId += 1;

}








function processProjectSubmission(){
    
    var var_projecttitle = $("#projecttitle").val();
    var var_projectdesc = $("#projectdesc").val();
    var var_projectadv = $("#projectadv").val();
    var var_projectcoowner = $("#projectcoowner").val();
    var var_startdate = $("#startdate").val();
    var var_enddate = $("#enddate").val();
    var var_idealdesc = $("#idealdesc").val();
    var var_technologiesarray = $("#technologiesarray").val();
	var var_tags=$("#tags").val();

    var var_techno = "";

    for(var i = 0; i < lastTechnolodyId; i++)
    {
        var_techno += $("#technologyName" + i).val() + ":" + $("#technologyHours" + i).val() + ":" + $("#technologydescription" + i).val() + ",";
    }


    $.ajax({
        url: "postproject.php",
        data: {
            projecttitle: var_projecttitle,
            projectdesc: var_projectdesc,
            projectadv: var_projectadv,
            projectcoowner: var_projectcoowner,
            startdate: var_startdate,
            enddate: var_enddate,
            idealdesc: var_idealdesc,
            technologiesarray: var_techno,
			tags: var_tags

        },
        type: 'POST',
        success: function(result){
            if(result == "0") {
                location.reload();
            }else{
                $("#postproject_validation_text").html(result);
            }
            
        }
    });


    //var technologyName0 = $("#usernamebox").val();
    //var technologyHours0 = $("#usernamebox").val();
}

	
	
function showfull(event){ 

    var elem = $(event).prev();

    if($(elem).hasClass("prestrict"))
    {
        elem.removeClass("prestrict");
        $(event).html("Show Less");
    }else{
        elem.addClass("prestrict");
        $(event).html("Show More");
    }
        

}
