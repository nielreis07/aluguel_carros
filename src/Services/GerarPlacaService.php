<?php 

namespace Rentcar\Src\Services;

class GerarPlacaService {

    public function gerarPlaca() {
        $letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $numeros = "0123456789";

        return substr(str_shuffle($letras), 0, 3) .
               substr(str_shuffle($numeros), 0, 1) .
               substr(str_shuffle($letras), 0, 1) .
               substr(str_shuffle($numeros), 0, 2);
    }

}