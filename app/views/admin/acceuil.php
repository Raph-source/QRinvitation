<?php
$title = 'home';
$style = ASSETS_CSS.'admin/accueil.css';
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
                <div class="welcome">
                    <!--<img src="<?php //echo ASSETS_IMG."wave.gif" ?>" alt="" srcset="">-->
                    <h3>Bienvenue dans l'espace <br> administrateur</h3>
                </div>
                <div class="nombreInvite">
                    <img src="<?php echo ASSETS_IMG."" ?>" alt="" srcset="">
                    <h3>Vous avez 
                        <label for="">
                            <?php 
                            if(isset($nombreInvite)) 
                                echo $nombreInvite;
                            else 
                                echo 0;
                            ?>
                        </label> 
                        invités
                    </h3>
                </div>
            </div>
    </div>

</div>
<?php
    $script = ASSETS_JS."script.js";
    $scriptOption = ASSETS_JS.'option.js';
    require_once FOOTER;
?>