-- Returns all actor that have played a role

SELECT name FROM casting INNER JOIN actor ON casting.id_actor = actor.id_actor AND casting.id_role=4