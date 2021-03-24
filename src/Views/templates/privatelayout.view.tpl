<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{SITE_TITLE}}</title>
	<link type="text/css" href="public/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="public/admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="public/admin/css/theme.css" rel="stylesheet">
	<link type="text/css" href="public/admin/images/icons/css/font-awesome.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  {{foreach SiteLinks}}
    <link rel="stylesheet" href="{{this}}" />
  {{endfor SiteLinks}}
  {{foreach BeginScripts}}
    <script src="{{this}}"></script>
  {{endfor BeginScripts}}
</head>
<body>
  <header>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="index.html">
            {{SITE_TITLE}}
            </a>
        </div>
      </div><!-- /navbar-inner -->
    </div><!-- /navbar -->
  
  </header>
  <main>
    <div class="wrapper">
      <div class="container">
        <div class="row">
          <div class="span3">
            <div class="sidebar">
  
              <ul class="widget widget-menu unstyled">
                <li class="active">
                  <a href="index.php?page=index">
                    <i class="menu-icon icon-dashboard"></i>
                    Dashboard
                  </a>
                </li>
                <li>
                  <a href="index.php?page=index">
                    <i class="menu-icon icon-bullhorn"></i>
                    News Feed
                  </a>
                </li>
                <li>
                  <a href="index.php?page=index">
                    <i class="menu-icon icon-inbox"></i>
                    Inbox
                  </a>
                </li>
                
                <li>
                  <a href="index.php?page=index">
                    <i class="menu-icon icon-tasks"></i>
                    Tasks
                  </a>
                </li>
              </ul>
  
              <ul class="widget widget-menu unstyled">
                <li><a href="index.php?page=index"><i class="menu-icon icon-bold"></i> Buttons </a></li>
                <li><a href="index.php?page=index"><i class="menu-icon icon-book"></i>Typography </a></li>
                <li><a href="index.php?page=index"><i class="menu-icon icon-paste"></i>Forms </a></li>
                <li><a href="index.php?page=index"><i class="menu-icon icon-table"></i>Tables </a></li>
                <li><a href="index.php?page=index"><i class="menu-icon icon-bar-chart"></i>Charts </a></li>
              </ul>
  
              <ul class="widget widget-menu unstyled">
                <li>
                  <a class="collapsed" data-toggle="collapse" href="#togglePages">
                    <i class="menu-icon icon-cog"></i>
                    <i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
                    More Pages
                  </a>
                  <ul id="togglePages" class="collapse unstyled">
                    <li>
                      <a href="index.php?page=index">
                        <i class="icon-inbox"></i>
                        Login
                      </a>
                    </li>
                    <li>
                      <a href="index.php?page=index">
                        <i class="icon-inbox"></i>
                        Profile
                      </a>
                    </li>
                    <li>
                      <a href="index.php?page=index">
                        <i class="icon-inbox"></i>
                        All Users
                      </a>
                    </li>
                  </ul>
                </li>
                
                <li>
                  <a href="index.php?page=index">
                    <i class="menu-icon icon-signout"></i>
                    Logout
                  </a>
                </li>
              </ul>
            </div><!--/.sidebar-->
          </div><!--/.span3-->

          <div class="span9">
            <div class="content">
              {{{page_content}}}
            </div><!--/.content-->
          </div><!--/.span9-->
        </div>
      </div><!--/.container-->
    </div><!--/.wrapper-->
  </main>
  <footer>
    <div>Todo los Derechos Reservados 2021 &copy;</div>
  </footer>
  {{foreach EndScripts}}
    <script src="{{this}}"></script>
  {{endfor EndScripts}}
  <script src="public/admin/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="public/admin/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
  <script src="public/admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="public/admin/scripts/flot/jquery.flot.js" type="text/javascript"></script>
  <script src="public/admin/scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
  <script src="public/admin/scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
  <script src="public/admin/scripts/common.js" type="text/javascript"></script>
</body>
</html>
