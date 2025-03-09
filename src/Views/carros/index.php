<div class="container">
    <h2>Veículos</h2>
</div>
<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Ano</th>
                <th>Preço</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($carros)) {
                foreach ($carros as $carro) {
                    echo "<tr>";
                    echo "<td>{$carro['id']}</td>";
                    echo "<td>{$carro['marca']}</td>";
                    echo "<td>{$carro['modelo']}</td>";
                    echo "<td>{$carro['ano']}</td>";
                    echo "<td>R$ " . number_format($carro['preco'], 2, ',', '.') . "</td>";
                    echo "<td>";
                    echo "<a href='/carros/cadastrar/{$carro['id']}' class='btn btn-primary'>Editar</a> ";
                    echo "<button onclick='excluirCarro({$carro['id']})' class='btn btn-danger'>Excluir</button>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Nenhum carro encontrado.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    function excluirCarro(id) {
        if (confirm('Deseja realmente excluir este carro?')) {
            window.location.href = '/carros/excluir/' + id;
        }
    }
</script>