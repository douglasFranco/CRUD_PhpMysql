<?php include_once ('dbconfig.php');?>
<?php include_once ('header.php'); ?>

<?php
//select register for idition
if(isset($_GET['edit_id'])){
    $edit_query = "SELECT * FROM clientes WHERE id=".$_GET['edit_id'];
    $edit_result = $link->query($edit_query);
    $edit_cliente = $edit_result->fetch_object();
}

if(isset($_POST['btn-update'])){
// variables for input data
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

// sql query for update data into database
    $update_query = "UPDATE clientes SET nome='$nome',cpf='$cpf',email='$email',telefone='$telefone',endereco='$endereco' WHERE id=".$_GET['edit_id'];
    $update_result = $link->query($update_query);

 // sql query execution function
    if($update_result){
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
                    <input class="form-control" type="text" maxlength="100" name="nome" placeholder="Nome" value="<?php echo $edit_cliente->nome; ?>" required />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="cpf">CPF</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" max="99999999999" name="cpf" placeholder="CPF" value="<?php echo $edit_cliente->cpf; ?>" required />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="email">E-mail</label>
                <div class="col-sm-10">
                    <input class="form-control" type="email" maxlength="100" name="email" placeholder="E-mail" value="<?php echo $edit_cliente->email; ?>" required />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="telefone">Telefone</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" max="99999999999" name="telefone" placeholder="Telefone" value="<?php echo$edit_cliente->telefone; ?>" required />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="endereco">Endereço</label>
                <div class="col-sm-10">
                    <input class="form-control" id="endereco" type="text" maxlength="150" name="endereco" placeholder="Endereço" value="<?php echo $edit_cliente->endereco; ?>" required />
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
<?php include_once ('footer.php'); ?>
