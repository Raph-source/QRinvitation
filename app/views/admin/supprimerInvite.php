<?php
$title = 'supprimer invité';
$style = ASSETS_CSS.'admin/accueil.css';
$style1 = ASSETS_CSS.'form.css';
require_once HEADER;
?>
<div class="container">
    <div class="header"><img src="<?php echo ASSETS_IMG."paper-plane.png" ?>" alt="" srcset="">
        <h3>QRInvitation</h3>
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" class="menu"
        viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
        <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path></svg>
    </div>
    <div class="container-all" style="">
            <div class="side-bar" class="" style="">
                <?php
                    require_once 'option.php';
                ?>
            </div>
            <div class="content" style=""> 
            <form action="formulaire-supprimer-invite" method="post">
                <h3>Supprimer un invité</h3>
                <input type="tel" name="phone" id="" placeholder="Entrez le numéro du client"><br>
                <input type="submit" value="supprimer">
                <p class="erreur">
                <?php
                
                    if(isset($notif))
                        echo $notif;
                    ?>
                </p>
            </form>


                </div>
            </div>
    </div>

</div>
<?php
    $script = ASSETS_JS."script.js";
    $scriptOption = ASSETS_JS.'option.js';
    require_once FOOTER;
?>