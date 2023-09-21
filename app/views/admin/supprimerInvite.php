<?php
$title = 'supprimer invité';
$style = ASSETS_CSS.'admin/supprimerInvite.css';
require_once HEADER;
?>
<form action="formulaire-supprimer-invite" method="post">
    <input type="tel" name="phone" id="" placeholder="Entrez le numéro du client"><br>
    <input type="submit" value="supprimer">
</form>
<?php
    if(isset($notif))
        echo $notif;
?>
<?php
require_once FOOTER;
?>