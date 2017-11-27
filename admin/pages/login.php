

      <h2>Connexion Back Office</h2>

      <div class="row justify-content-md-center">
        <form name="loginform" class="col-md-6" method="post" action="index.php?login.php">
          <div class="form-group">
            <label for="exampleInputLogin1">Login</label>
            <input type="text" name="log_adm" class="form-control" id="log_adm" placeholder="Login">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Mot de passe</label>
            <input type="password" name="log_password" class="form-control" id="log_password" placeholder="Password">
          </div>

          <button type="submit" class="btn btn-primary">Connexion</button>
        </form>
      </div>
      <div class="alert alert-success" role="alert" id="resultat2"></div>
      <div class="alert alert-danger" role="alert" id="resultat"></div>

      <?php

      if(isset($_POST) && !empty($_POST)) {

        $username = htmlspecialchars($_POST['log_adm']);
        $password = htmlspecialchars($_POST['log_password']);

        login($username, $password);

      }

      function login($username, $password) {
        $db = new Database();
        $user = $db->query2("SELECT * FROM admin WHERE nomAdmin = '$username' AND password = '$password'");
        if(isset($user)) {
          $_SESSION['auth'] = 'ADMIN';
          $_SESSION['user'] = $username;
        }
        header('location: index.php?p=commandes');

      }

       ?>
