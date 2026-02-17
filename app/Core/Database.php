<?php
    namespace App\Core;

    use PDO;
    use PDOException;
    // Classe Db : singleton pour gérer la connexion à la base de données
    class Database {

        // Instance unique de PDO stockée ici
        private static $instance = null;

        // Constructeur privé pour empêcher l'instanciation directe
        private function __construct() {}

        // Clone privé pour empêcher la duplication de l'instance
        private function __clone() {}

        // Méthode publique pour obtenir l'instance PDO
        public static function getInstance() {

            // Si aucune instance n'existe encore, on en crée une
            if (!self::$instance) {

                // Tableau d'options pour configurer PDO
                $options = [
                    // Mode d'erreur : PDO lance une exception si une erreur SQL survient
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

                    // Mode de fetch par défaut : retourne un tableau associatif
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

                    // Désactive l'émulation des requêtes préparées
                    // PDO utilisera les vrais prepared statements du serveur MySQL
                    PDO::ATTR_EMULATE_PREPARES => false
                ];

                try {
                    // Création de l'objet PDO
                    // charset=utf8mb4 permet de stocker tous les caractères, y compris emojis
                    self::$instance = new PDO(
                        'mysql:host=localhost;dbname=GrandAngle;charset=utf8mb4', // DSN
                        'user1',  // utilisateur MySQL
                        'user1',  // mot de passe MySQL
                        $options  // options PDO définies plus haut
                    );
                } catch (PDOException $e) {
                    // En cas d'erreur de connexion, on stoppe le script et on affiche le message
                    die("Erreur de connexion à la base : " . $e->getMessage());
                }
            }

            // Retourne l'instance unique de PDO
            return self::$instance;
        }
    }
?>