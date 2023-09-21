<?php
$title = 'ajout invité';
$style = ASSETS_CSS.'admin/ajouterInvite.css';
require_once HEADER;
?>
<form action="form-ajout-invite" method="post">
    <input type="text" name="nom" id="" placeholder="Entrez le nom de l'invité"><br>
    <input type="text" name="prenom" id="" placeholder="Entrez le prénom de l'invité"><br>
    <input type="tel" name="phone" id="" placeholder="Entrez le numéro de téléphone de l'invité"><br>
    <input type="tel" name="phoneConf" id="" placeholder="Confirmez le numéro de téléphone"><br>
    <input type="submit" value="ajouter">
</form>
<?php
    if(isset($notif))
        echo $notif.'<br>';
    if(isset($lienQrCode))
        echo '<img src="'.$lienQrCode.'" alt="qrCode" width="100" heigth="100"><br>
              <a href="'.$lienQrCode.'" download>Téléchar l\'image</a>
        ';  
?>
<a href="retour-option">Retour vers les options</a>

<?php
require_once FOOTER;
?>