<?php
    session_start();
?>
<nav class="navbar navbar-dark navbar-expand-lg" style="background-color: darkred;">
         <a class="navbar-brand" href="index.php"><img src="static/images/motherbearslogo.png"/></a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <!-- <li class="nav-item">
                   <a href="#" class="btn btn-light">Order Now<span class="sr-only">(current)</span></a>
               </li> -->
               <?php
                  if(!isset($_SESSION['user_id'])){
                     echo '<li class="nav-item">
                         <a id="viewcart_page" href="login.php"  class="btn btn-light">Menu<span class="sr-only">(current)</span></a>
                     </li>';
                  }
                  else {
                    echo ' <li class="nav-item">
                             <a id="menu_page" href="menu.php"  class="btn btn-light">Menu<span class="sr-only">(current)</span></a>
                         </li>';
                  }
               ?>
               <li class="nav-item">
                   <a href="#"  class="btn btn-light">Specials<span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                   <a href="#"  class="btn btn-light">About Us<span class="sr-only">(current)</span></a>
               </li>
               <?php
                if(!isset($_SESSION['order_type_selected'])){
                       echo '<li class="nav-item">
                           <a id="viewcart_page" href="select_order_type.php"  class="btn btn-light">View Cart<span class="sr-only">(current)</span></a>
                       </li>';
                    }
                   else if(isset($_SESSION['order_type_selected'])){
        			         echo '<li class="nav-item">
                           <a id="viewcart_page" href="checkout.php"  class="btn btn-light">View Cart<span class="sr-only">(current)</span></a>
                       </li>';
                    } else {
                      echo '<li class="nav-item">
                           <a id="viewcart_page" href="select_order_type.php"  class="btn btn-light">View Cart<span class="sr-only">(current)</span></a>
                       </li>';
                    }
               ?>
               <?php
                   if(!isset($_SESSION['first_name'])){
                    echo '<li class="nav-item">
                            <a id="signin_page" href="login.php"  class="btn btn-light">Sign In<span class="sr-only">(current)</span></a>
                          </li>
                          <li class="nav-item">
                              <a id="register_page" href="register.php"  class="btn btn-light">Register<span class="sr-only">(current)</span></a>
                          </li>';
                   }
               ?>
            </ul>
         </div>
      </nav>