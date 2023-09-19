<?php
$title = 'authentification';
$style = ASSETS_CSS.'admin/authentification.css';
require_once HEADER;
?>
<form action="authentification-administrateur" method="post">
    <input type="text" name="pseudo" id=""><br>
    <input type="password" name="pwd" id=""><br>
    <input type="submit" value="se connecter">
</form>
<?php
    if(isset($notif))
        echo $notif;
?>
<?php
require_once FOOTER;
?>