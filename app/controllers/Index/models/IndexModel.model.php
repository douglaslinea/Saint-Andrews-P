<?php
/**
 * Model do Controller Index
 * O objetivo desta classe щ conectar O Controller com o seu Modelo de Abstraчуo
 * Que por sua vez conectarс o Controller com a base de dados (Vide Classe Database)
 * @author Linea Comunicaчуo com Design - http://www.lineacom.com.br
 *
 */
class IndexModel
{	
	
	public function SelectBanners()
	{
		return TableFactory::getInstance('Banners')->SelectBanners();
	}
	
	public function SelectNoticias(){
            return TableFactory::getInstance('ImprensaNoticias')->SelectNoticias();
        }

}
?>