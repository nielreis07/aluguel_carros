<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <h5 class="m-0">
                <img src="https://lh3.googleusercontent.com/gg/AN12HXTl7MxxxErtBkSJVrG2hMqx6vnqhv6suZxgLHxRnwQ8CD6vHZTtZ4eZSE6Er8wKBXoHTSUHSyN0KVJmVdFOfGqenHqNbxvU_7WXG7I079yZDKvQOO85U5Yxrh0_asmOn46YBroslh3xBf31jERZ04yBJl_zh_xncbai6pS1ZhPW3LMeKCZJ0_4Veju8Fko9apPLfyh2ypyaXqt5kdFGZ9WjG6xhwkGIs-gAx-FjVlUW5PL0H0kf_kqNDXLtxl8CbynibMHdM4l7vHK_MORTK9L23LsWAXrPyk2nMuB8j4Q28HHy8t5s-y-f2OdesVKWuM7uB_W4DIwd9bjDk22AQp92" alt="Rentcar Auto Logo" class="img-fluid" style="max-width: 40px;">
            </h5>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Alugar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Novidades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Carros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pacotes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Reservas</a>
                </li>
            </ul>
            <form class="d-flex" action="/carros/buscar" method="GET">
                <input name="pesquisa" class="form-control me-2 rounded-0" type="search" 
                    placeholder="Digite um carro" aria-label="Search" wfd-id="id0">
                <button class="btn btn-outline-light rounded-0" type="submit">Buscar</button>
            </form>
        </div>
    </div>
</nav>
<?= $topMessage ?? '' ?>