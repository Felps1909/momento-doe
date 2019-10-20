<?php
    namespace Source\Model;
     class UploadImage{
        private $arquivo;
        private $altura;
        private $largura;
        private $pasta;
 
        function __construct($arquivo, $pasta, $altura = 256, $largura = 256){
            $this->arquivo = $arquivo;
            $this->altura  = $altura;
            $this->largura = $largura;
            $this->pasta   = $pasta;
        }
         
        private function getExtensao(){
            //retorna a extensao da imagem  
            return $extensao = @strtolower(end(explode('.', $this->arquivo['name'])));
        }
         
        private function ehImagem($extensao){
            $extensoes = array('gif', 'jpeg', 'jpg', 'png');     // extensoes permitidas
            if (in_array($extensao, $extensoes))
                return true;    
        }
         
        //largura, altura, tipo, localizacao da imagem original
        private function redimensionar($imgLarg, $imgAlt, $tipo, $img_localizacao){
            //descobrir novo tamanho sem perder a proporcao
            if ( $imgLarg > $imgAlt ){
                $novaLarg = $this->largura;
                $novaAlt = round( ($novaLarg / $imgLarg) * $imgAlt );
            }
            elseif ( $imgAlt > $imgLarg ){
                $novaAlt = $this->altura;
                $novaLarg = round( ($novaAlt / $imgAlt) * $imgLarg );
            }
            else // altura == largura
                $novaAltura = $novaLargura = max($this->largura, $this->altura);
             
            //redimencionar a imagem
             
            //cria uma nova imagem com o novo tamanho   
            $novaimagem = imagecreatetruecolor($novaLarg, $novaAlt);
             
            switch ($tipo){
                case 1: // gif
                    $origem = imagecreatefromgif($img_localizacao);
                    imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0,
                    $novaLarg, $novaAlt, $imgLarg, $imgAlt);
                    imagegif($novaimagem, $img_localizacao);
                    break;
                case 2: // jpg
                    $origem = imagecreatefromjpeg($img_localizacao);
                    imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0,
                    $novaLarg, $novaAlt, $imgLarg, $imgAlt);
                    imagejpeg($novaimagem, $img_localizacao);
                    break;
                case 3: // png
                    $origem = imagecreatefrompng($img_localizacao);
                    imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0,
                    $novaLarg, $novaAlt, $imgLarg, $imgAlt);
                    imagepng($novaimagem, $img_localizacao);
                    break;
            }
             
            //destroi as imagens criadas
            imagedestroy($novaimagem);
            imagedestroy($origem);
        }
         
        public function salvar(){ 
            if(is_null($this->arquivo)){
                return [
                    'success'=>false,
                    'message'=>"Nenhuma arquivo foi enviado."
                ];
            }
            // var_dump($this->arquivo);
            switch(@$this->arquivo['errors']){
                case UPLOAD_ERR_INI_SIZE:
                    return [
                        'success'=> false,
                        'message'=>"O arquivo enviado excede o limite definido na diretiva upload_max_filesize do php.ini."
                    ];
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    return [
                        'success'=> false,
                        'message'=>"O arquivo excede o limite definido em MAX_FILE_SIZE no formulário HTML."
                    ];
                    break;
                case UPLOAD_ERR_PARTIAL:
                    return [
                        'success'=> false,
                        'message'=>" O upload do arquivo foi feito parcialmente."
                    ];
                    break;
                case UPLOAD_ERR_NO_FILE:
                    return [
                        'success'=> false,
                        'message'=>" Nenhum arquivo foi enviado."
                    ];
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    return [
                        'success'=> false,
                        'message'=>"  Pasta temporária ausênte. Introduzido no PHP 5.0.3."
                    ];
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    return [
                        'success'=> false,
                        'message'=>"  Falha em escrever o arquivo em disco. Introduzido no PHP 5.1.0."
                    ];
                    break;
                case UPLOAD_ERR_EXTENSION:                
                    return [
                        'success'=> false,
                        'message'=>" Uma extensão do PHP interrompeu o upload do arquivo. O PHP não fornece uma maneira de determinar qual extensão causou a interrupção. Examinar a lista das extensões carregadas com o phpinfo() pode ajudar. Introduzido no PHP 5.2.0."
                    ];
                    break;
                default:

            }                                     
            $extensao = $this->getExtensao();
             
            //gera um nome unico para a imagem em funcao do tempo
            $novo_nome = time() . '.' . $extensao;
            //localizacao do arquivo 
            $destino = $this->pasta . $novo_nome;
             
            //move o arquivo
            if (! move_uploaded_file($this->arquivo['tmp_name'], $destino)){
               
                   return [
                        'success'=> false,
                        'message'=>"Não foi possivel mover o arquivo. "
                    ]; 
            }
                 
            if ($this->ehImagem($extensao)){                                             
                //pega a largura, altura, tipo e atributo da imagem
                list($largura, $altura, $tipo, $atributo) = getimagesize($destino);
 
                // testa se é preciso redimensionar a imagem
                if(($largura > $this->largura) || ($altura > $this->altura))
                    $this->redimensionar($largura, $altura, $tipo, $destino);
            }
            return [
                'success' => true,
                'url'=> $destino,
                'message' => "Sucesso"
            ];
        }                       
    }
?>