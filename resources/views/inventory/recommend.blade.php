<!DOCTYPE html>
<html>
<head>
    <title>Recomendación de Compra</title>
</head>
<body>
    <h1>Recomendación de Compra para {{ $product->name }}</h1>
    <p>Cantidad recomendada: {{ $quantity }}</p>
    <a href="{{ route('inventory.index') }}">Volver al inventario</a>
</body>
</html>
