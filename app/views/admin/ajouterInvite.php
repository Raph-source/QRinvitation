<?php
$title = 'ajout invité';
$style = ASSETS_CSS.'admin/accueil.css';
$style1 = ASSETS_CSS.'form.css';
require_once HEADER;
?>
<style>
    form{
        height: 32em;
    }
</style>
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
            <form action="form-ajout-invite" method="post">
                    <h3>Ajouter un invité</h3>
                    <input type="text" name="nom" id="" placeholder="Entrez le nom de l'invité"><br>
                    <input type="text" name="prenom" id="" placeholder="Entrez le prénom de l'invité"><br>
                    <input type="tel" name="phone" id="" placeholder="Entrez le numéro de téléphone de l'invité"><br>
                    <input type="tel" name="phoneConf" id="" placeholder="Confirmez le numéro de téléphone"><br>
                    <input type="submit" value="ajouter">
                    <?php
                        if(isset($notif))
                            echo "<p class='erreur'>".$notif."</p>";
                        if(isset($lienQrCode))
                            echo '<img src="'.$lienQrCode.'" alt="qrCode" width="100" heigth="100"><br>
                                <a href="'.$lienQrCode.'" download>Téléchar l\'image</a>
                            ';  
                    ?>
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