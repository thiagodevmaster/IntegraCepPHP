<?php require_once __DIR__ . "/layout/inicio.php";  ?>

<?php 
    if(isset($end)){
        require_once __DIR__ . "/formularioDeEdicao.php";
    }else{
        require_once __DIR__ . "/formularioDeCriacao.php";
    }
?>

<br>
<hr>
<br>
<div class="mb-5">
<table id="table-enderecos" class="table table-dark table-striped mb-4" style="width:100%">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cep</th>
                <th>Número</th>
                <th>Complemento</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($enderecos as $endereco):?>
                <tr>
                    <td><?= $endereco['nome']; ?></td>
                    <td><?= $endereco['cep']; ?></td>
                    <td ><?= $endereco['numero']; ?></td>
                    <td><?= $endereco['complemento']; ?></td>
                    <td align="center">
                        <a href="/editar?id=<?= $endereco['id']?>" class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-user-pen"></i>
                        </a>
                    </td>
                    <td align="center">
                       <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalExcluir">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </td>
                    <?php require_once __DIR__."/modal-exclusao.php"; ?>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    </div>
<?php require_once __DIR__ . "/layout/fim.php";  ?>