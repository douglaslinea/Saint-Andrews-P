<?php

/**
 * Model
 * O objetivo desta classe � conectar o Controller com o seu Modelo de Abstra��o
 * Que por sua vez conectar� o Controller com a base de dados (Vide Classe Database)
 * @author Linea Comunica��o - http://www.lineacom.com.br
 *
 */
class ConcreteNoticia extends ImprensaNoticias
{
public function SelectNoticias()
{
return parent::SelectNoticias();
}

public function SelectNoticiasId($parametros)
{
return parent::SelectNoticiasId($parametros['permalink']);
}

public function SelectMaisNoticias($parametros)
{
return parent::SelectMaisNoticias($parametros['permalink']);
}
}
?>