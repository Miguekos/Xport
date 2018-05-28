<?php
/**
* @author evilnapsis
* @brief Eliminar un usuario
**/
$p = ClientData::getById($_GET["id"]);
$p->del();
Core::redir("./?view=client");
?>