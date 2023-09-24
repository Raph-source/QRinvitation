<?php
$title = 'modifier mot de passe';
$style = ASSETS_CSS.'admin/modifierPwd.css';
require_once HEADER;
require_once 'option.php';
?>
<form action="formulaire-modifier-pwd" method="post">
    <input type="password" name="oldPwd" id="" placeholder="Entrez l'ancien mot de passe"><br>
    <input type="password" name="newPwd" id="" placeholder="Entrez le nouveau mot de passe"><br>
    <input type="password" name="conNewPwd" id="" placeholder="Confirmez le nouveau mot de passe"><br>
    <input type="submit" value="modifier">
</form>
<?php
    if(isset($notif))
        echo $notif;
?>
<?php
require_once FOOTER;
?>