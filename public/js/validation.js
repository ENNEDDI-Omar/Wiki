
function ValidationForm() {
  let nom =document.forms["X"]["Nom"];
  let prenom =document.forms["X"]["Prenom"];
  let email =document.forms["X"]["Email"];
  const emailRegex = /^[^\s@]+@[^\s@]+.[^\s@]+$/;
   if (nom.value="") {
    alert('ENTREZ un Nom Valid');
    nom.focus();
    return false;
   }
   if (prenom.value="") {
    alert('ENTREZ un Prénom Valid');
    prenom.focus();
    return false;
   }
   if (email.value=""&& !email.value.match(emailRegex)) {
    alert('ENTREZ un Email Valid');
    email.focus();
    return false;
   }
}