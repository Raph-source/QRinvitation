<?php
$title = 'authentification';
$style = ASSETS_CSS.'style.css';
require_once HEADER;
?>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap" rel="stylesheet">
<div class="container">
    <div class="hello">
        <h3>Bienvenue.</h3>
        <h3>Connecte Toi à Ton Compte</h3>
        <img src="<?php echo ASSETS_IMG."4015765_195.png"; ?>" alt="">
    </div>
    
    <div class="form">
        <form action="authentification-administrateur" method="post">
                <h3>Se connecter</h3>
                <input type="text" name="pseudo" id="" placeholder="Entrez votre pseudo"><br>
                <input type="password" name="pwd" id="" placeholder="Entrez votre mot de passe"><br>
                <input type="submit" value="Se connecter">
                <?php
                    if(!empty($notif))
                      echo '<p class="erreur">'.$notif.'</p>';
                ?>
        </form>
    </div>
    

</div>



<?php
require_once FOOTER;
?>