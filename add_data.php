<?php
include_once 'dbconfig.php';
if(isset($_POST['btn-save']))
{
 // variables for input data
 $nome = $_POST['nome'];
 $cpf = $_POST['cpf'];
 $email = $_POST['email'];
 $telefone = $_POST['telefone'];
 $endereco = $_POST['endereco'];
 // variables for input data

 // sql query for inserting data into database
 $sql_query = "INSERT INTO clientes(nome,cpf,email,telefone,endereco) VALUES('$nome','$cpf','$email','$telefone','$endereco')";
 // sql query for inserting data into database
 
 // sql query execution function
 if(mysql_query($sql_query)) {
    ?>
    <script type="text/javascript">
        alert('Cadastro concluido com sucesso');
        window.location.href='index.php';
    </script>
    <?php
 } else {
    ?>
    <script type="text/javascript">
        alert('Erro no processo de cadastramento');
    </script>
    <?php
 }
// sql query execution function
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Cadastro - Novo Cliente</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>     
    <header class="jumbotron">            
        <h1>Novo Cadastro</h1>  
        <a class="label label-warning" href="index.php">Inicio</a>
        <a class="label label-warning" href="add_data.php">Adicionar Novo</a>                   
    </header>    
    <main class="container">      
        <form class="form-horizontal" method="post">        
            <div class="form-group">
                <label class="col-sm-2 control-label" for="nome">Nome</label>      
                <div class="col-sm-10">
                    <input class="form-control" type="text" maxlength="100" name="nome" placeholder="Nome" required />  
                </div>      
            </div> 
            <div class="form-group">
                <label class="col-sm-2 control-label" for="cpf">CPF</label>      
                <div class="col-sm-10">   
                    <input class="form-control" type="number" max="99999999999" name="cpf" placeholder="CPF" required />
                </div>      
            </div> 
            <div class="form-group">
                <label class="col-sm-2 control-label" for="email">E-mail</label>      
                <div class="col-sm-10">       
                    <input class="form-control" type="email" maxlength="100" name="email" placeholder="E-mail" required />
                </div>      
            </div> 
            <div class="form-group">
                <label class="col-sm-2 control-label" for="telefone">Telefone</label>      
                <div class="col-sm-10">   
                    <input class="form-control" type="number" max="99999999999" name="telefone" placeholder="Telefone" required />
                </div>      
            </div> 
            <div class="form-group">
                <label class="col-sm-2 control-label" for="endereco">Endereço</label> 
                <div class="col-sm-10">
                    <input class="form-control" id="endereco" type="text" maxlength="150" name="endereco" placeholder="Endereço" required />            
                </div>      
            </div> 
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">           
                    <button class="btn btn-success" type="submit" name="btn-save">Salvar</button> 
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