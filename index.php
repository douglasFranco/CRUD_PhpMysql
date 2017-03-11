<?php include_once ('dbconfig.php');?>
<?php include_once ('header.php'); ?>

<?php
// delete condition
if(isset($_GET['delete_id'])){
      $delete_query = "DELETE FROM clientes WHERE id=".$_GET['delete_id'];
      $delete_result = $link->query($delete_query);
      header("Location: $_SERVER[PHP_SELF]");
}
?>

      <header class="jumbotron">
            <h1>Cadastro de Clientes</h1>
            <a class="label label-warning" href="index.php">Inicio</a>
            <a class="label label-warning" href="add_data.php">Adicionar Novo</a>
      </header>
      <form class="form-horizontal">
            <div class="form-group">
                  <label for="pesquisa" class="col-sm-2 control-label">Pesquisar</label>
                  <div class="col-sm-10">
                        <input type="text" class="form-control" id="pesquisa" name="pesquisa" value="<?php if(isset($_GET['pesquisa'])){echo $_GET['pesquisa'];} ?>" placeholder="Nome ou CPF">
                  </div>
            </div>
      <form>
      <main class="container">
            <table class="table table-striped">
                  <th>Nome</th>
                  <th>CPF</th>
                  <th>E-mail</th>
                  <th>Telefone</th>
                  <th>Endereço</th>
                  <th colspan="2">Operações</th>
                  </tr>
                  <?php
                  // nome condition search
                  if(isset($_GET['pesquisa'])){
                        $nome = "%".$_GET['pesquisa']."%";
                        $cpf = $_GET['pesquisa'];
                        $select_query="SELECT * FROM  clientes WHERE nome like '$nome' OR cpf = '$cpf'";
                  }else{
                  // all results
                        $select_query="SELECT * FROM clientes";
                  }
                  $select_result = $link->query($select_query);
                  while($cliente = $select_result->fetch_object()):
                  ?>
                  <tr>
                        <td><?php echo $cliente->nome; ?></td>
                        <td><?php echo $cliente->cpf; ?></td>
                        <td><?php echo $cliente->email; ?></td>
                        <td><?php echo $cliente->telefone; ?></td>
                        <td><?php echo $cliente->endereco; ?></td>
                        <td><a href="javascript:edit_id('<?php echo $cliente->id; ?>')"><span class="glyphicon glyphicon-pencil"></span></a></td>
                        <td><a href="javascript:delete_id('<?php echo $cliente->id; ?>')"><span class="glyphicon glyphicon-remove"></span></a></td>
                  </tr>
                  <?php endwhile; ?>

            </table>
      </main>
<?php include_once ('footer.php'); ?>
