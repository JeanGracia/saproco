<x-app-layout>

    @section('titulo')
        RESULTADO
    @endsection

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ( $solicitudes as $solicitud)
                    <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                        <div class="space-y-3">
                            @foreach ($empresas as $empresa)
                                <h1 class="text-xl font-bold">
                                    {{ $empresa->razon_social }}
                                </h1>
                                <h3 class="text-sm text-gray-600 font-bold">
                                    RIF: {{ $empresa->rif }}
                                </h3>
                            @endforeach

                            <p class="text-sm text-gray-600 font-bold"> Número de solicitud: {{ $solicitud->nro_web }} </p>
                            <p class="text-sm text-gray-600 font-bold"> Número de factura: {{ $solicitud->nro_factura }} </p>
                        </div>

                        <div class="flex flex-col md:flex-row items-strech gap-3 mt-5 md:mt-0">
                            <ul class="steps">
                                <li class="step step-primary">
                                    <form action="{{ route('tbl.solicituds', ['solicitud' => $solicitud->id]) }}" method="POST" class="bg-gray-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                                        @csrf
                                        @method('PUT')
                                        <button
                                            type="submit"
                                        >
                                            <i class="fa-solid fa-pencil" style="margin-right: 5px;"></i>
                                            Solicituds
                                        </button>
                                    </form>
                                </li>
                                <li class="step step-primary">
                                    <form action="{{ route('tbl.productSolicitud', ['solicitud' => $solicitud->id]) }}" method="POST" class="bg-gray-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                                        @csrf
                                        @method('PUT')
                                        <button
                                            type="submit"
                                        >
                                            <i class="fa-solid fa-pencil" style="margin-right: 5px;"></i>
                                            N° Productos <div class="badge badge-primary">{{ $cantidadProductos }}</div>
                                        </button>
                                    </form>
                                </li>
                                <li class="step step-primary">
                                    <a
                                        href="{{ route('pago.edit', $solicitud->id) }}"
                                        class="bg-gray-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
                                    >
                                        Cargar pago
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                <a
                    href="{{ route('buscar-solicitud.index') }}"
                    class="bg-gray-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
                >
                    <i class="fa-solid fa-circle-left"></i>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>