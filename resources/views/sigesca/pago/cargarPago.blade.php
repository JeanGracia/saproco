<x-app-layout>

    @section('titulo')
        CARGAR PAGO
    @endsection

    {{-- Alerta --}}
    @if(session('success'))
        <div class="fixed top-0 right-0 m-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded z-50">
            <span class="badge"><strong class="font-bold">Éxito!</strong></span>
            <span class="animate-pulse block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-4xl font-bold text-center my-10">
                        @foreach ($cargarPagos as $cargarPago)
                        {{ __("Cargar pago a la solicitud: $cargarPago->solicitud_id") }}
                    </h1>

                    <div class="md:flex md:justify-center p-5">
                            <form class="md:w-1/2 space-y-10" action="{{ route('cargarPago.update', ['solicitud' => $cargarPago->solicitud_id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div>
                                    <x-input-label for="referencia" :value="__('Número de referencia')" />

                                    <x-text-input
                                        id="referencia"
                                        class="block mt-1 w-full"
                                        type="text"
                                        name="referencia" 
                                        value="{{ old('referencia', $cargarPago->nro_referencia) }}"
                                        placeholder="Agregué el número de referencia"
                                    />

                                    <x-input-error :messages="$errors->get('referencia')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="fecha" :value="__('Fecha')" />

                                    <x-text-input
                                        id="fecha"
                                        class="block mt-1 w-full"
                                        type="date"
                                        name="fecha"
                                        value="{{ old('fecha', $cargarPago->fecha->format('Y-m-d')) }}"
                                    />

                                    <x-input-error :messages="$errors->get('fecha')" class="mt-2" />
                                </div>

                                <div>
                                    <x-input-label for="monto" :value="__('Monto')" />

                                    <x-text-input
                                        id="monto"
                                        class="block mt-1 w-full"
                                        type="text"
                                        name="monto" 
                                        value="{{ old('monto', $cargarPago->monto) }}"
                                        placeholder="Agregué el monto"
                                    />

                                    <x-input-error :messages="$errors->get('monto')" class="mt-2" />
                                </div>

                                <div >
                                    <x-input-label for="created_at" :value="__('created_at')" />

                                    <x-text-input
                                        id="created_at"
                                        class="block mt-1 w-full"
                                        type="text"
                                        name="created_at" 
                                        value="{{ old('created_at', $cargarPago->created_at->format('d/m/Y')) }}"
                                        disabled
                                    />
                                </div>

                                <div>
                                    <x-input-label for="updated_at" :value="__('updated_at')" />

                                    <x-text-input
                                        id="updated_at"
                                        class="block mt-1 w-full"
                                        type="text"
                                        name="updated_at" 
                                        value="{{ old('updated_at', $cargarPago->updated_at->format('d/m/Y')) }}"
                                        disabled
                                    />
                                </div>

                                <x-primary-button class="w-full justify-center">
                                    {{ __('Cargar pago') }}
                                </x-primary-button>
                            </form>
                        @endforeach
                    </div>
                    <a
                        href="{{ route('mostrar-solicitud.show', ['solicitud' => $cargarPago->solicitud_id]) }}"
                        class="bg-gray-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
                    >
                        <i class="fa-solid fa-circle-left"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>