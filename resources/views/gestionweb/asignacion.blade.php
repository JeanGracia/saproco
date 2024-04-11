<h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
    DB gestionweb
</h2>
<h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">
    tbl dst_asignaciones
</h1>
<p class="leading-relaxed mb-3">
    esq. public
</p>
{{-- @dd($idtecnico->nombre); --}}
@foreach ($asignaciones as $asignacion)
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
            <div class="timeline-end timeline-box">{{ $asignacion->idfactura }}</div>
            <hr/>
        </li>
        <li>
            <hr/>
                <div class="timeline-start">FECHA ASIGNACIÓN</div>
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
                <div class="timeline-end timeline-box">
                    @empty($asignacion->fasigna)
                        AUN NO FUE ASIGNADA A UN TÉCNICO
                    @else
                        {{ \Carbon\Carbon::parse($asignacion->fasigna)->format('d/m/Y') }}
                    @endempty
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
                            fill="{{ $asignacion->tlider === $asignacion->idtecnico ? 'green' : 'currentColor' }}"
                            class="w-5 h-5">
                                <path
                                    fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                    clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="timeline-end timeline-box">
                        {{ $asignacion->idtecnico }} | {{ $idtecnico->nombre }} | {{ $idtecnico->user_security }}
                    </div>
            <hr/>
        </li>
        <li>
            <hr/>
                <div class="timeline-start">TLIDER</div>
                    <div class="timeline-middle">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="{{ $asignacion->tlider === $asignacion->idtecnico ? 'green' : 'currentColor' }}"
                            class="w-5 h-5">
                                <path
                                    fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                    clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="timeline-end timeline-box">
                        {{ $asignacion->tlider }} | {{ $tlider->nombre }} | {{ $tlider->user_security }}
                    </div>
            <hr/>
        </li>
        @endforeach
        <div class="flex justify-center">
            <form action="{{ route('asignacion.update', ['idfactura' => $asignacion->idfactura, 'tlider' => $asignacion->tlider]) }}" method="POST">
                @method('PUT')
                @csrf
                <button
                    type="submit"
                    class="btn glass"
                >
                    Igualar idtecnico a tlider
                </button>
            </form>
        </div>
    </ul>
@endforeach