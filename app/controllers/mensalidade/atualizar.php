<?php
require_once("../../lib/conexao.php");
require_once("../../models/mensalidade/mensalidade.php");
$id = $_GET['id'];
$name = $_GET['name'];
$contract_id = $_GET['contract_id'];

$conexao = new conexao();
$mensalidade = new mensalidade();
$texto = '';
if(isset($id) && isset($name)){
    if($name == 'm'){
        $query = "UPDATE mensalidades SET mensalidade_status = 1 WHERE id="."'$id'";
		$sql = $conexao->query($query);
    }
    if($name == 'r'){
        $query = "UPDATE mensalidades SET repasse_status = 1 WHERE id="."'$id'";
		$sql = $conexao->query($query);
    }
    if($sql){
        header("Location: consulta.php?id=$contract_id");
    }else{
        $texto = "Erro ao tentar atualizar";
    }
}
?>
<html>
<head>
	<title>Sistema de Gestão de imobiliária</title>
</head>
<body>
	<h3 align="center">Sistema de Gestão de imobiliária</h3>
	<hr />
	<p align="center">
	<a href="../../views/cliente/cadastrar.php">Cadastrar Clientes</a>
	<a href="../../views/proprietario/cadastrar.php">Cadastrar Proprietários</a>
	<a href="../../views/imovel/cadastrar.php">Cadastrar Imovéis</a>
	<a href="../../views/contrato/cadastrar.php">Cadastrar Contratos</a>
	</p>
	<hr />
    <p align="center"><?=$texto?></p>
</body>
</html>