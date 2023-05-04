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
                <th>Id</th>
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
                    <td><?= $endereco['id']; ?></td>
                    <td><?= $endereco['nome']; ?></td>
                    <td><?= $endereco['cep']; ?></td>
                    <td><?= $endereco['numero']; ?></td>
                    <td><?= $endereco['complemento']; ?></td>
                    <td>
                        <a href="/editar?id=<?= $endereco['id']?>" class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-user-pen"></i>
                        </a>
                    </td>
                    <td>
                        <form action="/deletar" method="post">
                            <input type="hidden" name="id" value="<?= $endereco['id']?>">
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    </div>
<?php require_once __DIR__ . "/layout/fim.php";  ?>