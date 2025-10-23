<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Nueva Factura') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-900 min-h-screen">
        <div class="max-w-6xl mx-auto px-6">

            @if ($errors->any())
                <div class="bg-red-600 text-white p-4 rounded mb-6">
                    <strong>Ocurrieron algunos errores:</strong>
                    <ul class="mt-2 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-gray-800 rounded-xl p-6 shadow-lg border border-gray-700">
                <form action="{{ route('facturas.store') }}" method="POST" id="formFactura">
                    @csrf

                    <!-- Cliente -->
                    <div class="mb-4">
                        <label for="cliente" class="block text-gray-200 mb-2">Cliente</label>
                        <select name="cliente" id="cliente" class="w-full p-2 rounded bg-gray-700 text-gray-100 border border-gray-600" required>
                            <option value="">Seleccione un cliente</option>
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nombreCliente }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Fecha (opcional: prellenar hoy) -->
                    <div class="mb-4">
                        <label for="fechaFactura" class="block text-gray-200 mb-2">Fecha</label>
                        <input type="date" name="fechaFactura" id="fechaFactura" value="{{ date('Y-m-d') }}" class="w-full p-2 rounded bg-gray-700 text-gray-100 border border-gray-600" required>
                    </div>

                    <h3 class="text-lg font-semibold text-gray-100 mb-3">Productos</h3>

                    <table class="min-w-full text-sm text-gray-300 border border-gray-700 rounded" id="tablaProductos">
                        <thead class="bg-gray-700">
                            <tr>
                                <th class="px-4 py-2 text-left">Producto</th>
                                <th class="px-4 py-2 text-left">Precio unit.</th>
                                <th class="px-4 py-2 text-left">Stock</th>
                                <th class="px-4 py-2 text-left">Cantidad</th>
                                <th class="px-4 py-2 text-left">Subtotal</th>
                                <th class="px-4 py-2 text-center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-4 py-2">
                                    <select name="items[0][producto]" class="w-full bg-gray-700 border border-gray-600 rounded p-2 productoSelect" required>
                                        <option value="">Seleccionar producto</option>
                                        @foreach ($productos as $p)
                                            @if($p->cantidadProducto > 0)
                                                <option value="{{ $p->id }}"
                                                        data-precio="{{ $p->precioProducto }}"
                                                        data-stock="{{ $p->cantidadProducto }}">
                                                    {{ $p->nombreProducto }} 
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td>

                                <td class="px-4 py-2 text-gray-100 precioProducto">$0</td>

                                <td class="px-4 py-2 text-gray-100 stockDisponible">
                                    <input type="text" class="bg-gray-700 border border-gray-600 rounded p-1 text-gray-100 w-20 text-center" value="0" readonly>
                                </td>

                                <td class="px-4 py-2">
                                    <input type="number" name="items[0][cantidad]" value="1" min="1" class="w-24 bg-gray-700 border border-gray-600 rounded p-2 text-gray-100 cantidadInput" disabled required>
                                </td>

                                <td class="px-4 py-2 subtotal">$0</td>

                                <td class="px-4 py-2 text-center">
                                    <button type="button" onclick="eliminarFila(this)" class="text-red-400 hover:text-red-300">Eliminar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-4 flex flex-col md:flex-row justify-between items-center gap-4">
                        <div>
                            <button type="button" onclick="agregarFila()" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded">
                                + Agregar Producto
                            </button>
                        </div>

                        <div class="text-right text-gray-100 text-lg font-semibold">
                            Total: <span id="totalFactura">$0</span>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="submit" class="bg-green-600 hover:bg-green-500 text-white px-6 py-2 rounded">
                            Guardar Factura
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let index = 1;

        function agregarFila() {
            const tabla = document.querySelector('#tablaProductos tbody');
            const nuevaFila = document.createElement('tr');

            nuevaFila.innerHTML = `
                <td class="px-4 py-2">
                    <select name="items[${index}][producto]" class="w-full bg-gray-700 border border-gray-600 rounded p-2 productoSelect" required>
                        <option value="">Seleccionar producto</option>
                        @foreach ($productos as $p)
                            @if($p->cantidadProducto > 0)
                                <option value="{{ $p->id }}" data-precio="{{ $p->precioProducto }}" data-stock="{{ $p->cantidadProducto }}">
                                    {{ $p->nombreProducto }} (Stock: {{ $p->cantidadProducto }})
                                </option>
                            @endif
                        @endforeach
                    </select>
                </td>

                <td class="px-4 py-2 text-gray-100 precioProducto">$0</td>

                <td class="px-4 py-2 text-gray-100 stockDisponible">
                    <input type="text" class="bg-gray-700 border border-gray-600 rounded p-1 text-gray-100 w-20 text-center" value="0" readonly>
                </td>

                <td class="px-4 py-2">
                    <input type="number" name="items[${index}][cantidad]" value="1" min="1" class="w-24 bg-gray-700 border border-gray-600 rounded p-2 text-gray-100 cantidadInput" disabled required>
                </td>

                <td class="px-4 py-2 subtotal">$0</td>

                <td class="px-4 py-2 text-center">
                    <button type="button" onclick="eliminarFila(this)" class="text-red-400 hover:text-red-300">Eliminar</button>
                </td>
            `;

            tabla.appendChild(nuevaFila);
            index++;
            actualizarEventos();
        }

        function eliminarFila(btn) {
            btn.closest('tr').remove();
            calcularTotal();
        }

        function actualizarEventos() {
            document.querySelectorAll('.productoSelect').forEach(select => {
                select.onchange = function() {
                    const opt = this.selectedOptions[0];
                    const precio = parseFloat(opt?.dataset.precio || 0);
                    const stock = parseInt(opt?.dataset.stock || 0, 10);
                    const fila = this.closest('tr');

                    // mostrar precio
                    fila.querySelector('.precioProducto').textContent = `$${precio.toLocaleString()}`;

                    // mostrar stock
                    const stockInput = fila.querySelector('.stockDisponible input');
                    if (stockInput) stockInput.value = stock;

                    // habilitar cantidad y establecer max
                    const cantidadInput = fila.querySelector('.cantidadInput');
                    cantidadInput.disabled = false;
                    cantidadInput.max = stock;
                    if (stock === 0) {
                        cantidadInput.value = 0;
                        cantidadInput.disabled = true;
                    } else if (cantidadInput.value < 1) {
                        cantidadInput.value = 1;
                    }

                    actualizarSubtotal(fila);
                };
            });

            document.querySelectorAll('.cantidadInput').forEach(input => {
                input.oninput = function() {
                    const max = parseInt(this.max || 999999, 10);
                    if (this.value === '' || parseInt(this.value,10) < 1) this.value = 1;
                    if (parseInt(this.value,10) > max) this.value = max;
                    const fila = this.closest('tr');
                    actualizarSubtotal(fila);
                };
            });
        }

        function actualizarSubtotal(fila) {
            const select = fila.querySelector('.productoSelect');
            if (!select || !select.value) {
                fila.querySelector('.subtotal').textContent = `$0`;
                calcularTotal();
                return;
            }
            const precio = parseFloat(select.selectedOptions[0].dataset.precio || 0);
            const cantidad = parseInt(fila.querySelector('.cantidadInput').value || 0, 10);
            const subtotal = precio * cantidad;
            fila.querySelector('.subtotal').textContent = `$${subtotal.toLocaleString()}`;
            calcularTotal();
        }

        function calcularTotal() {
            let total = 0;
            document.querySelectorAll('.subtotal').forEach(cell => {
                const text = cell.textContent.replace(/[^0-9\-]/g, '');
                if (text === '') return;
                total += parseInt(text, 10) || 0;
            });
            document.getElementById('totalFactura').textContent = `$${total.toLocaleString()}`;
        }

        // inicial
        actualizarEventos();
    </script>
</x-app-layout>
