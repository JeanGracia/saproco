<x-app-layout>

    @section('titulo')
        RESULTADO
    @endsection

    {{-- Alerta --}}
    @if(session('success'))
        <div class="fixed top-0 right-0 m-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded z-50">
            <span class="badge"><strong class="font-bold">Éxito!</strong></span>
            <span class="animate-pulse block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-16 mx-auto">

            {{-- Encabezado: nombre empresa y número de rif --}}
            @foreach ($clientes as $cliente)
                <div class="text-center">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">
                        {{ $cliente->razon_social }}
                    </h1>
                    <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s">
                        {{ $cliente->nro_rif }}
                    </p>
                    <div class="flex mt-3 justify-center">
                        <div class="w-16 h-1 rounded-full bg-blue-500 inline-flex"></div>
                    </div>
                </div>
            @endforeach

            <div class="flex flex-wrap -m-4">
                <div class="p-4 lg:w-1/3">
                    <div class="h-full bg-gray-100 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
                        @include('gestionweb.factura')
                    </div>
                </div>
                <div class="p-4 lg:w-1/3">
                    <div class="h-full bg-gray-100 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
                        @include('gestionweb.solicitud')
                    </div>
                </div>
                @if (!empty($tickets))
                    <div class="p-4 lg:w-1/3">
                        <div class="h-full bg-gray-100 bg-opacity-75 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
                            @include('mckoi.reversoTresTicket')
                        </div>
                    </div>
                @endif
                <div class="p-4 lg:w-1/3">
                    <div class="h-full bg-gray-100 bg-opacity-75 px-8 pt-16  rounded-lg overflow-hidden text-center relative">
                        {{-- Eliminar registro segun servicio --}}
                        @include('gestionweb.servicios')
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>