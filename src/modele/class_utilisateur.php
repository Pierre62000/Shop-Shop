<?php
    class Utilisateur{
        private $db;
        private $insert;
        private $insertC;
        private $connect;
        private $select;
        private $selectById;
        
        public function __construct($db){
            $this->db = $db;
            $this->insert = $this->db->prepare("insert into utilisateur(email, mdp, nom, prenom, idRole)values (:email, :mdp, :nom, :prenom, :role)");
            $this->connect  =  $this->db->prepare("select   email,   idRole,   mdp   from   utilisateur   where   email=:email");
        }
        
        public function insert($email, $mdp, $role, $nom, $prenom){
            $r = true;
            $this->insert->execute(array(':email'=>$email, ':mdp'=>$mdp, ':role'=>$role, ':nom'=>$nom,':prenom'=>$prenom));
            if ($this->insert->errorCode()!=0){
                print_r($this->insert->errorInfo());
                $r=false;
            }
            return $r;
        }

        public function connect($email){
            $this->connect->execute(array(':email'=>$email));
            if ($this->connect->errorCode()!=0){
                print_r($this->connect->errorInfo());
            }
            return $this->connect->fetch();
        }

        public function select(){
            $this->select = $this->db->prepare("select u.id, email, idRole, nom, prenom, r.libelle as libellerole from utilisateur u, role r where u.idRole = r.id order by nom");
            $this->select->execute();
            if ($this->select->errorCode()!=0){
                print_r($this->select->errorInfo());
            }
            return $this->select->fetchAll();
        }

        public function selectById($id){
            $this->selectById = $this->db->prepare("select u.id,  email,  nom,  prenom,  idRole  from  utilisateur u, role r where u.idRole=r.id");
            $this->selectById->execute(array(':id'=>$id));
            if ($this->selectById->errorCode()!=0){
                print_r($this->selectById->errorInfo());
            }
            return $this->selectById->fetch();
        }
    }

    class Type{
        private $db;
        private $select;

        public function __construct($db){
            $this->db = $db;
            $this->insert = $this->db->prepare("insert into type(nom)values (:nom)");
            $this->connect  =  $this->db->prepare("select   nom   from   utilisateur   where   nom=:nom");
        }

        public function insert($nom){
            $r = true;
            $this->insert->execute(array(':nom'=>$nom));
            if ($this->insert->errorCode()!=0){
                print_r($this->insert->errorInfo());
                $r=false;
            }
            return $r;
        }

        public function select(){
            $this->select = $this->db->prepare("select t.id as id, t.nom as nom from type t order by nom");
            $this->select->execute();
            if ($this->select->errorCode()!=0){
                print_r($this->select->errorInfo());
            }
            return $this->select->fetchAll();
        }

    }

    class Contact{
        private $db;

        public function __construct($db){
            $this->db = $db;
            $this->insertC = $this->db->prepare("insert into contact(nomC, emailC, messageC)values (:nomC, :emailC, :messageC)");
            $this->connect  =  $this->db->prepare("select   nomC,   emailC,   messageC   from   contact   where   email=:email");
        }

        public function insertC($emailC, $nomC, $messageC){
            $rC = true;
            $this->insertC->execute(array(':emailC'=>$emailC, ':nomC'=>$nomC,':messageC'=>$messageC));
            if ($this->insertC->errorCode()!=0){
                print_r($this->insertC->errorInfo());
                $rC=false;
            }
            return $rC;
        }
    }
?>