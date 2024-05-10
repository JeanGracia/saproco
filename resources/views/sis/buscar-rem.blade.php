<x-app-layout>

    @section('titulo')
        Registro de Empresa Manufacturera
    @endsection

    <div class="min-h-screen flex flex-col justify-center">
        <div class="relative w-full sm:max-w-2xl sm:mx-auto">

            <div class="flex items-center justify-center
                font-black
                dark:text-white
                text-7xl
                sm:text-8xl
                md:text-8xl
                lg:text-9xl
                xl:text-9xl
                transition-all duration-300
                mb-3"
            >
                REM
            </div>

            <div class="overflow-hidden z-0 rounded-full relative p-3">
                <form
                    action="{{ route('sis.show') }}" method="GET"
                    class="relative flex z-50 rounded-full bg-white"
                >
                    <input
                        type="text"
                        name="factura"
                        placeholder="Introduzca el número de rem"
                        class="rounded-full flex-2 px-5 py-4 mr-1 text-gray-700 border-white"
                        oninput="this.value = this.value.toUpperCase()" {{-- cada vez que se introduzca texto en el campo, se convertirá automáticamente a mayúsculas --}}
                    />

                    <input
                        type="text"
                        name="id_sencamer"
                        placeholder="Introduzca el id_sencamer"
                        class="rounded-full flex-2 px-5 py-4 mr-1 text-gray-700 border-white"
                        oninput="this.value = this.value.toUpperCase()" {{-- cada vez que se introduzca texto en el campo, se convertirá automáticamente a mayúsculas --}}
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