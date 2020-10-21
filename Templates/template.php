<?php

    class Template {

        public function Header() {
            echo '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                  <title>Notes</title>
                    <meta charset="utf-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                    
                    <meta name="description" content="This is notebook app">
                    <meta name="keywords" content="Notebook">
                    
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">';
                    if($_SERVER['SCRIPT_NAME'] == '/login.php'){
                        echo '<link rel="stylesheet" type="text/css" href="./log.css">';
                    } else {
                        echo '<link rel="stylesheet" type="text/css" href="./style.css">';
                    }
                    echo '</head>
                <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                  <a class="navbar-brand" href="/">';
            if(isset($_SESSION['is_logged_in'])) {
                echo $_SESSION['username'];
            }
            echo '</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">';
            if(!isset($_SESSION['is_logged_in'])){
                echo '<ul class="navbar-nav mr-auto">
                      <li class="nav-item active">
                        <a class="nav-link" href="login">Login<span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item active">
                        <a class="nav-link" href="register">Register<span class="sr-only">(current)</span></a>
                      </li>
                    </ul>';
            } else {
               echo '
               <li class="nav-item active">
                        <a class="nav-link" href="logout">Logout<span class="sr-only">(current)</span></a>
                      </li>
               ';
            }
                    echo '
                    </ul>
                  </div>
                </nav>
                ';
        }

        public function Footer(){
            echo '<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>';
                if(isset($_SESSION['is_logged_in'])){
                    echo '<script src="app.js"></script>';
                }
               echo '</body>
                </html>
                ';
        }
    }

?>