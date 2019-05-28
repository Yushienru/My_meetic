<?php
class Model extends PDO {
    function __construct(){
        $dsn = "mysql:dbname=my_meetic;host=127.0.0.1:3306";
        $user = "root";
        $pass = "root";

        try {
            parent:: __construct($dsn, $user, $pass);
        } catch (PDOException $e) {
            echo 'Connexion échouée : '.$e->getMessage().PHP_EOL;
        }
    }
}
class MyError{
    static public function display ($message){
        echo  $message . "\n";
    }
}


class userModel {

    private $model;
    private $create;
    private $read;
    private $delete;
    private $update;
    private $filters = [
        ':id_user' => [
            'data_type'=> PDO::PARAM_INT,
        ],
        ':nom'=> [
            'data_type' => PDO::PARAM_STR,
        ],
        ':prenom'=> [
            'data_type' => PDO::PARAM_STR,
        ],
        ':birthdate' => [
            'data_type' => PDO::PARAM_STR,
            'regex' => '/^[\d]{4}-[\d]{2}-[\d]{2}$/'
        ],
        ':sex' => [
            'data_type' => PDO::PARAM_STR,
            'enum' => ['homme','femme','autres']
        ],
        ':ville' => [
            'data_type' => PDO::PARAM_STR,
        ],
        ':email' => [
            'data_type' => PDO::PARAM_STR,
            'regex' => '/^[\w]+@[\w]+\.[\w]{0,5}$/'
        ],
        ':password' => [
            'data_type' => PDO::PARAM_STR,
        ],
    ];
    
    function __construct(){
    $this->model = new Model();
    $this->create = $this->model->prepare("INSERT INTO `user` (`id_user`,`nom`,`prenom`,`birthdate`,`sex`,`ville`,`email`,`password`) VALUES (NULL, :nom, :prenom, :birthdate, :sex, :ville, :email, :password);");
    $this->read = $this->model->prepare("SELECT * FROM `user` WHERE `id_user` = :id_user;");
    $this->update = $this->model->prepare("UPDATE `user` SET `nom` = :nom, `prenom` = :prenom, `birthdate` = :birthdate, `sex` = :sex, `ville` = :ville, `email` = :email, `password` = :password WHERE `user`.`id_user` = :id_user;");
    $this->delete = $this->model->prepare("DELETE FROM `user` WHERE `id_user` = :id_user");
    }
    private function filtre(&$method,$parametre,$var) {
        if (key_exists($parametre,$this->filters)){
            $filtre = $this->filters[$parametre];
            if(isset($filtre['regex'])) {
                if (!preg_match($filtre['regex'],$var)) {
                MyError::display(' Filtre ' .$var. 'ne correspond pas ');
                return false;
                }
            }
            if (isset($filtre['enum'])) {
                $found = false;
                foreach ($filtre['enum'] as $field) {
                    if ($field === $var) {
                        $found = true;
                    }
                }
                if (!$found) {
                    MyError::display('Filter on ' . $var . 'ne correspond pas');
                    return false;
                }
            }
            if (isset($filtre['map'])) {
                $var = $filtre['map']($var);
            }
        }
        if (isset($filtre['data_type'])) {
            $method->bindParam($parametre,$var,$filtre['data_type']);
        }
        else {
            $method->bindParam($parametre,$var);
        }
        return true;
    }
        public function create($nom, $prenom, $birthdate, $sex, $ville, $email, $password) {
            $this->filtre($this->create,':nom', $nom);
            $this->filtre($this->create, ':prenom', $prenom);
            $this->filtre($this->create, ':birthdate', $birthdate);
            $this->filtre($this->create, ':sex', $sex);
            $this->filtre($this->create, ':ville', $ville);
            $this->filtre($this->create, ':email', $email);
            $this->filtre($this->create, ':password', $password);
            // var_dump($this->create->debugDumpParams());
            if ($this->create->execute()) {
                return $this->model->lastInsertId();
            }
            else {
                return false;
            }
        }
        public function read($id) {
            $this->filtre($this->read, ':id_user', $id);
            $this->read->execute();
            return $this->read->fetchAll(PDO::FETCH_OBJ);
        }

        public function update ($id, $nom, $prenom, $birthdate, $sex, $ville, $email, $password) {
            $this->filtre($this->update,':id_user', $id);
            $this->filtre($this->update,':nom', $nom);
            $this->filtre($this->update, ':prenom', $prenom);
            $this->filtre($this->update, ':birthdate', $birthdate);
            $this->filtre($this->update, ':sex', $sex);
            $this->filtre($this->update, ':ville', $ville);
            $this->filtre($this->update, ':email', $email);
            $this->filtre($this->update, ':password', $password);
            return $this->update->execute();
        }

        public function delete ($id) {
            $this->filtre($this->delete, ':id_user', $id);
            return $this->delete->execute();
        }
     }
    
    $user = new userModel();
    // $user_id = $user->create();
    // $user->read($user_id);
    // $user -> update($user_id);
    // $user->read($user_id);
    // $user->delete($user_id);

    //  echo "<h1>Inscription Reussie</h1>
    //         <h3>Information sur votre compte</h3>
    //         <table>
    //         <tr>
    //             <th>Nom :</th>
    //             <th>$nom</th>
    //         </tr>
    //         <tr>
    //             <td>Prénom :</td>
    //             <td>$prenom</td>
    //         </tr>
    //         <tr>
    //             <td>Date de naissance :</td>
    //             <td>$age</td>
    //         </tr>
    //         <tr>
    //             <td>Sexe :</td>
    //             <td>$sex</td>
    //         </tr>
    //         <tr>
    //             <td>Email :</td>
    //             <td>$mail</td>
    //         </tr>
    //         <tr>
    //             <td>Mot de passe :</td>
    //             <td>$password</td>
    //         </tr>
    //         </table>;";
     

?>