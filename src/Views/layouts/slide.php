<div class="container d-flex justify-content-center">
    <div id="carouselExampleIndicators" class="carousel slide w-50" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item">
                <img src="https://garagem360.com.br/wp-content/uploads/2023/08/Equinox.jpg" class="d-block w-100" alt="Carro disponível para aluguel">
            </div>
            <div class="carousel-item active">
                <img src="https://fotos-jornaldocarro-estadao.nyc3.cdn.digitaloceanspaces.com/uploads/2019/01/16132438/tracker-novo-1160x773.jpg" class="d-block w-100" alt="Carro disponível para aluguel">
            </div>
            <div class="carousel-item">
                <img src="https://quatrorodas.abril.com.br/wp-content/uploads/2019/12/20191206_122327-e1575753888705.jpg?quality=70&strip=info" class="d-block w-100" alt="Carro disponível para aluguel">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<?php foreach ($slides as $slide): ?>
    <img src="<?= $slide ?>" alt="Slide">
<?php endforeach; ?>