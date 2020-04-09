<?php 

function is_user_loggedIn(){
    if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
        return true;
      }
      return false;
}