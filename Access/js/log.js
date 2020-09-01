var n = document.getElementById("Utilisateur");
var pw = document.getElementById("password");
var m = document.getElementById("parag");
var f = document.getElementById("form");


f.addEventListener('submit', (e) => {
    let mesgErreurs = [];
    
    if(n.value === '' && pw.value === ''){
        mesgErreurs.push("Les champs ne doivent pas être vides !");
    }

    else if(n.value === '' || n.value === null){
        mesgErreurs.push("Votre nom d'utilisateur est vide !");
    }

    else if(pw.value === '' || pw.value === null){
        mesgErreurs.push("Votre mot de passe est vide !");
    } 

    

    if(mesgErreurs.length > 0){
        e.preventDefault();
        m.innerHTML = mesgErreurs.join(' , ');
    }
});
