<h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
    DB gestionweb
</h2>
<h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">
    @if (!empty($eficienciaEnergiteca))
        {{ 'Eficiencia Energética' }}
    @elseif (!empty($consultaTecnica))
        {{ 'Consulta Técnica' }}
    @elseif (!empty($niv))
        {{ 'Número de Identificación Vehicular' }}
    @else
        {{ 'Certificado Inspección' }}
    @endif
</h1>
<p class="leading-relaxed mb-3">
    esq. public
</p>
{{-- @dd($eficienciaEnergiteca) --}}
{{-- @dd($consultaTecnica) --}}
{{-- @dd($niv) --}}
{{-- @dd($certInspeccion) --}}
@if (!empty($eficienciaEnergiteca))
    @foreach ($eficienciaEnergiteca as $eficiencia)
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
                    <div class="timeline-end timeline-box">
                        {{ $eficiencia->idfactura }}
                    </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">PRODUCTO</div>
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
                        {{ $eficiencia->strproducto }}
                    </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">SOLICITUD</div>
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
                        {{ $eficiencia->strnrosolicitud }}
                    </div>
                <hr/>
            </li>
            <li>
                <div class="timeline-start">FECHA DE ELABORACIÓN</div>
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
                        {{ $eficiencia->strmeselabora }}/{{ $eficiencia->stranoelabora }}
                    </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">CÓDIGO DE BARRA</div>
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
                            {{ $eficiencia->strcodigobarra }}
                        </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">DORSO</div>
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
                            {{ $eficiencia->strnombredorso }}
                        </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">FROTAL</div>
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
                            {{ $eficiencia->strnombrefrontal }}
                        </div>
                <hr/>
            </li>
            <div class="flex justify-center">
                <form action="{{ route('eficiencia.delete', $eficiencia->idfactura) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button
                        type="submit"
                        class="btn glass"
                    >
                        Eliminar
                    </button>
                </form>
            </div>
        </ul>
    @endforeach
@elseif (!empty($consultaTecnica))
    @foreach ($consultaTecnica as $consulta)
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
                    <div class="timeline-end timeline-box">
                        {{ $consulta->idfactura }}
                    </div>
                <hr/>
            </li>
            <li>
                <div class="timeline-start">SISTEMA</div>
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
                        {{ $consulta->strsistema }}
                    </div>
                <hr/>
            </li>
            <li>
                <div class="timeline-start">PRODUCTO</div>
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
                        {{ $consulta->nombreproducto }}
                    </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">CÓDIGO DE BARRA</div>
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
                        {{ $consulta->strcodigobarra }}
                    </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">CÓDIGO ARANCEL</div>
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
                        {{ $consulta->codigoarancelario }}
                    </div>
                <hr/>
            </li>
            <li>
            <li>
                <hr/>
                    <div class="timeline-start">NÚMERO DE REGISTRO</div>
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
                            {{ $consulta->strnumeroregistro }}
                        </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">FRONTAL</div>
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
                            {{ $consulta->strnombrefrontal }}
                        </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">DORSO</div>
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
                            {{ $consulta->strnombredorso }}
                        </div>
                <hr/>
            </li>
            <div class="flex justify-center">
                <form action="{{ route('consulta-tecnica.delete', $consulta->idfactura) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button
                        type="submit"
                        class="btn glass"
                    >
                        Eliminar
                    </button>
                </form>
            </div>
        </ul>
    @endforeach
@elseif (!empty($niv))
    @foreach ($niv as $identificacionVehicular)
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
                    <div class="timeline-end timeline-box">
                        {{ $identificacionVehicular->idfactura }}
                    </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">PRODUCTO</div>
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
                        {{ $identificacionVehicular->strproducto }}
                    </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">MARCA</div>
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
                            @php
                               $marca = explode(";", $identificacionVehicular->strmarca);
                            @endphp
                        <div class="timeline-end timeline-box">
                            {{ $marca[0] }}
                        </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">MODELO</div>
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
                        @php
                            $modelo = explode(";", $identificacionVehicular->strmodelo);
                        @endphp
                        <div class="timeline-end timeline-box">
                            {{ $modelo[0] }}
                        </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">TIPO</div>
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
                        @php
                            $tipo = explode(";", $identificacionVehicular->strtipo);
                        @endphp
                        <div class="timeline-end timeline-box">
                            {{ $tipo[0] }}
                        </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">AÑO DE FABRICACIÓN</div>
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
                        @php
                            $yearProduction = explode(";", $identificacionVehicular->straniofab);
                        @endphp
                        <div class="timeline-end timeline-box">
                            {{ $yearProduction[0] }}
                        </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">FABRICANTE</div>
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
                            {{ $identificacionVehicular->strfabricante }}
                        </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">PDF DORSO</div>
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
                            {{ $identificacionVehicular->strarchivopdfdorso }}
                        </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">FRONTAL</div>
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
                            {{ $identificacionVehicular->strarchivopdffrontal }}
                        </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">CÓDIGO DE BARRA</div>
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
                            {{ $identificacionVehicular->strcodigobarra }}
                        </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">IDENTIFICACIÓN VEHICULAR</div>
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
                        @php
                            $identificacion = explode(";", $identificacionVehicular->stridentificacionvehicular);
                        @endphp
                        <div class="timeline-end timeline-box">
                            {{ $identificacion[0] }}
                        </div>
                <hr/>
            </li>
            <div class="flex justify-center">
                <form action="{{ route('niv.delete', $identificacionVehicular->idfactura) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button
                        type="submit"
                        class="btn glass"
                    >
                        Eliminar
                    </button>
                </form>
            </div>
        </ul>
    @endforeach
@elseif (!empty($certInspeccion))
    @foreach ($certInspeccion as $certificado)
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
                    <div class="timeline-end timeline-box">
                        {{ $certificado->idfactura }}
                    </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">PRODUCTO</div>
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
                            {{ $certificado->strproducto }}
                        </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">MARCA</div>
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
                        {{ $certificado->strmarca }}
                    </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">FABRICANTE</div>
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
                            {{ $certificado->strfabricante }}
                        </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">PAíS</div>
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
                            {{ $certificado->strpais }}
                        </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">CÓDIGO DE BARRA</div>
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
                            {{ $certificado->strcodigobarra }}
                        </div>
                <hr/>
            </li>
            <li>
                <hr/>
                    <div class="timeline-start">NORMA</div>
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
                            {{ $certificado->strnronorma }} | {{ $certificado->strnorma }}
                        </div>
                <hr/>
            </li>
            <div class="flex justify-center">
                <form action="{{ route('certificado-inspeccion.delete', $certificado->idfactura) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button
                        type="submit"
                        class="btn glass"
                    >
                        Eliminar
                    </button>
                </form>
            </div>
        </ul>
    @endforeach
@endif