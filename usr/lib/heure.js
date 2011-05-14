function compZero(nombre) {
    return nombre < 10 ? '0' + nombre : nombre;
}

function date_heure() {
    const infos = new Date();

    //Date
    const mois = new Array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
    const jours = new Array('dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi');
    document.getElementById('heure').innerHTML = ' ' + jours[infos.getDay()] + ' ' + infos.getDate() + ' ' + mois[infos.getMonth()] + ' ' + infos.getFullYear() +', ';

    //Heure
    document.getElementById('heure').innerHTML += compZero(infos.getHours()) + ':' + compZero(infos.getMinutes()) + ':' + compZero(infos.getSeconds());
}

function heureload() {
   date_heure();
   setInterval("date_heure()", 1000); //Actualisation de l'heure
};
