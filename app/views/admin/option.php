<?php
$title = 'option';
$style = ASSETS_CSS.'admin/option.css';
require_once HEADER;
?>
<a href="ajouter-invite">Ajouter un invité</a><br>
<a href="modifier-pwd">Modifier votre mot de passe</a><br>
<?php
    if(isset($notif))
        echo $notif;
?>
<?php
require_once FOOTER;
?>