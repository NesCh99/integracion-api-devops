<?php

namespace App\Http\Servicios;

use Exception;
use Illuminate\Support\Facades\Http;

class Libreria
{
    public $url;

    public function __construct()
    {
        $this->url = 'http://www.etnassoft.com/api/v1/get/';
    }

    public function getCategorias()
    {
        try{
            $endPoint = $this->url.'?get_categories=all';
            $respuesta = Http::get($endPoint);
            return json_decode($respuesta);
        }catch(Exception $e){
            throw $e;
        }
    }

    public function getLibrosPorCategoria(string $categoria)
    {
        try{
            $endPoint = $this->url.'?category='.$categoria;
            $respuesta = Http::get($endPoint);
            return json_decode($respuesta);
        }catch(Exception $e){
            throw $e;
        }
    }

    public function getLibrosPorAño(string $año)
    {
        try{
            $endPoint = $this->url.'?publisher_date='.$año;
            $respuesta = Http::get($endPoint);
            return json_decode($respuesta);
        }catch(Exception $e){
            throw $e;
        }
    }

    public function getLibroPorId(string $id)
    {
        try{
            $endPoint = $this->url.'?id='.$id;
            $respuesta = Http::get($endPoint);
            return json_decode($respuesta);
        }catch(Exception $e){
            throw $e;
        }
    }
}
