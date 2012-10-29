<?php
/**
 * TextosLayout
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class TextosLayout extends BaseTextosLayout
{
	
	/**
	 * Alias da Tabela
	 * @var String
	 */
	private $table_alias = "textosLayout as tl";
	
	public function getLayoutTexts(){
	
		try {
			
			    //Query a ser executada
			    $Query = Doctrine_Query::CREATE();
			    $Query->select('tl.txt_texto,tl.cod_relacao_idioma')
			          ->from($this->table_alias)
			          ->where('tl.cod_idioma = ?',LANGUAGE);		          
			          
                //Executa a query
                $recordset = $Query->execute();
			          
			    //Cria um array para os resultados
			    $array_textos_layout = array();      
			   				
				//Atribui os textos resgatados ao array resultante
				foreach($recordset as $valor){
				
					$array_textos_layout[$valor['cod_relacao_idioma']] = $valor['txt_texto'];					
				}
								
				//Executa a Query
				return $array_textos_layout;
			
		} catch (Doctrine_Exception $e) {
			
			echo $e->getMessage();
		}
	}
	
	/**
	 * Busca os dados dos textos
	 * @param Integer $cod_id
	 */
	public function ExecutegetTexto($cod_id){
		
		try {
			
			//Monta a Query
			$query = Doctrine_Query::create()
					 ->select('*,idioma.*')
					 ->innerJoin('tl.WebsiteIdiomas as idioma')
					 ->from($this->table_alias)
					 ->where('id = ?',$cod_id)
					 ->limit('1');					 
					 
			//Verifica se houve resultado		 
			if($query->count() > 0){
			
				//Executa a query
				$recordset = $query->execute();			
				//Retorna os dados resgatados
				return $recordset[0];
				
			}else{
			
				return false;
			}		 			
			
		} catch (Doctrine_Exception $e) {
			
			echo $e->getMessage();
		}
	}
	
	/**
	 * Salva os dados da atualiza��o do texto no banco de dados
	 * @param Array $parametros
	 */
	public function ExecuteEditaTexto($parametros){
	
		try {
			
			//Localiza o registro
			$tabela = $this->getTable()->find($parametros['id']);

			//Verifica se o registro foi encontrado
			if($tabela){
				
					  //Recebe os campos da tabela com seus respectivos valores
					  $campos_tabela = $this->setValues($tabela, $parametros, UPDATE);
	
					  //Percorre os campos da tabela
					  foreach($campos_tabela as $chave => $valor){
					  
						  	//Atribui o valor ao campo da tabela em quest�o
						  	$tabela->$chave = $campos_tabela->$chave;				  	
					  }
					  
					  //Atualiza as informa��es do registro no banco de dados
					  $tabela->save();
					  
					  //Retorna true em caso de sucesso
					  return true;
			
			}else{

				      //Retorn falso em caso de erro
				  	  return false;
			}
			
		} catch (Doctrine_Exception $e) {
			
			echo $e->getMessage();
		}		
	}
	
	/**
	 * Busca textos na base de dados com base nos par�metros informados
	 */
	public function ExecuteBuscarTextos($cod_idioma=null,$termo_busca=null){
		
		try {
					//Instancia o objeto da Query
					 $query = Doctrine_Query::create()					  
					 ->select('*,idioma.*')
					 ->from($this->table_alias)
					 ->leftJoin('tl.WebsiteIdiomas as idioma');
					 
					 //Verifica se um idioma foi informado
					 if(!is_null($cod_idioma) && strlen(trim($cod_idioma)) > 0){
					 
					 	//Adiciona o filtro por Idioma
					 	$query->where('tl.cod_idioma = ?',$cod_idioma);
					 }
					 
					 //Verifica a condi��o do termo de busca
					 if(!is_null($termo_busca) && strlen(trim($termo_busca)) > 0){
					 	
					 	//Adiciona o filtro por termo de busca
					 	$query->andWhere('tl.txt_texto like ?','%'.$termo_busca.'%');
					 }
					 
			//Verifica o resultado da Query		 
		    if($query->count() > 0){
		    
		        return $query->execute()->toArray();
		    	
		    }else{
		    
		    	return false;		    	
		    }
			
		} catch (Doctrine_Exception $e) {
			
			echo $e->getMessage();
		}
	
	}
	
}