<?php
class ftp_backupHelper
{
	private function apagar_diretorio($dir)
	{
		if(is_dir($dir))
		{
			if($handle = opendir($dir))
			{
				while(false !== ($file = readdir($handle)))
				{
					if(($file == ".") or ($file == ".."))
					{
						continue;
					}
					
					if(is_dir($dir . $file))
					{
						$this->apagar_diretorio($dir . $file . "/");
					}
					else
					{
						unlink($dir . $file);
					}
				}
			}
			else
			{
				print("nao foi possivel abrir o arquivo.");
				return false;
			}

			// fecha a pasta aberta
			closedir($handle);

			// apaga a pasta, que agora esta vazia
			rmdir($dir);
		}
		else
		{
			print("diretorio informado invalido");
			return false;
		}
	}

	public function copy_r( $path, $dest )
	{
		if( is_dir($path) )
		{
			@mkdir( $dest );
			$objects = scandir($path);
			if( sizeof($objects) > 0 )
			{
				foreach( $objects as $file )
				{
					if(!($file == "bkp-db" || $file == "bkp-ftp"))
					{
						if( $file == "." || $file == ".." )
						continue;
						// go on
						if( is_dir( $path."/".$file ) )
						{
							$this->copy_r( $path."/".$file, $dest."/".$file );
						}
						else
						{
							copy( $path."/".$file, $dest."/".$file );
						}
					}
				}
			}

			//Compactando o Diretório
			$this->CompactarDiretorio($dest);

			return true;
		}
		elseif( is_file($path) )
		{
			return copy($path, $dest);
		}
		else
		{
			return false;
		}
	}

	public function CompactarDiretorio($dest)
	{
		//Zipando o Arquivo
		$zip = new ZipArchive();
		if ( $zip->open( $dest.'.zip', ZipArchive::OVERWRITE ) )
		{
			foreach( glob( $dest."/*.*" ) as $current )
			$zip->addFile( $current, basename( $current ) );

			$zip->close();
		}
			
		//Elimina o diretório não compactado
		$this->apagar_diretorio($dest."/");
	}
		
	public function GravaBackupBanco()
	{
		//Insere no banco os dados deste backup
		$this->update(array("ultimo_backup" => date("Y-m-d"), "proximo_backup" => $this->getDataProximoBackup()));
	}

	public function getDataProximoBackup()
	{
		//Pega as datas e calcula o tempo do último backup
		$nova_data = date("Y-m-d");
		$calcula_intervalo = strtotime($nova_data . "+30 days"); //Aqui vc especifica intervalo entre o Backup
		$calcula_timestamp=date('Y-m-d', $calcula_intervalo);
			
		//Retorna a data do próximo backup(daqui a 1 semana)
		return $calcula_timestamp;
	}

	public function VerificaUltimoBackup()
	{
		//Busca a data do ultimo backup

		$recordset = $this->read(null,null,null,'1');
		//Data do Próximo Backup
		$data_proximo_backup = $recordset[0]['proximo_backup'];

		if($data_proximo_backup == date("Y-m-d"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function VerificaData($ano_info = null, $mes_info = null, $dia_info = null)
	{
		$data = date('Y-m-d');
		$data = str_replace("-","",$data);
		$ano = substr ( $data, 0, 4 );
		$mes = substr ( $data, 4, 2 );
		$dia = substr ( $data, 6, 2 );
		$novaData = mktime ( 0, 0, 0, $mes - $mes_info, $dia - $dia_info, $ano - $ano_info );
		$antes = strftime("%Y-%m-%d", $novaData);
		return $antes;
	}
	
	public function ExcluiArquivo($data_antiga, $tipo)
	{
		$data_um_ano_atras = strtotime($data_antiga);
		$dir = "./";
		$dh = opendir($dir);
		
		while (false !== ($filename = readdir($dh)))
		{
			if (substr($filename,-4) == $tipo)
			{
				$data = implode("-",array_reverse(explode("-",substr($filename,0,10))));
				
				if(strtotime($data) < $data_um_ano_atras)
				{
					unlink($dir.$filename);
				}
			}
		}
	}
}