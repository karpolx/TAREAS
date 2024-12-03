<?php

namespace App\Services;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaService
{
    public function getCategorias()
    {
        return Categoria::all();
    }

    public function createCategoria(array $data)
    {
        return Categoria::create($data);
    }

    public function updateCategoria(Categoria $categoria, array $data)
    {
        $categoria->update($data);
        return $categoria;
    }

    public function deleteCategoria(Categoria $categoria)
    {
        return $categoria->delete();
    }
}