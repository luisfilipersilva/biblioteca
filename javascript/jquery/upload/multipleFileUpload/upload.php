<?php
$arquivosName    = $_FILES['arquivo']['name'];
$arquivosTmpName = $_FILES['arquivo']['tmp_name'];

echo "<pre>";
print_r($arquivosName);
echo "</pre>";
$diretorio = 'arquivos/';

$qtd = sizeof($arquivosName);
for ($i=0; $i<$qtd; $i++){
	move_uploaded_file($arquivosTmpName[$i], $diretorio.$arquivosName[$i]);
}
?>