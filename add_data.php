<?php include_once ('dbconfig.php'); ?>
<?php include_once ('header.php'); ?>

<?php
if(isset($_POST['btn-save'])){
    // variables for input data
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];


    // sql query for inserting data into database
    $insert_query = "INSERT INTO clientes(nome,cpf,email,telefone,endereco) VALUES('$nome','$cpf','$email','$telefone','$endereco')";
    $insert_result = $link->query($insert_query);

    // sql query execution function
    if($insert_result) {
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

}
?>
    <header class="jumbotron">
        <h1>Novo Cadastro</h1>
        <a class="label label-warning" href="index.php">Inicio</a>
        <a class="label label-warning" href="add_data.php">Adicionar Novo</a>
    </header>
    <main class="container add-page">
        <form class="form-horizontal" method="post">
            <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10">
                    <input class="form-control" type="text" maxlength="100" name="nome" placeholder="Nome" required />
                    <input class="form-control" type="number" max="99999999999" name="cpf" placeholder="CPF" required />
                    <input class="form-control" type="email" maxlength="100" name="email" placeholder="E-mail" required />
                    <input class="form-control" type="number" max="99999999999" name="telefone" placeholder="Telefone" required />
                    <input class="form-control" id="endereco" type="text" maxlength="150" name="endereco" placeholder="Endereço" required />
                    <button class="btn btn-success" type="submit" name="btn-save">Salvar</button>
                </div>
            </div>
        </form>
    </main>
<?php include_once ('footer.php'); ?>
