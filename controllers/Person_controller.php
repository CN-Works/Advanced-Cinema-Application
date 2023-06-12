<?php

class PersonController {
    public function findAllActors(){
        $dao = new DAO();

        $sql = "SELECT pe.id_personne AS id_person, ac.id_acteur AS id_actor, pe.nom AS lastname, pe.prenom AS firstname, pe.sexe AS sex, pe.dateNaissance AS dob
                FROM personne pe
                INNER JOIN acteur ac ON pe.id_personne = ac.id_personne
                GROUP BY pe.id_personne";
        
        $actors = $dao->executeRequest($sql);

        require "views/actors/actorslisting.php";
    }

    public function findAllProducers(){
        $dao = new DAO();

        $sql = "SELECT pe.id_personne AS id_person, re.id_realisateur AS id_producer, pe.nom AS lastname, pe.prenom AS firstname, pe.dateNaissance AS dob
                FROM personne pe
                INNER JOIN realisateur re ON pe.id_personne = re.id_personne
                GROUP BY pe.id_personne";
        
        $producers = $dao->executeRequest($sql);

        require "views/producers/producerslisting.php";
    }
}

?>