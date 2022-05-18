<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aweosome Convent!</title>
    <link rel="stylesheet" href="./styles.css">
  </head>
  <body>
    <?php
    session_start();
    $_SESSION['register-msg'] = '';
    $_SESSION['login-msg'] = '';
    $_SESSION['payment-msg'] = '';
    $_SESSION['room-msg'] = 'Select your room';
    ?>
      <div id="header">


          <div id="logo">
              <a href="./index.php">Aweosome Convent!</a>
          </div>
      
      
          <div id="login-register">
            <div id="login-button">
                <a href="./login.php">login</a>
            </div>
            <div id="register-button">
                <a href="./register.php">register</a>
            </div>
          </div>


          <div id="panel-logout">
            <div id="panel-button">
                <a href="./panel.php">user panel</a>
            </div>
            <div id="logout-button">
                <a href="./logout.php">logout</a>
            </div>
          </div>


      </div>
      <div id="feed">
          <div id="text">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque adipisci totam culpa 
            vitae earum quam quaerat, facere sunt nobis pariatur. Voluptatem dolore sed assumenda 
            facere porro! Quasi excepturi exercitationem id illo alias porro, ab ipsum commodi 
            deleniti repellendus, vitae nobis voluptas corrupti ad aliquam quisquam! Unde nihil 
            earum asperiores nobis, provident quasi officiis ipsam in. Ut quibusdam hic est quo, 
            impedit adipisci temporibus atque! Labore illum libero est? Minima voluptatibus facilis 
            eum vitae assumenda neque in laudantium hic, accusamus quasi quibusdam, ea consequatur 
            voluptates asperiores laborum impedit, nostrum nihil ab quaerat atque reiciendis voluptatem. 
            At quos nisi sint magnam in nesciunt quam eos inventore? Dolorem mollitia, nemo nisi 
            reiciendis hic minus, corrupti quasi veniam, quidem magnam quia facere doloribus. Modi 
            iste corrupti, soluta tenetur quis non ducimus sapiente nam eligendi et dignissimos 
            dolore repellat fugiat voluptatibus accusantium, possimus explicabo ullam omnis laborum 
            odit, veniam laudantium quae amet. Totam esse, pariatur quia provident fugit a nobis 
            aperiam deleniti facilis ipsam, sapiente nostrum? Quaerat accusantium perferendis 
            dolore similique laudantium, eos sequi numquam ipsum vero in quas voluptatum expedita 
            eaque nulla necessitatibus molestiae placeat earum fugit aut ducimus velit. Sed facere 
            totam corrupti ad odio, nobis cupiditate sapiente doloribus voluptas placeat quasi earum 
            hic labore, eaque cumque numquam similique! Nihil quisquam repellendus obcaecati ducimus 
            magnam qui iusto sunt itaque ab. Veniam alias distinctio accusantium sed debitis magni ex 
            perferendis sint modi, ipsam amet minus aperiam aspernatur id obcaecati vitae, rem quia 
            assumenda quaerat officiis, repellendus architecto quo blanditiis? Doloremque harum quisquam enim magnam!
          </div>
          <div id="image">
            <img src="./resources/feedphoto1.jpg">
            <img src="./resources/feedphoto2.jpg">
          </div>
      </div>
      <div id="footer">
          Tomasz Hańderek 2022 &reg;
      </div>

    <script>
      function getCookie(name) {
        let parts = document.cookie.split(';');
        for (let i = 0; i < parts.length; i++){
          let smaller_parts = parts[i].split('=');
          if (smaller_parts[0] == name){
            return smaller_parts[1];
            break;
          }
        }
      }

        var logged_in = getCookie('logged_in');
        if(logged_in == 'True'){
          var element = document.getElementById("login-register").style.display = 'none';
        }
        else {
          var element = document.getElementById("panel-logout").style.display = 'none';
        }
    </script>
  </body>
</html>