<x-app-layout>

    @section('titulo')
        BUSQUEDA
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
                REVERSOS
            </div>

            <div class="overflow-hidden z-0 rounded-full relative p-3">
                <form
                    action="{{ route('gestion.mostrar-factura') }}" method="GET"
                    class="relative flex z-50 rounded-full bg-white"
                >
                    <input
                        type="text"
                        {{-- el atributo name en el elemento <input> establece el nombre del campo de entrada como "introducir_factura". Cuando se envía el formulario, el valor ingresado en este campo se enviará como parte de la solicitud con el nombre "introducir_factura". --}}
                        name="introducir_factura"
                        placeholder="Introduzca el número de factura"
                        class="rounded-full flex-1 px-6 py-4 mr-2 text-gray-700 border-white"
                        oninput="this.value = this.value.toUpperCase()" {{-- cada vez que se introduzca texto en el campo, se convertirá automáticamente a mayúsculas --}}
                    />

                    <select name="opcion_reverso"
                        class="rounded-full my-2 mr-5 select select-ghost min-w-24 border-transparent focus:border-transparent border-white">
                        <option disabled selected>Opción de reverso</option>
                        <option value="2">Reversar a estatus 2</option>
                        <option value="3">Reversar a estatus 3</option>
                    </select>

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