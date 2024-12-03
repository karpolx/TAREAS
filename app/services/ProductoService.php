<?php
namespace App\Services;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoService
{
    public function getProducto()
    {
        return Producto::all();
    }

    public function createProducto(array $data)
    {
        return Producto::create($data);
    }

    public function updateProducto(Producto $producto, array $data)
    {
        $producto->update($data);
        return $producto;
    }

    public function deleteProducto(Producto $producto)
    {
        return $producto->delete();
    }
}