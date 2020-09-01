const user = document.getElementById("user");
const pwd = document.getElementById("pwd");
const pwd1 = document.getElementById("pwd1");
const msg = document.getElementById("msg");
const form = document.getElementById("form");



form.addEventListener("submit", (e) => {
    let messageErreurs = [];
    if(user.value === '' || user.value === null){
        messageErreurs.push("Veuillez remplissez votre nom d'utilisateur!");
    }

    if(pwd.value === '' || pwd.value === null){
        messageErreurs.push("Veuillez remlissez votre mot de passe 1 !");
    } 

    if(pwd1.value === '' || pwd1.value === null){
        messageErreurs.push("Veuillez remlissez votre mot de passe 2 !");
    } 

    if(pwd.value !== pwd1.value){
        messageErreurs.push("Les mots secrets doivent être identiques !");
    } 

    if(pwd.value.length <= 5 || pwd1.value.length <= 5){
        messageErreurs.push("Le mot de passe doit être suppérieur a cinq caractères");
    } 

    if(messageErreurs.length > 0){
        e.preventDefault()
        msg.innerHTML = messageErreurs.join(' , ');
    }
})