<h1>Cadastre um endereço</h1>

<form action="/criar" method="post" class="mt-4">
    <div class="row">

        <div class="mb-3 col-6">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" name="nome" id="nome" required autofocus>
        </div>

        <div class="mb-3 col-4">
            <label for="cep" class="form-label">Cep:</label>
            <input type="text" 
                class="form-control" 
                name="cep" 
                id="cep" 
                placeholder="ex: 00000-000" 
                minlength="8" 
                maxlength="9" 
                required>
        </div>

        <div class="mb-3 col-2">
            <label for="numero" class="form-label">Número:</label>
            <input type="text" class="form-control" name="numero" id="numero" placeholder="ex: 68" required>
        </div>

        <div class="mb-3 col-10">
            <label for="complemento" class="form-label">Complemento:</label>
            <input type="text" class="form-control" name="complemento" id="complemento" placeholder="ex: casa 5  ou  apt 104" required>
        </div>
    </div>

    <button type="submit" class="btn btn-dark mt-3">Cadastrar Endereço</button>
</form>