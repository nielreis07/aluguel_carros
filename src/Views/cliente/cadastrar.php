<div class="container">
    <h2>Cadastrar Cliente <?php echo $dados['id'] ?? '' ?></h2>
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
                <a href="/clientes" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card p-3">
                <form action="/clientes/salvar" method="post" id="formCadastrarCliente">
                    <input type="hidden" name="id" value="<?php echo $dados['id'] ?? '' ?>">
                    <div class="mb-3">
                        <label for="InputNome" class="form-label">Nome</label>
                        <input name="nome_completo" type="text" value="<?php echo $dados['nome_completo'] ?? '' ?>"
                            class="form-control" id="InputNome" aria-describedby="nomeHelp">
                        <div id="nomeHelp" class="form-text">Digite seu Nome.</div>
                    </div>

                    <div class="mb-3">
                        <label for="InputDataNascimento" class="form-label">Data de nascimento</label>
                        <input name="data_nascimento" type="date" value="<?php echo $dados['data_nascimento'] ?? '' ?>" 
                            class="form-control" id="InputDataNascimento" aria-describedby="dataNascimentoHelp">
                        <div id="dataNascimentoHelp" class="form-text">Digite a seu nascimento.</div>
                    </div>

                    <div class="mb-3">
                        <label for="InputCpf" class="form-label">CPF</label>
                        <input name="cpf" type="number" value="<?php echo $dados['cpf'] ?? '' ?>" 
                            max="2100" class="form-control" id="InputCpf" aria-describedby="cpfHelp">
                        <div id="cpfHelp" class="form-text">Digite seu CPF</div>
                    </div>

                    <div class="mb-3">
                        <label for="InputCnh" class="form-label">CNH</label>
                        <input name="cnh" type="text" value="<?php echo $dados['cnh'] ?? '' ?>" 
                            class="form-control" id="InputCnh" aria-describedby="cnhHelp">
                        <div id="cnhHelp" class="form-text">Digite a CNH</div>
                    </div>

                    <div class="mb-3">
                        <label for="InputEmail" class="form-label">E-mail</label>
                        <input name="email" type="text" value="<?php echo $dados['email'] ?? '' ?>" 
                            class="form-control" id="InputEmail" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Digite o E-mail.</div>
                    </div>

                    <div class="mb-3">
                        <label for="InputTelefone" class="form-label">Telefone</label>
                        <input name="telefone" type="string" value="<?php echo $dados['telefone'] ?? '' ?>" 
                            class="form-control" id="InputTelefone" aria-describedby="telefoneHelp">
                        <div id="telefoneHelp" class="form-text">Digite o seu Número.</div>
                    </div>
                    <div class="mb-3">
                        <label for="InputEndereco" class="form-label">Endereço</label>
                        <input name="endereco" type="string" value="<?php echo $dados['endereco'] ?? '' ?>" 
                            class="form-control" id="InputEndereco" aria-describedby="enderecoHelp">
                        <div id="enderecoHelp" class="form-text"></div>
                    </div>
                    </div>
                    <button type="button" class="btn btn-secondary" onclick="limparFormulario()">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="salvarCliente()">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function limparFormulario() {
    if (confirm("Tem certeza que deseja cancelar e limpar os campos?")) {
        const form = document.getElementById("formCadastrarCliente");
        document.getElementById("InputNome").value = "";
        document.getElementById("InputDataNascimento").value = "";
        document.getElementById("InputCpf").value = "";
        document.getElementById("InputCnh").value = "";
        document.getElementById("InputEmail").value = "";
        document.getElementById("InputTelefone").value = "";
        document.getElementById("InputEndereco").value = "";
    }
}

function salvarCliente() {
    event.preventDefault();
    const msgErrors = [];
    
    const inputNome = document.getElementById("InputNome").value;
    const inputDataNascimento = document.getElementById("InputDataNascimento").value;
    const inputCpf = document.getElementById("InputCpf").value;
    const inputCnh = document.getElementById("InputCnh").value;
    const inputEmail = document.getElementById("InputEmail").value;
    const inputEndereco = document.getElementById("InputEndereco").value;
    
    if (inputNome === "")  msgErrors.push("O campo Nome é obrigatório.");
    if (inputDataNascimento === "")  msgErrors.push("O campo Data é obrigatório.");
    if (inputCpf === "")  msgErrors.push("O campo Cpf é obrigatório.");
    if (inputCnh === "")  msgErrors.push("O campo Cnh é obrigatório.");
    if (inputEmail === "")  msgErrors.push("O campo Email é obrigatório.");
    if (inputEndereco === "")  msgErrors.push("O campo Endereço é obrigatório.");
    
    if (msgErrors.length > 0) {
        alert(msgErrors.join("\n"));
        return;
    }

    const form = document.getElementById("formCadastrarCliente");
    form.submit();
}
</script>