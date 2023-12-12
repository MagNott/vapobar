<?php

//définition du chemin d'accès à la classe DisclaimerOptions
define( 'MY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) ); 
include( MY_PLUGIN_PATH . '../entity/DisclaimerOptions.php'); 

class DisclaimerGestionTable {

    public function creerTable() { 

        // Instanciation de la classe DisclaimerOption
        $message = new DisclaimerOptions(); 
        
        // On alimente l'objet du message
        $message->setMessageDisclaimer(
            "Au regard de la loi européenne, 
            vous devez nous confirmer que vous avez plus
            de 18 ans pour visiter ce site ?"); 

        $message->setRedirectionko("https://www.google.com/"); 

        // Utilisation de la variable globale $wpdb pour interagir avec la base de données WordPress
        global $wpdb; 

        // Création du nom complet de la table en préfixant le nom de base "disclaimer_options" avec le préfixe de table WordPress
        $tableDisclaimer = $wpdb->prefix.'disclaimer_options'; 

        // Vérification de l'existence de la table dans la base de données
        if ($wpdb->get_var("SHOW TABLES LIKE $tableDisclaimer") !=$tableDisclaimer) { 
            // Si la table n'existe pas, création de la requête SQL pour créer la table
            $sql = "CREATE TABLE $tableDisclaimer

            (id_disclaimer INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            message_disclaimer TEXT NOT NULL, 
            redirection_ko TEXT NOT NULL)
            ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 
            COLLATE=utf8mb4_unicode_ci;"; 

             // Exécution de la requête SQL et vérification si elle échoue
            if (!$wpdb->query($sql)) {
                die("Une erreur est survenue, contactez le développeur du plugin..."); 
            } 
            
            // Si la création de la table est réussie, insertion des valeurs initiales dans la table
            $wpdb->insert( 
                $wpdb->prefix . 'disclaimer_options',

                // Utilisation des getters pour récupérer les valeurs de l'objet "message"
                array('message_disclaimer' => $message->getMessageDisclaimer(),
                    'redirection_ko' => $message->getRedirectionko() 
                ), 

                // Spécification du format des données insérées en string
                array('%s', '%s') 
            ); 
        } 
    } 

    public function supprimerTable() { 

        global $wpdb; 
        $table_disclaimer = $wpdb->prefix . "disclaimer_options"; 
        $sql = "DROP TABLE $table_disclaimer"; 

        $wpdb->query($sql); 
    }


    static function insererDansTable($contenu, $url) { 

        global $wpdb; 
        $table_disclaimer = $wpdb->prefix.'disclaimer_options'; 
        $sql = $wpdb->prepare( 
        "UPDATE $table_disclaimer SET message_disclaimer = '%s', redirection_ko = '%s' WHERE id_disclaimer = '%s'", $contenu, $url, 1); 

        $wpdb->query($sql); 
    }

    // Définition d'une méthode statique publique nommée 'getplaceholder'
    // C'est une fonction statique car elle n'a pas besoin d'avoir une instance pour fonctionner
    static public function getplaceholder() {

        // Utilise la variable globale $wpdb pour interagir avec la base de données de WordPress
        global $wpdb;

        // Construit le nom complet de la table 'disclaimer_options' en utilisant le préfixe défini pour les tables de la base de données WordPress
        $table_disclaimer = $wpdb->prefix.'disclaimer_options'; 

        // Exécute une requête SQL pour sélectionner toutes les entrées de la table 'disclaimer_options'
        // Retourne le résultat de cette requête
        return $wpdb->get_results( "SELECT * FROM $table_disclaimer;" );
    }

    static function AfficherDonneModal() { 

        // Utilisation de la variable globale $wpdb pour accéder à la base de données WordPress
        global $wpdb; 

        // Construction de la requête SQL pour sélectionner toutes les données de la table 'disclaimer_options'
        $query = "SELECT * from " . $wpdb->prefix."disclaimer_options"; 

        // Exécution de la requête et récupération de la première ligne des résultats
        $row = $wpdb->get_row($query); 

        // Assignation du message du disclaimer à partir des données récupérées
        $message_disclaimer = $row->message_disclaimer; 

        // Assignation de l'URL de redirection à partir des données récupérées
        $lien_redirection = $row->redirection_ko; 

        // Retourne le code HTML du modal
        // Le modal contient un message de bienvenue, le message du disclaimer et deux boutons
        // Le premier bouton redirige vers l'URL spécifiée si l'utilisateur choisit 'Non'
        // Le second bouton ferme le modal si l'utilisateur choisit 'Oui' et appelle la fonction JavaScript 'accepterLeDisclaimer()'
        return '<div id="monModal" class="modal">
                <p>Le vapobar, vous souhaite la bienvenue ! </p>
                <p>'. $message_disclaimer . '</p>
                <a href="' . $lien_redirection . '" type="button" class="btn-red">Non</a>
                <a href="#" type="button" rel="modal:close" class="btn-green" onclick="accepterLeDisclaimer()">Oui</a> 
                </div>'; 
        }
    
}

?>