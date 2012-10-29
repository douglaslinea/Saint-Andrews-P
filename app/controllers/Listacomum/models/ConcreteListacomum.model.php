<?php
class ConcreteListacomum extends Textos
{
	public function SelectTextos()
	{
		return $this->SelectTexto();
	}
	
	public function SelectTextosId($parametros)
	{
		return $this->SelectTextoId($parametros['id']);
	}
}
?>