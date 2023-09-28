<?php
$title = 'modifier mot de passe';
$style = ASSETS_CSS.'admin/accueil.css';
$style1 = ASSETS_CSS.'table.css';
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
            <?php if(isset($trouver) && is_array($trouver) && count($trouver) != 0):?>
            <table>
                <thead>
                    <tr>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Telephone</th>
                        <th>QrCode</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($trouver as $invite):?>
                            <tr>
                                <td><?php echo $invite['prenom'];?></td>
                                <td><?php echo $invite['nom'];?></td>
                                <td><?php echo $invite['numPhone'];?></td>
                                <td><button class="voir">Voir le code QR<img hidden src="<?php echo $invite['path'];?>" alt="qrCode"></button></td> 
                            </tr>
                        <?php endforeach;?>
                </tbody>
            </table>
           <div class='pagination'>
            <?php for($i = 1; $i <= $nombrePage; $i++){
                
                    if($i != $pageCourante){
                        echo '<button class="index"><a href="voir-tout-invite?page='.$i.'">'.$i.'</a></button>&nbsp';
                    }
                    else{
                        
                        echo '<button class="index1">'.$i.'</button>&nbsp';
                    }
                    
            }?>
            </div>&nbsp;
        <?php
        else:
        ?>
            <p>Il n'y à aucun invité</p>
        <?php 
        endif;
        ?>

        <?php
            if(isset($notif))
                echo $notif;
        ?>
        <div class="Qrcode">
            <button class="close">Fermer</button>
        </div>


                </div>
            </div>
    </div>

</div>
<?php
    $script = ASSETS_JS."script.js";
    $script1 = ASSETS_JS."js.js";
    $scriptOption = ASSETS_JS.'option.js';
    require_once FOOTER;
?>