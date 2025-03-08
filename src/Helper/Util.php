<?php 

namespace App\Helper;


class Util
{
    public function formataPreco($preco)
    {
        return number_format($preco, 2, ',', '.');
    }
}