<?php
$title = 'ajout invité';
$style = ASSETS_CSS.'admin/ajouterInvite.css';
require_once HEADER;
?>
<form action="form-ajout-invite" method="post">
    <input type="text" name="nom" id="" placeholder="Entrez le nom de l'invité"><br>
    <input type="text" name="prenom" id="" placeholder="Entrez le prénom de l'invité"><br>
    <input type="tel" name="phone" id="" placeholder="Entrez le numéro de l'invité"><br>
    <input type="submit" value="se connecter">
</form>
<?php
    if(isset($notif))
        echo $notif;
?>
<?php
require_once FOOTER;
?>