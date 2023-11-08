<?php 
/** 
* Plugin Name: eu-disclaimer 
* Plugin URI: http://URL_de_l_extension 
* Description: Plugin sur la législation des produits à base de nicotine. 
* Version: 1.5
* Author: MagNott
* Author URI: https://www.magnottdevlab.net/
* License: Libre
 */ 

require_once ('model/repository/DisclaimerGestionTable.php'); 

//Création de la fonction "Ajouter au menu"
function ajouterAuMenu() {
    $page = "eu-disclaimer";
    $menu = "eu-disclaimer";
    $capacity = "edit_pages";
    $slug = "eu-disclaimer";
    $function = "disclaimerFonction";
    $icon = "";
    $position = 80; // L'entrée dans le menu sera juste en dessous de "Réglages"
    if (is_admin()) {
        add_menu_page($page, $menu, $capacity, $slug, $function, $icon, $position);
    }
}

// hook pour réaliser l'action 'admin_menu'
add_action("admin_menu", "ajouterAuMenu", 10);

//Fonction à appeler lorsque l'on clique sur le menu
function disclaimerFonction() {
    require_once('views/disclaimer-menu.php');
}



if (class_exists("DisclaimerGestionTable")) { 
 $gerer_table = new DisclaimerGestionTable(); 
} 

if (isset($gerer_table)) { 

 // Création de la table en BDD lors de l'activation
 register_activation_hook(__FILE__, array($gerer_table, 'creerTable')); 

 // Suppression de la table en BDD lors de la désactivation
 register_deactivation_hook(__FILE__, array($gerer_table,'supprimerTable')); 
} 



?>

