<?php
$title = 'voir invité';
$style = ASSETS_CSS.'admin/voirToutInvite.css';
require_once 'option.php';
require_once HEADER;
?>

<?php if(isset($trouver) && is_array($trouver) && count($trouver) != 0):?>
    <table border="1">
        <thead>
            <tr>
                <th>prenom</th>
                <th>nom</th>
                <th>tel</th>
                <th>QrCode</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($trouver as $invite):?>
                    <tr>
                        <td><?php echo $invite['prenom'];?></td>
                        <td><?php echo $invite['nom'];?></td>
                        <td><?php echo $invite['numPhone'];?></td>
                        <td><img src="<?php echo $invite['path'];?>" alt="qrCode"></td>
                    </tr>
                <?php endforeach;?>
        </tbody>
    </table>
    <?php for($i = 1; $i <= $nombrePage; $i++){
            if($i != $pageCourante){
                echo '<a href="voir-tout-invite?page='.$i.'">'.$i.'</a>&nbsp';
            }
            else{
                echo '<spam>'.$i.'</spam>&nbsp';
            }
            
    }?>
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

<?php
require_once FOOTER;
?>