@if(session('success'))
    <div class="fixed top-0 right-0 m-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded z-50">
        <span class="badge"><strong class="font-bold">Éxito!</strong></span>
        <span class="animate-pulse block sm:inline">{{ session('success') }}</span>
    </div>
@endif

<h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
    DB gestionweb
</h2>
<h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">
    tbl dst_detallesolicitud
</h1>
<p class="leading-relaxed mb-3">
    esq. public
</p>

@foreach ($solicitudes as $solicitud)
{{-- @dd($solicitudes); --}}
    <ul class="timeline timeline-vertical">
        <li>
            <div class="timeline-start">IDFACTURA</div>
            <div class="timeline-middle">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    class="w-5 h-5">
                        <path
                            fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                            clip-rule="evenodd" />
                </svg>
            </div>
            <div class="timeline-end timeline-box">{{ $solicitud->idfactura }}</div>
            <hr/>
        </li>
        <li>
            <hr/>
                <div class="timeline-start">NÚMERO DE SOLICITUD</div>
                <div class="timeline-middle">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        class="w-5 h-5">
                            <path
                                fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                clip-rule="evenodd"
                            />
                    </svg>
                </div>
                <div class="timeline-end timeline-box">{{ $solicitud->nro_solicitud }}</div>
            <hr/>
        </li>
        <li>
            <hr/>
                <div class="timeline-start">fechaprocesart</div>
                    <div class="timeline-middle">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            class="w-5 h-5">
                                <path
                                    fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                    clip-rule="evenodd" />
                        </svg>
                    </div>
                        <div class="timeline-end timeline-box">
                            {{ \Carbon\Carbon::parse($solicitud->fechaprocesart)->format('d/m/Y') }}
                        </div>
            <hr/>
        </li>
        @foreach ($tecnicoSolicitudes as $soltec)
        <li>
            <hr/>
                <div class="timeline-start">IDSIGNATARIO</div>
                    <div class="timeline-middle">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            class="w-5 h-5">
                                <path
                                    fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                    clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="timeline-end timeline-box">
                        {{ $solicitud->idsignatario }} | {{ $soltec->nombre }} | {{ $soltec->user_security }}
                    </div>
            <hr/>
        </li>
        @endforeach
        @foreach ($estatus as $estado)
        <li>
            <hr/>
                <div class="timeline-start">ESTATUS</div>
                    <div class="timeline-middle">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="{{ $solicitud->estatus == '3' ? 'green' : 'currentColor' }}"
                            class="w-5 h-5">
                                <path
                                    fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                    clip-rule="evenodd" />
                        </svg>
                    </div>
                        <div class="timeline-end timeline-box">
                            {{ $solicitud->estatus }} | {{ $estado->descripcion }}
                        </div>
            <hr/>
        </li>
        @endforeach
        {{-- @dd($facturas); --}}
        @foreach ($facturas as $factura)
            <div class="flex justify-center">
                <form action="{{ route('solicitud.update', ['idfactura' => $solicitud->idfactura, 'fechaenviart' => $factura->fechaenviart ]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <button
                        type="submit"
                        class="btn glass"
                    >
                        Reversar a estatus 3
                    </button>
                </form>
            </div>
        @endforeach
    </ul>
@endforeach