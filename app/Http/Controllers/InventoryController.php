<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();

        if ($request->has('product_id')) {
            $productId = $request->input('product_id');
            $product = Product::findOrFail($productId);

            $details = $this->calculateRecommendationDetails($product);

            return view('inventory.index', [
                'products' => $products,
                'product' => $product,
                'details' => $details
            ]);
        }

        return view('inventory.index', ['products' => $products]);
    }

private function calculateRecommendationDetails($product)
{
    $currentStock = $product->current_stock;
    $reorderThreshold = $product->reorder_threshold;
    $method = $product->method;
    $type = $product->type;

    $recommendedQuantity = ($currentStock < $reorderThreshold) ? $reorderThreshold - $currentStock : 0;

    $details = [
        'current_stock' => $currentStock,
        'reorder_threshold' => $reorderThreshold,
        'recommended_quantity' => $recommendedQuantity,
        'method' => $method,
        'type' => $type,
        'calculation' => $recommendedQuantity > 0 ? "Se recomienda comprar {$recommendedQuantity} unidades para alcanzar el umbral de reorden." : "No se necesita compra adicional.",
        'method_description' => $this->getMethodDescription($method),
    ];

    return $details;
}

private function getMethodDescription($method)
{
    if ($method === 'erp') {
        return "El método ERP integra datos de inventario con otras áreas como compras y finanzas, optimizando el nivel de stock basado en datos históricos y proyecciones.";
    } elseif ($method === 'pos') {
        return "El método POS gestiona el inventario en tiempo real basado en las ventas actuales, actualizando automáticamente el stock disponible y generando reportes de ventas.";
    }
    return "Método no definido.";
}

}
