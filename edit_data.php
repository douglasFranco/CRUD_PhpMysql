<?php
include_once 'dbconfig.php';

if(isset($_GET['edit_id'])){
    $sql_query="SELECT * FROM clientes WHERE id=".$_GET['edit_id'];
    $result_set=mysql_query($sql_query);
    $fetched_row=mysql_fetch_array($result_set);
}

if(isset($_POST['btn-update'])){
// variables for input data
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

// sql query for update data into database
    $sql_query = "UPDATE clientes SET nome='$nome',cpf='$cpf',email='$email',telefone='$telefone',endereco='$endereco' WHERE id=".$_GET['edit_id'];
  
 // sql query execution function
 if(mysql_query($sql_query)){
    ?>
    <script type="text/javascript">
    alert('Cadastro alterado com sucesso!');
    window.location.href='index.php';
    </script>
    <?php
    } else {
    ?>
    <script type="text/javascript">
    alert('Ocorreu um erro ao tentar salvar a alteração.');
    </script>
    <?php
 } 
 // sql query execution function
}

if(isset($_POST['btn-cancel'])){
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Cadastro - Editar Cliente</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
    <header class="jumbotron">            
        <h1>Editar Cadastro</h1>
        <a class="label label-warning" href="index.php">Inicio</a>
        <a class="label label-warning" href="add_data.php">Adicionar Novo</a>              
    </header>    
    <main class="container">  
        <form class="form-horizontal" method="post">  
            <div class="form-group">
                <label class="col-sm-2 control-label" for="nome">Nome</label>      
                <div class="col-sm-10">
                    <input class="form-control" type="text" maxlength="100" name="nome" placeholder="Nome" value="<?php echo $fetched_row['nome']; ?>" required />  
                </div>      
            </div> 
            <div class="form-group">
                <label class="col-sm-2 control-label" for="cpf">CPF</label>      
                <div class="col-sm-10">   
                    <input class="form-control" type="number" max="99999999999" name="cpf" placeholder="CPF" value="<?php echo $fetched_row['cpf']; ?>" required />
                </div>      
            </div> 
            <div class="form-group">
                <label class="col-sm-2 control-label" for="email">E-mail</label>      
                <div class="col-sm-10">       
                    <input class="form-control" type="email" maxlength="100" name="email" placeholder="E-mail" value="<?php echo $fetched_row['email']; ?>" required />
                </div>      
            </div> 
            <div class="form-group">
                <label class="col-sm-2 control-label" for="telefone">Telefone</label>      
                <div class="col-sm-10">   
                    <input class="form-control" type="number" max="99999999999" name="telefone" placeholder="Telefone" value="<?php echo $fetched_row['telefone']; ?>" required />
                </div>      
            </div> 
            <div class="form-group">
                <label class="col-sm-2 control-label" for="endereco">Endereço</label> 
                <div class="col-sm-10">
                    <input class="form-control" id="endereco" type="text" maxlength="150" name="endereco" placeholder="Endereço" value="<?php echo $fetched_row['endereco']; ?>" required />            
                </div>      
            </div> 
            <div class="form-group">  
                <div class="col-sm-offset-2 col-sm-10">         
                    <button class="btn btn-info" type="submit" name="btn-update">Gravar</button>
                    <button class="btn btn-primary" type="submit" name="btn-cancel">Cancelar</button>
                </div>
            </div>            
        </form>
    </main>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUTWROOngyNcHMVkTqAdN3HUnM-pgkG0c&libraries=places"></script>
    <script type="text/javascript">
        var input = document.getElementById('endereco');
        autocomplete = new google.maps.places.Autocomplete(input);
    </script> 
</body>
</html>