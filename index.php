<?php
include_once 'dbconfig.php'; 
      
// delete condition
if(isset($_GET['delete_id'])){
      $sql_query="DELETE FROM clientes WHERE id=".$_GET['delete_id'];
      mysql_query($sql_query);
      header("Location: $_SERVER[PHP_SELF]"); 
}
?>

<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8"/>
      <title>Cadastro - Clientes</title>      
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link rel="stylesheet" href="style.css" type="text/css" />
      <script type="text/javascript">
      function edit_id(id){           
            window.location.href='edit_data.php?edit_id='+id;            
      }
      function delete_id(id){
            if(confirm('Sure to Delete ?')){
                  window.location.href='index.php?delete_id='+id;
            }
      }
      </script>
</head>
<body>
      <header class="jumbotron">
            <h1>Cadastro de Clientes</h1>  
            <a class="label label-warning" href="index.php">Inicio</a>
            <a class="label label-warning" href="add_data.php">Adicionar Novo</a>                   
      </header>
      <form class="form-horizontal">
            <div class="form-group">
                  <label for="pesquisa" class="col-sm-2 control-label">Pesquisa</label>
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
                  <th colspan="2">Operations</th>
                  </tr>
                  <?php
                  // nome condition search
                  if(isset($_GET['pesquisa'])){
                        $nome = "%".$_GET['pesquisa']."%";
                        $cpf = $_GET['pesquisa'];
                        $sql_query="SELECT * FROM  clientes WHERE nome like '$nome' OR cpf = '$cpf'";                 
                  }else{                  
                  // all results
                        $sql_query="SELECT * FROM clientes";                  
                  }   
                  $result_set=mysql_query($sql_query);                     
                  while($row=mysql_fetch_row($result_set)):
                  ?>
                  <tr>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo $row[2]; ?></td>
                        <td><?php echo $row[3]; ?></td>
                        <td><?php echo $row[4]; ?></td>
                        <td><?php echo $row[5]; ?></td>
                        <td><a href="javascript:edit_id('<?php echo $row[0]; ?>')"><span class="glyphicon glyphicon-pencil"></span></a></td>
                        <td><a href="javascript:delete_id('<?php echo $row[0]; ?>')"><span class="glyphicon glyphicon-remove"></span></a></td>
                  </tr>
                  <?php endwhile; ?>
            
            </table>
      </main>     
</body>
</html>