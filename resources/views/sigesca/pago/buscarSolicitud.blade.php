<x-app-layout>

    @section('titulo')
        BUSQUEDA DE SOLICITUDES
    @endsection

    <div class="min-h-screen flex flex-col justify-center">
        <div class="relative w-full sm:max-w-2xl sm:mx-auto">

            <div class="flex items-center justify-center text-center
                font-black
                dark:text-white
                text-6xl
                sm:text-6xl
                md:text-8xl
                lg:text-9xl
                xl:text-9xl
                transition-all duration-300
                mb-3"
            >
                CARGAR PAGOS
            </div>

            <div class="overflow-hidden z-0 rounded-full relative p-3">
                <form
                    action="{{ route('mostrar-solicitud.show') }}" method="GET"
                    class="relative flex z-50 rounded-full bg-white"
                    novalidate
                >
                    <input
                        type="text"
                        name="solicitud"
                        placeholder="Introduzca el número de solicitud"
                        class="rounded-full flex-1 px-6 py-4 text-gray-700 focus:outline-none"
                    />

                    <button type="submit"
                        class="bg-blue-500 text-white hover:text-slate-800 rounded-full font-semibold px-8 py-4 hover:bg-blue-400 focus:bg-blue-600 focus:outline-none sm:w-auto"
                    >
                        Buscar
                    </button>
                </form>

                {{-- Color setting --}}
                <div class="glow glow-1 z-10 animate-glow1 bg-cyan-400 rounded-100 w-120 h-120 -top-10 -left-10 absolute"></div>
                <div class="glow glow-2 z-20 animate-glow2 bg-cyan-400 rounded-100 w-120 h-120 -top-10 -left-10 absolute"></div>
                <div class="glow glow-3 z-30 animate-glow3 bg-sky-500 rounded-100 w-120 h-120 -top-10 -left-10 absolute"></div>
                <div class="glow glow-4 z-40 animate-glow4 bg-blue-600 rounded-100 w-120 h-120 -top-10 -left-10 absolute"></div>
            </div>

            {{-- Alerta: validación de la barra de búsqueda --}}
            @if ($errors->any())
                <div class="alert alert-danger mt-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <strong class="font-bold text-red-700">
                                <li>{{ $error }}</li>
                            </strong>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>