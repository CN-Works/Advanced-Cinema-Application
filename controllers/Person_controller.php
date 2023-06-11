<?php

class PersonController {
    public function findAllActors(){
        $dao = new DAO();

        $sql = "SELECT pe.id_personne AS id_person, ac.id_acteur AS id_actor, pe.nom AS lastname, pe.prenom AS firstname
                FROM personne pe
                INNER JOIN acteur ac ON pe.id_personne = ac.id_personne
                GROUP BY pe.id_personne";
        
        $actors = $dao->executeRequest($sql);

        require "views/actors/actorslisting.php";
    }
}

?>