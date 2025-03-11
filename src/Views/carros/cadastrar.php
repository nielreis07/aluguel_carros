<div class="container">
    <h2>Cadastrar Veículos <?php echo $dados['id'] ?? 'N/A' ?></h2>
</div>
<div class="container">
    <?php if (!empty($mensagem)): ?>
        <div class="alert alert-<?php echo $mensagem['type'] ?> alert-dismissible fade show" role="alert">
            <?php echo $mensagem['message'] ?>
            <button type="button" class="btn-close" 
            data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-end">
                <a href="/carros" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card p-3">
                <form action="/carros/salvar" method="post" id="formCadastrarCarro">
                    <input type="hidden" name="id" value="<?php echo $dados['id'] ?? '' ?>">
                    <div class="mb-3">
                        <label for="InputModelo" class="form-label">Modelo</label>
                        <input name="modelo" type="text" value="<?php echo $dados['modelo'] ?? '' ?>"
                            class="form-control" id="InputModelo" aria-describedby="modeloHelp">
                        <div id="modeloHelp" class="form-text">Digite o modelo do carro.</div>
                    </div>

                    <div class="mb-3">
                        <label for="InputMarca" class="form-label">Marca</label>
                        <input name="marca" type="text" value="<?php echo $dados['marca'] ?? '' ?>" 
                            class="form-control" id="InputMarca" aria-describedby="marcaHelp">
                        <div id="marcaHelp" class="form-text">Digite o marca do carro.</div>
                    </div>

                    <div class="mb-3">
                        <label for="InputAno" class="form-label">Ano</label>
                        <input name="ano" type="number" value="<?php echo $dados['ano'] ?? '' ?>" 
                            max="2100" class="form-control" id="InputAno" aria-describedby="anoHelp">
                        <div id="anoHelp" class="form-text">Digite o ano do carro.</div>
                    </div>

                    <div class="mb-3">
                        <label for="InputPlaca" class="form-label">Placa</label>
                        <input name="placa" type="text" value="<?php echo $dados['placa'] ?? '' ?>" 
                            class="form-control" id="InputPlaca" aria-describedby="placaHelp">
                        <div id="placaHelp" class="form-text">Digite a placa do carro.</div>
                    </div>

                    <div class="mb-3">
                        <label for="SelectStatus" class="form-label">Status</label>
                        <select name="status" class="form-select" id="SelectStatus" aria-label="Selecione o status do carro" aria-describedby="statusHelp">
                            <option>Selecione</option>
                            <option value="disponivel" <?php echo $dados['status'] === "disponivel" ? "selected" : "" ?>>Disponível</option>
                            <option value="alugado" <?php echo $dados['status'] === "alugado" ? "selected" : "" ?>>Alugado</option>
                            <option value="manutencao" <?php echo $dados['status'] === "manutencao" ? "selected" : "" ?>>Manutenção</option>
                        </select>
                        <div id="statusHelp" class="form-text">Selecione o status do carro.</div>
                    </div>

                    <div class="mb-3">
                        <label for="InputPreco" class="form-label">Preço</label>
                        <input name="preco" type="number" value="<?php echo $dados['preco'] ?? '' ?>" 
                            class="form-control" id="InputPreco" aria-describedby="precoHelp">
                        <div id="precoHelp" class="form-text">Digite o preço do carro.</div>
                    </div>
                    <div class="mb-3">
                         <label for="InputImagem" class="form-label">Foto do Veículo</label>
                          <input name="imagem" type="text" value="<?php echo $dados['imagem'] ?? '' ?>" 
                         class="form-control" id="InputImagem" placeholder="Inserir">
                        <div id="imagemHelp" class="form-text">Insira a Url</div>
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="limparFormulario()">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="salvarCarro()">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function limparFormulario() {
    if (confirm("Tem certeza que deseja cancelar e limpar os campos?")) {
        const form = document.getElementById("formCadastrarCarro");
        document.getElementById("InputModelo").value = "";
        document.getElementById("InputMarca").value = "";
        document.getElementById("InputAno").value = "";
        document.getElementById("InputPlaca").value = "";
        document.getElementById("SelectStatus").value = "Selecione";
        document.getElementById("InputPreco").value = "";
        document.getElementById("InputImagem").value = "";
    }
}

function salvarCarro() {
    event.preventDefault();
    const msgErrors = [];
    
    const InputModelo = document.getElementById("InputModelo").value;
    const InputMarca = document.getElementById("InputMarca").value;
    const InputAno = document.getElementById("InputAno").value;
    const InputPlaca = document.getElementById("InputPlaca").value;
    const SelectStatus = document.getElementById("SelectStatus").value;
    const InputPreco = document.getElementById("InputPreco").value;
    const InputImagem = document.getElementById("InputImagem").value;
    
    if (InputModelo === "")  msgErrors.push("O campo Modelo é obrigatório.");
    if (InputMarca === "")  msgErrors.push("O campo Marca é obrigatório.");
    if (InputAno === "")  msgErrors.push("O campo Ano é obrigatório.");
    if (InputPlaca === "")  msgErrors.push("O campo Placa é obrigatório.");
    if (SelectStatus === "Selecione")  msgErrors.push("O campo Status é obrigatório.");
    if (InputPreco === "")  msgErrors.push("O campo Preço é obrigatório.");
    if (InputImagem === "")  msgErrors.push("O campo Imagem é obrigatório.");
    
    if (msgErrors.length > 0) {
        alert(msgErrors.join("\n"));
        return;
    }

    const form = document.getElementById("formCadastrarCarro");
    form.submit();
}
</script>