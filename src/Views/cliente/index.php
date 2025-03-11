<div class="container">
    <h2>Cliente</h2>
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
        <div class="col-12 mb-4">
            <?php include 'pesquisa.php'; ?>
        </div>
        <div class="col-12">

            <table class="table table-striped">
                <thead>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Data de nascimento</th>
                    <th>CPF</th>
                    <th>CNH</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </thead>
                <tbody>
                    <?php
                    if (!empty($clientes)) {
                        foreach ($clientes as $cliente) {
                            echo "<tr>";
                            echo "<td>{$cliente['id']}</td>";
                            echo "<td>{$cliente['nome_completo']}</td>";
                            echo "<td>{$cliente['data_nascimento']}</td>";
                            echo "<td>{$cliente['cpf']}</td>";
                            echo "<td>{$cliente['cnh']}</td>";
                            echo "<td>{$cliente['email']}</td>";
                            echo "<td>{$cliente['telefone']}</td>";
                            echo "<td>{$cliente['endereco']}</td>";
                            echo "<td>";
                            echo "<a href='/clientes/cadastrar/{$cliente['id']}' class='btn btn-primary'>Editar</a> ";
                            echo "<button onclick='excluirCliente({$cliente['id']})' class='btn btn-danger'>Excluir</button>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Nenhum cliente encontrado.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-12">
            <div><a href='/clientes/cadastrar' class='btn btn-primary'>Cadastrar</a></div>
        </div>
    </div>
</div>

<script>
    function excluirCliente(id) {
        if (confirm('Deseja realmente excluir este cadastro?')) {
            window.location.href = '/clientes/excluir/' + id;
        }
    }
</script>