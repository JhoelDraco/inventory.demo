<!DOCTYPE html>
<html>
<head>
    <title>Inventario</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        <h1>Gestión de Inventario</h1>
    </header>
    
    <div class="container">
        <form action="{{ route('inventory.index') }}" method="GET">
            <label for="product_id">Selecciona un producto:</label>
            <select name="product_id" id="product_id">
                @forelse ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @empty
                    <option value="">No hay productos disponibles</option>
                @endforelse
            </select>
            <button type="submit">Recomendar Compra</button>
        </form>

        @isset($product)
            <h2>Recomendación de Compra para {{ $product->name }}</h2>
            @isset($details)
                <table>
                    <tr>
                        <th>Stock Actual</th>
                        <td>{{ $details['current_stock'] }}</td>
                    </tr>
                    <tr>
                        <th>Umbral de Reorden</th>
                        <td>{{ $details['reorder_threshold'] }}</td>
                    </tr>
                    <tr>
                        <th>Cantidad Recomendada</th>
                        <td>{{ $details['recommended_quantity'] }}</td>
                    </tr>
                    <tr>
                        <th>Precio Base</th>
                        <td>{{ $product->base_price }}</td>
                    </tr>
                    <tr>
                        <th>Método</th>
                        <td>{{ $details['method'] }}</td>
                    </tr>
                    <tr>
                        <th>Descripción del Método</th>
                        <td>{{ $details['method_description'] }}</td>
                    </tr>
                    <tr>
                        <th>Tipo</th>
                        <td>{{ $details['type'] }}</td>
                    </tr>
                    <tr>
                        <th>Detalles del Cálculo</th>
                        <td>{{ $details['calculation'] }}</td>
                    </tr>
                </table>
            @else
                <p>No se han encontrado detalles de recomendación.</p>
            @endisset
        @endisset
    </div>
</body>
</html>
