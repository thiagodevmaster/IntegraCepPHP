<!-- Modal -->
<div class="modal fade" id="modalExcluir" tabindex="-1" aria-labelledby="modalExcluirLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5 text-black" id="modalExcluirLabel">Deseja realmente excluir?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-black">
                <p>Nome: <strong><?= $endereco['nome']; ?></strong></p>
                <p>Cep: <strong><?= $endereco['cep']; ?></strong></p>
                <p>Número: <strong><?= $endereco['numero']; ?></strong></p>
                <p>Complemento: <strong><?= $endereco['complemento']; ?></strong></p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="/deletar" method="post">
                    <input type="hidden" name="id" value="<?= $endereco['id']?>">
                    <button type="submit" class="btn btn-danger" data-exclusao>Excluir usuário!</button>
                </form>
            </div>

        </div>
    </div>
</div>