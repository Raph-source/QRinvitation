let supprimerToutInvite = document.getElementById("supprimerToutInvite");

supprimerToutInvite.addEventListener('click', function(){
    let confirmation = prompt("Etes-vous sûr de vouloir supprimer tous les invités? tapez 'oui' pour confirmer")

    if(confirmation === 'oui'){
        window.location.href = "supprimer-tout-invite"; 
    }
});