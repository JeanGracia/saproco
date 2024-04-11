<h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
    DB gestionweb
</h2>
<h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">
    tbl dst_detailsfactura
</h1>
<p class="leading-relaxed mb-3">
    esq. public
</p>

@foreach ($facturas as $factura)
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
            <div class="timeline-end timeline-box">{{ $factura->id }}</div>
            <hr/>
        </li>
        <li>
            <hr/>
                <div class="timeline-start">ONLINE</div>
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
                <div class="timeline-end timeline-box">{{ $factura->online }}</div>
            <hr/>
        </li>
        <li>
            <hr/>
                <div class="timeline-start">NÚMERO DE FACTURA</div>
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
                        {{ $factura->nrofactura }}
                    </div>
            <hr/>
        </li>
        <li>
            <hr/>
                <div class="timeline-start">REGIONAL</div>
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
                            {{ $factura->regional }}
                        </div>
            <hr/>
        </li>
        <li>
            <hr/>
                <div class="timeline-start">FECHA SERVICIO</div>
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
                            {{ \Carbon\Carbon::parse($factura->fechaservicio)->format('d/m/Y') }}
                        </div>
            <hr/>
        </li>
        @foreach ($tecnicos as $tecnico)
        <li>
            <hr/>
                <div class="timeline-start">IDTECNICO</div>
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
                        {{ $factura->idtecnico }} | {{ $tecnico->nombre }} | {{ $tecnico->user_security }}
                    </div>
            <hr/>
        </li>
        @endforeach
        @foreach ($estatus as $estatu)
        <li>
            <hr/>
                <div class="timeline-start">ESTATUS</div>
                    <div class="timeline-middle">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="{{ $factura->estatus == '2' ? 'green' : 'currentColor' }}"
                            class="w-5 h-5">
                                <path
                                    fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                    clip-rule="evenodd" />
                        </svg>
                    </div>
                        <div class="timeline-end timeline-box">
                            {{ $factura->estatus }} | {{ $estatu->descripcion }}
                        </div>
            <hr/>
        </li>
        @endforeach
        @foreach ($asignaciones as $asignacion)
            <div class="flex justify-center">
                <form action="{{ route('details-factura.update', ['id' => $factura->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <button
                        type="submit"
                        class="btn glass"
                    >
                        Reversar a estatus 2
                    </button>
                </form>
            </div>
        @endforeach
    </ul>
@endforeach