<?php
require_once 'Aluno.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Davos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js" integrity="sha512-8pHNiqTlsrRjVD4A/3va++W1sMbUHwWxxRPWNyVlql3T+Hgfd81Qc6FC5WMXDC+tSauxxzp1tgiAvSKFu1qIlA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <?php
        //RECEBENDO OS DADOS DO FORMULÁRIO E SALVANDO NO BANCO DE DADOS
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $Aluno = new Aluno();
        $Aluno->cadastrarAluno($dados);
        ?>

        <form class="col-md-12 formulario" method="POST" action="">
            <h3 class="col-md-12">Cadastrar alunos</h3>
            <div class="form-group col-md-6">
                <label for="name">Nome</label>
                <input type="text" class="form-control form-control-sm" id="nome" name="nome">
            </div>
            <div class="form-group col-md-6">

                <label for="email">Email</label>
                <input type="email" class="form-control form-control-sm" id="email" name="email">

            </div>
            <div class="form-group col-md-6">
                <label for="password">Senha</label>
                <input type="password" class="form-control form-control-sm" id="senha" name="senha">
            </div>
            <div class="form-group col-md-6">
                <label for="mensalidade">Mensalidade</label>
                <input type="number" class="form-control form-control-sm" id="mensalidade" name="mensalidade">
            </div>
            <div class="form-group col-md-6">
                <label for="mensalidade">Telefone</label>
                <input type="number" class="form-control form-control-sm" id="mensalidade" name="telefone">
            </div>
            <div class="form-group col-md-6">
                <label for="situacao">Situação</label>
                <select class="form-control form-control-sm" id="situacao" name="situacao">
                    <option></option>
                    <option value="Ativo">Ativo</option>
                    <option value="Inativo">Inativo</option>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="observacao">Observação</label>
                <textarea name="observacao" id="observacao" class="form-control form-control-sm" id="observacao" rows="1"></textarea>
            </div>

            <input type="submit" class="btn btn-primary" name="cadastro_usuario" value="Salvar"></input>
        </form>

        <div class="col-md-12 tabela">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Situação</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Senha</th>
                        <th scope="col">Mensalidade</th>
                        <th scope="col">Observação</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //TRAZENDO TODOS OS ALUNOS CADASTRADOS
                    $aluno = new Aluno();
                    $lista_alunos = $aluno->trazerAlunos($dados);
                
                    foreach ($lista_alunos as $la) {
                        echo "<tr>";
                        echo "<td>" . $la['id'] . "</td>";
                        echo "<td>" . $la['nome'] . "</td>";
                        echo "<td>" . $la['situacao'] . "</td>";
                        echo "<td>" . $la['telefone'] . "</td>";
                        echo "<td>" . $la['email'] . "</td>";
                        echo "<td>" . $la['senha'] . "</td>";
                        echo "<td>" . $la['mensalidade'] . "</td>";
                        echo "<td>" . $la['observacao'] . "</td>";

                    ?>

                        <td>
                            <a href="" class='btn btn-primary'><i class='fa fa-pencil' aria-hidden='true'></i></a>
                            <a href="index.php?id=<?php echo $la['id'] ?>" class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true'></i></a>
                        </td>

                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>


<!-- DELETAR ALUNOS DO BD -->
<?php
if (isset($_GET['id'])) {

    $id_aluno = $_GET['id'];
    $Aluno = new Aluno();
    $Aluno->deletarAluno($id_aluno);

}
?>