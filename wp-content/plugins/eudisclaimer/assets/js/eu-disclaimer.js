
if (lireUnCookie('eu-disclaimer-vapobar') != "ejD86j7ZXF3x") {

    // Sélectionne l'élément avec l'ID 'monModal' et l'initialise comme un modal.
    $("#monModal").modal({
        escapeClose: false,  // Désactive la fermeture du modal lors de l'appui sur la touche Échap.
        clickClose: false,   // Empêche la fermeture du modal lors d'un clic en dehors de sa zone.
        showClose: false     // Masque le bouton de fermeture ('x') habituellement affiché sur le modal.

    });
}

function creerUnCookie(nomCookie, valeurCookie, dureeJours) {
    // Vérifie si une durée en jours est spécifiée pour le cookie
    if (dureeJours) {
        // Crée un nouvel objet Date
        var date = new Date();

        // Convertit la durée en jours en millisecondes et l'ajoute à la date actuelle
        date.setTime(date.getTime() + (dureeJours * 24 * 60 * 60 * 1000));

        // Formate la date d'expiration en chaîne GMT et la prépare pour l'ajouter au cookie
        var expire = "; expire=" + date.toGMTString();
    }
    // Si aucune durée n'est spécifiée, le cookie expire à la fin de la session du navigateur
    else
        var expire = "";

    // Crée le cookie avec le nom, la valeur, la date d'expiration (si spécifiée) et le chemin
    // Le chemin "/" indique que le cookie est accessible sur l'ensemble du site
    document.cookie = nomCookie + "=" + valeurCookie + expire + "; path=/";
}


function lireUnCookie(nomCookie) {
    // Prépare le format du nom du cookie pour la recherche, en y ajoutant le signe égal
    nomFormate = nomCookie + "=";

    // Divise la chaîne de tous les cookies en un tableau, séparant chaque cookie par ';'
    var tableauCookies = document.cookie.split(';'); 

    // Parcourt le tableau des cookies pour trouver celui qui correspond au nom donné
    for (var i = 0; i < tableauCookies.length; i++) {
        var cookieTrouve = tableauCookies[i];

        // Enlève les espaces du cookie pour une comparaison correcte
        while (cookieTrouve.charAt(0) == ' ') {
            cookieTrouve = cookieTrouve.substring(1, cookieTrouve.length);
        }

        // Vérifie si le cookie actuel dans la boucle correspond au cookie recherché
        if (cookieTrouve.indexOf(nomFormate) == 0) {

            // Retourne la valeur du cookie en enlevant la partie nom et égal du début
            return cookieTrouve.substring(nomFormate.length, cookieTrouve.length);
        }
    }
    // On retourne une valeur null dans le cas où aucun cookie n'est trouvé
    return null;
}

// Création d'une fonction que l'on va associer au bouton Oui de notre modal par le biais de onclick.
function accepterLeDisclaimer() {

    // Appelle la fonction `creerUnCookie` pour créer un cookie nommé 'eu-disclaimer-vapobar'
    // Ce cookie est défini avec la valeur "ejD86j7ZXF3x" et une durée de vie de 1 jour
    creerUnCookie('eu-disclaimer-vapobar', "ejD86j7ZXF3x", 1);

    // Appelle la fonction `lireUnCookie` pour lire la valeur du cookie 'eu-disclaimer-vapobar'
    // La valeur lue est stockée dans la variable 'cookie', mais n'est pas utilisée dans cette fonction
    
} 