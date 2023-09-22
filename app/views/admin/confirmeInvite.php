<?php
$title = 'supprimer invité';
$style = ASSETS_CSS.'admin/supprimerInvite.css';
require_once HEADER;
require_once 'option.php';
?>
<form action="formulaire-confirme-invite" method="post">
    <input type="tel" name="phone" id="" placeholder="Entrez le numéro du client"><br>
    <input type="submit" value="confirmer">
</form>
<?php
    if(isset($notif))
        echo $notif;

    if(isset($lienQrCode))
        echo '<img src="'.$lienQrCode.'" alt="qrCode" width="100" heigth="100"><br>';  
?>
<?php
require_once FOOTER;
?>