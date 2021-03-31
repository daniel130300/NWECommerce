<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{SITE_TITLE}}</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="public/css/style.css" rel="stylesheet">  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


  {{foreach SiteLinks}}
    <link rel="stylesheet" href="{{this}}" />
  {{endfor SiteLinks}}
  {{foreach BeginScripts}}
    <script src="{{this}}"></script>
  {{endfor BeginScripts}}
</head>
<body>
  <header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">{{SITE_TITLE}}</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

            {{foreach NAVIGATION}}
            <li class="nav-item">
              <a class="nav-link" href="{{nav_url}}">{{if nav_icon}}<i class="{{nav_icon}}"></i>{{endif nav_icon}}{{nav_label}}</a>
            </li>
            {{endfor NAVIGATION}}
            
          <ul class="navbar-nav">
            <!-- PROFILE DROPDOWN - scrolling off the page to the right -->
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navDropDownLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-user mx-2"></i>
                  {{with login}}
                    {{userName}}
                  {{endwith login}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navDropDownLink">
                    <a class="dropdown-item" href="index.php?page=sec_logout"> <i class="fas fa-sign-out-alt mx-2"></i>Salir</a>
                </div>
            </li>
        </ul>
        </div>
      </div>
    </nav>
  </header>
  <main>
  {{{page_content}}}
  </main>
  <footer class="py-4 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Todo los Derechos Reservados 2021</p>
    </div>
  </footer>

  <script src="public/vendor/jquery/jquery.min.js"></script>
  <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  {{foreach EndScripts}}
    <script src="{{this}}"></script>
  {{endfor EndScripts}}
</body>
</html>
