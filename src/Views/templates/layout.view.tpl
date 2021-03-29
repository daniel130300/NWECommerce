<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{SITE_TITLE}}</title>
  <link href="public/css/style.css" rel="stylesheet">  
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
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
        <a class="navbar-brand" href="#">
          {{SITE_TITLE}}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=index"><i class="fas fa-home mx-2"></i>Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=index"><i class="fas fa-list-alt mx-2"></i>Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=sec_login"><i class="fas fa-sign-in-alt mx-2"></i>Iniciar sesión</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?page=sec_register">Regístrate</a>
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
    <!-- /.container -->
  </footer>
  <!-- Bootstrap core JavaScript -->
  <script src="public/vendor/jquery/jquery.min.js"></script>
  <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  {{foreach EndScripts}}
    <script src="{{this}}"></script>
  {{endfor EndScripts}}
</body>
</html>
