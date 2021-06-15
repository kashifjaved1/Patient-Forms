<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <title>Modified Push Menu</title>

<style>
body {
  margin: 0;
  padding: 0;
  font-family: "Helvetica", "Arial", sans-serif;
  font-weight: 500;
  font-style: normal;
  font-size: 12px;
  line-height: 1.5;
}
.navbar-default {
  background-color: #ffffff;
}
.navbar {
  min-height: 65px;
  padding-top: 5px;
  margin-bottom: 0px;
  border-bottom: solid 2px #eee;
}
.navbar-header {
  margin-top: -12px;
}
.navbar-brand {
  padding-top: 0px !important;
}
/* for button placement*/

.navbar-toggle {
  margin-top: 26px;
}
/*for collapsed navbar*/

.navbar-collapse {
  margin-top: 12px;
}
.site-logo {
  max-width: 135px;
  min-width: 120px;
}
.navbar-default .navbar-nav > li > a {
  text-transform: uppercase;
  background-color: #ffffff !important;
  color: #333333;
}
.navbar-default .navbar-nav > li > a:hover {
}
.navbar-default .navbar-nav>li>a:hover,
.navbar-default .navbar-nav>.active>a,
.navbar-default .navbar-nav>.active>a:focus,
.navbar-default .navbar-nav>.active>a:hover {
}
.nav>li {
  position: static !important;
}
/* For navbar dropdown*/

.navbar .dropdown-menu {
  min-width: 1349px;
  width: 100%;
  height: 120px;
  margin-top: 51px;
  z-index: 1;
  left: 0;
  text-align: center;
  padding-right: 10px;
  position: absolute;
  list-style-type: none;
  border-top: 2px solid #ff5d1c;
  border-bottom: 2px solid #333333;
  border-right: #ffffff;
  border-radius: 0;
  box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
  border-left: 0;
}
.dropdown-menu {
  padding-left: 10px;
  padding-right: 10px;
  position: relative;
  list-style-type: none;
}
.navbar .dropdown-menu li {
  margin: 0;
  padding: 0;
  display: inline-block;
}
.dropdown-menu > li > a {
  line-height: 75px;
  padding: 3px;
}
.dropdown-menu > li > a:hover {
  color: #333333 !important;
}
.dropdown-menu > li > a:hover {
  color: #ffffff;
  background-color: #337ab7;
}
.m-pub {
  display: inline-block;
  margin: 3px 40px 0;
  font-size: 13px;
  font-weight: 400;
  text-transform: uppercase;
  letter-spacing: .14em;
  color: white;
  -webkit-transition: none;
  -moz-transition: none;
  -ms-transition: none;
  -o-transition: none;
  transition: none;
  position: relative;
}
.m-pub:after,
.m-pub:focus {
  color: #ffffff;
  background-color: #337ab7;
}
.dropdown-menu li .m-pub:hover:after {
  content: '';
  position: absolute;
  left: 50%;
  margin-left: -10px;
  margin-top: 55px;
  border-left: 0;
  border-bottom: 17px solid transparent;
  border-top: 17px solid transparent;
  border-left: 14px solid #333333;
  transform: rotate(-90deg);
  background: none;
}
nav.navbar.open {
  margin-bottom: 120px;
}
</style>

</head>
<body>
<div style="margin-top: 15%; height: 310px; width: 500px; border: 1px solid #ccc; overflow: auto;">

<nav class="navbar navbar-default" style="width: 30%; float: right;">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav" id="nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="menu-trigger">Drop-Down Menu<i class="fa fa-angle-down flipped"></i></a>
            <ul class="dropdown-menu" id="menu">
              <li class="nav-link">
                <a href="#" class="m-pub"><i class="fa fa-microphone fa-2x"></i>Option</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<div class="container">
    <div class="nav navbar-nav" id="nav">

    </div>
</div>
  
  </div>
  
</div>

</body>

</html>
<script>
$("li.dropdown").click(function() {
  $("nav.navbar").toggleClass("open");
});
</script>