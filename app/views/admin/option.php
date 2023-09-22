<?php
$style = ASSETS_CSS.'admin/option.css';
?>
<a href="ajouter-invite">Ajouter un invité</a><br>
<a href="supprimer-invite">Supprimer un invité</a><br>
<a href="confirmer-invite">Confirmer un invité</a><br>
<a href="voir-tout-invite">Voir tout les invités</a><br>
<a href="modifier-pwd">Modifier votre mot de passe</a><br>
<a href="deconnexion">Déconnexion</a><br>
<?php
    if(isset($notif))
        echo $notif;
?>