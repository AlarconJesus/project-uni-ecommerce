<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <x-application-logo class="block h-12 w-auto" />

    <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Bienvenido a la Tienda Online de Proinfalca!
    </h1>

    <p class="mt-6 text-gray-500 leading-relaxed">
    </p>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">

    @can('reporte')
    <div>
        <h2 class="h2">Reportes de Ventas</h2>

        <div style="display: grid;
                grid-template-columns: repeat(auto, 17rem);
                justify-content: space-between;
                grid-gap: 10px;">
            <form action="download" method="GET" style="padding: 20px; border: 1px solid black; margin: 20px; width: 340px;">

                <h4 class="h4">Genera un reporte de venta por día</h5>

                    <div class="form-group">
                        <label for="fecha_dia">Seleccione la Fecha exacta para generar el reporte.</label>
                        <input type="date" name="fecha_dia">
                    </div>
                    <x-button type="submit" style="margin-top: 20px;">Generar reporte</x-button>
            </form>

            <form action="download" method="GET" style="padding: 20px; border: 1px solid black; margin: 20px; width: 340px">
                <h4 class="h4">Genera un reporte de venta por Mes</h5>

                    <div class="form-group">
                        <label for="fecha_mes">Selecciona el Mes y Año para generar el reporte</label>
                        <input type="month" name="fecha_mes">
                    </div>

                    <x-button type="submit" style="margin-top: 20px;">Generar reporte</x-button>
            </form>
        </div>
    </div>
    @endcan
</div>