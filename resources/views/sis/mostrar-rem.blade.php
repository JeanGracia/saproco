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

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ( $facturas as $factura)
                    <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                        <div class="space-y-3">
                            @foreach ($empresas as $empresa)
                                <h1 class="text-xl font-bold">
                                    {{ $empresa->razonsocial }}
                                </h1>
                                <h3 class="text-sm text-gray-600 font-bold">
                                    Direccion: {{ $empresa->direccion }}
                                </h3>
                            @endforeach
                            <p class="text-sm text-gray-600 font-bold">
                                Número de factura: {{ $factura->intnrofactura }} | REM: {{ $factura->idsencamer }} 
                            </p>
                            <p class="text-sm text-gray-600 font-bold">
                                Número de control: {{ $factura->strnumerocontrol }}
                            </p>
                        </div>
                        <?php
                            $asignacion = [
                                'id' => $idAsignacion
                            ];
                        ?>
                        {{ $idSolicitud }}
                        {{ $memocertificados }}
                        {{ $impresionCertificado }}
                        {{ $statusCertificado }}
                        {{ $certificado }}
                        {{-- @dd($asignacion->idsolicitud); --}}
                        <div class="flex flex-col md:flex-row items-strech gap-3 mt-5 md:mt-0">
                                <form action="{{ route('sis.destroy', ['asignacion' => $asignacion, 'idSolicitud' => $idSolicitud, 'memocertificados' => $memocertificados, 'impresionCertificado' => $impresionCertificado, 'statusCertificado' => $statusCertificado, 'certificado' => $certificado]) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button
                                        type="submit"
                                        class="bg-gray-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
                                    >
                                        REVERSAR REM
                                    </button>
                                </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                <a
                    href="{{ route('sis.index') }}"
                    class="bg-gray-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center"
                >
                    <i class="fa-solid fa-circle-left"></i>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>