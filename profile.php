<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Partnership</title>
  <link rel="stylesheet" href="./lib/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./styles.css">
  <link rel="stylesheet" href="./lib/bootstrap-datepicker/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="./lib/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  <link rel="stylesheet" href="./Sheldon/reset.css">
  <!--[if lt IE 9]> 
	<link rel="stylesheet" href="css/cv.css" media="screen">
<![endif]-->
  <link rel="stylesheet" media="screen and (max-width:480px)" href="./Sheldon/mobile.css">
  <link rel="stylesheet" media="screen and (min-width:481px)" href="./Sheldon/cv.css">
  <link rel="stylesheet" media="print" href="./Sheldon/print.css">


  <script defer src="./lib/fontawesome-free-5.0.6/svg-with-js/js/fontawesome-all.js"></script>
</head>

<body>




  <!-- NAV BAR -->
  <form action="" method="get">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="#">Partnership</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">



        <ul class="navbar-nav mr-auto" style="width:100%;">

          <div class="input-group m-auto w-75">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <i class="fas fa-search"></i>
              </div>
            </div>
            <input class="form-control m-auto w-75 searchbar" name="search" type="search" placeholder="Search Projects" aria-label="Search">

          </div>
        </ul>


        <span class="navbar-text">


        </span>
      </div>
    </nav>
  </form>
  <!-- MAIN PAGE -->

  <div class="container-fluid">
    <div class="row">

      <!-- Header -->
      <header role="banner">
        <div>
          <hgroup>
            <h1>Sheldon COOPER</h1>
            <h2>Physicien surdoué - Geek qualifié</h2>
          </hgroup>

          <figure>
            <img src="./Sheldon/avatar.jpg" alt="Sheldon COOPER">
          </figure>
        </div>
      </header>

      <!-- Contact -->
      <section class="contactform clearfix">
        <div class="container_16">
          <h3>Contactez-moi</h3>
          <p>Remplissez le formulaire ci-dessous afin de m'envoyer un message. Je vous répondrais dans les plus bref délai.
            <br>
            <em>Tous les champs sont requis.</em>
          </p>
          <form novalidate="novalidate" method="post" action="#" name="contact" class="grid_16">
            <p class="grid_10">
              <textarea name="message" placeholder="Votre message" class="required"></textarea>
            </p>
            <p class="grid_6">
              <input name="nom" placeholder="Nom - Prénom" class="required" type="text">
              <input name="email" placeholder="Adresse email" class="required" type="email">
              <input name="envoi" value="Envoyer le message" class="required" type="submit">
              <span class="messageform"></span>
            </p>
          </form>
        </div>
      </section>

      <!-- Corps -->
      <section role="main" class="container_16 clearfix">
        <div class="grid_16">
          <!-- A propos -->
          <div class="grid_8 apropos">
            <h3>A propos</h3>
            <p>Cette section vous sert de présentation.</p>
            <p>Pellentesque nec nisi at sapien sagittis sagittis. Aliquam eu condimentum mauris. Proin accumsan enim at risus
              hendrerit lobortis. Nunc sollicitudin sodales lectus, et rhoncus mi molestie hendrerit. Vestibulum velit lorem,
              rhoncus a congue ultricies, faucibus facilisis risus. Mauris turpis ante, aliquet ac venenatis at, ornare ut
              velit. Duis ut erat neque, eget consectetur tellus. </p>
          </div>

          <!-- Compétences -->
          <div class="grid_8 competences">
            <h3>Compétences</h3>
            <ul class="barres">
              <li data-skills="80">Compétences 1
                <span style="width: 80%;"></span>
              </li>
              <li data-skills="60">Compétences 2
                <span style="width: 60%;"></span>
              </li>
              <li data-skills="75">Compétences 3
                <span style="width: 75%;"></span>
              </li>
              <li data-skills="40">Compétences 4
                <span style="width: 40%;"></span>
              </li>
              <li data-skills="95">Compétences 5
                <span style="width: 95%;"></span>
              </li>
            </ul>
          </div>
        </div>

        <!-- Expériences -->
        <div class="grid_16 experiences">
          <h3>Expériences</h3>
          <ul>
            <li>
              <h4>
                <strong>Nom du poste</strong> chez nom de l'employeur</h4>
              <span class="lieu">Lieu</span>
              <span class="dates">Dates</span>
              <p>Une petite description du poste, décrivez votre rôle et vos tâches en quelques mots afin que le recruteur en
                sache plus sur la nature de votre travail.</p>
            </li>
            <li>
              <h4>
                <strong>Nom du poste</strong> chez nom de l'employeur</h4>
              <span class="lieu">Lieu</span>
              <span class="dates">Dates</span>
              <p>Une petite description du poste, décrivez votre rôle et vos tâches en quelques mots afin que le recruteur en
                sache plus sur la nature de votre travail.</p>
            </li>
			<li>


				<div style = "width:200px;"><button style= "background-color:#33a4c9;border:0px;"type="button" class="btn btn-success btn-lg btn-block mt-3"  data-toggle="modal" data-target="#modalproject">
				 + Add Experience
				</button>
				</div>
			</li>
          </ul>
        </div>

      
        <!-- Loisirs -->
        <div class="grid_8 loisirs">
          <h3>Loisirs</h3>
          <p>
            <strong>Sports :</strong> si vous en pratiquez</p>
          <p>
            <strong>Association :</strong> si vous êtes membre d'une association</p>
          <p>D'autres loisirs plus vagues, complétez ici.</p>
        </div>

        <!-- Contact -->
        <div class="grid_8 contact">
          <h3>Contact</h3>
          <p>Si mon profil vous intéresse, n'hésitez pas à me contacter :</p>
          <ul>
            <li class="lieu">Paris, France</li>
            <li class="phone">06 00 00 00 00</li>
            <li class="mail">
              <a href="mailto:mon.adresse@email.fr">mon.adresse@email.fr</a>
            </li>
            <li class="site">
              <a href="http://www.mon-site.fr/">www.mon-site.fr</a>
            </li>
            <li class="form">
              <a class="toContactform">via le formulaire de contact</a>
            </li>
            <li class="form">
              <a class="toContactform">via le formulaire de contact</a>
            </li>
          </ul>
        </div>
      </section>


    </div>
  </div>


<div class="modal fade" id="modalproject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Experience</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputEmail4">Title</label>
      <input type="text" class="form-control" id="projecttitle" placeholder="Experience" >
    </div>
  </div>
  <div class="form-group">
  <label for="exampleFormControlTextarea1">Description</label>
  <textarea class="form-control" id="projectdesc" rows="3" placeholder="Description of the experience"></textarea>
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
   
  


      </div>
      <div id="postproject_validation_text"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="processProjectSubmission()">Save changes</button>
      </div>
    
  </div>
</div>


  <script src="./lib/jquery/jquery.min.js"></script>
  <script src="./lib/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="./lib/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
  <script src="./lib/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

  <!-- Scripts JavaScript -->
  <script src="./Sheldon/jquery-1.js"></script>
  <script src="./Sheldon/validate.js"></script>
  <!--[if lt IE 9]>
<script src="scripts/placeholder.js"></script>
<![endif]-->
  <script src="./Sheldon/plugins.js"></script>

  <script src="./script.js"></script>
</body>

</html>