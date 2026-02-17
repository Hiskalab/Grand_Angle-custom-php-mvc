<?php

    namespace App\Models\Managers;

    use PDO;
    use App\Core\Database;
    use App\Models\User;

        class UsersManager {

            public static function find(int $id) {
                $db = Database::getInstance();
                $req = $db->prepare('SELECT * FROM Users
                WHERE id_user = :id_user');
                $req->execute([
                    ':id_user' => $id,
                ]);
                $user = $req->fetch(PDO::FETCH_ASSOC);

                if (!$user) return null;

                return new User($user);
            }

            // fonction connexion
            public static function logAuth(string $username) {
                $db = Database::getInstance();
                $req = $db->prepare('SELECT u.*, r.libelle AS role
                FROM Users u
                INNER JOIN users_roles r ON u.id_role = r.id_role
                WHERE u.username = :username');
                $req->bindValue(':username', $username);
                $req->execute();


                // On récupère la première ligne de résultat sous forme de tableau associatif (['id_user' => 1, 'login' => 'admin', …]).
                $info = $req->fetch(PDO::FETCH_ASSOC);

                if (!$info) {
                    return null;
                }

                return new User($info);
            }

            public static function allUsers() {
                $list = [];
                $db = Database::getInstance();
                $req = $db->query('SELECT u.*, r.libelle AS role
                FROM Users u 
                INNER JOIN users_roles r ON u.id_role = r.id_role');
                
                // nous créons une liste d'objets Users à partir des résultats de la base de données
                foreach($req->fetchAll(PDO::FETCH_ASSOC) as $users) {
                    $list[] = new \App\Models\User($users);
                }
                return $list;
            }

            public static function addUsers($obj) {
                $db = Database::getInstance();
                $req = $db->prepare('
                INSERT INTO Users (username, password, email, id_role)
                VALUES (:username, :password, :email, :id_role)');
                
                return $req->execute([
                    ':username' => $obj->getUsername(),
                    ':password' => $obj->getPassword(),
                    ':email' => $obj->getEmail(),
                    ':id_role' => $obj->getId_role(),
                ]);
            }

            public static function delete($obj) {
                $db = Database::getInstance();
                $req = $db->prepare('DELETE FROM Users
                WHERE id_user = :id_user');
                return $req->execute([
                    ':id_user' => $obj->getId_user(),
                ]);
            }

            public static function edit($obj) {
                $db = Database::getInstance();
                $req = $db->prepare('UPDATE Users SET username = :username,
                email = :email
                WHERE id_user = :id_user');
                $req->execute([
                    ':id_user' => $obj->getId_user(),
                    ':username' => $obj->getUsername(),
                    ':email' => $obj->getEmail()
                ]);
            }
        }