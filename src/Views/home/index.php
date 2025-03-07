<div class="container">
    <h2>Veículos</h2>
</div>
<div class="container">
    <div class="row">
        <?php if (!empty($carros)): ?>
            <?php foreach ($carros as $carro): ?>
                <div class="col-md-4 p-3">
                    <div class="card" style="width: 15rem;">
                        <img src="<?php echo $carro['imagem']; ?>"
                            class="card-img-top" alt="Chevrolet Onix">

                        <div class="card-body">
                            <h5 class="card-title"><?php echo $carro['modelo']; ?></h5>
                            <p class="card-text">Marca: <?php echo $carro['marca']; ?></p>
                            <p class="card-text">Ano: <?php echo $carro['ano']; ?></p>
                            <p class="card-text">Preço: R$ <?php echo number_format(
                                                                $carro['preco'],
                                                                2,
                                                                ',',
                                                                '.'
                                                            );
                                                            ?></p>
                            <a href="#" class="btn btn-primary">Alugar</a>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhum carro encontrado.</p>
        <?php endif; ?>
    </div>
</div>