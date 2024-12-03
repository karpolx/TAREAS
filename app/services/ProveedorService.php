<?php
namespace App\Services;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorService
{
    public function getProveedores()
    {
        return Proveedor::all();
    }

    public function createProveedor(array $data)
    {
        return Proveedor::create($data);
    }

    public function updateProveedor(Proveedor $proveedor, array $data)
    {
        $proveedor->update($data);
        return $proveedor;
    }

    public function deleteProveedor(Proveedor $proveedor)
    {
        return $proveedor->delete();
    }
}