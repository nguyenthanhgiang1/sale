<?php
session_start();
if(!$_SESSION['level']==1){
    header('location:/sale/login.php');
}
?>
<nav class="navbar navbar-expand  bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/sale">Navbar</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>


    




  </div>









</nav>