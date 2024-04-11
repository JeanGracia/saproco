<h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">
    DB mckoi
</h2>
<h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">
    tbl ticket
</h1>
<p class="leading-relaxed mb-3">
    esq. reg044 | etiquetado
</p>
@foreach ($tickets as $ticket)
    <ul class="timeline timeline-vertical">
        <li>
            <div class="timeline-start">TICKET_ID</div>
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
            <div class="timeline-end timeline-box">{{ $ticket->ticket_id }}</div>
            <hr/>
        </li>
        <li>
            <hr/>
                <div class="timeline-start">ESTATUS EN BANDEJA</div>
                <div class="timeline-middle">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="{{ $ticket->estatusbandeja === 'en proceso' ? 'green' : 'currentColor' }}"
                        class="w-5 h-5">
                            <path
                                fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                clip-rule="evenodd"
                            />
                    </svg>
                </div>
                <div class="timeline-end timeline-box">{{ $ticket->estatusbandeja }}</div>
            <hr/>
        </li>
        <li>
            <hr/>
                <div class="timeline-start">USERLOGIN</div>
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
                            {{ $ticket->userlogin }}
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
                            {{ $ticket->regional }}
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
                        {{ $ticket->idsignatario }} | {{ $soltec->nombre }} | {{ $soltec->user_security }}
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
                            fill="{{ $ticket->estatus === 'en proceso' ? 'green' : 'currentColor' }}"
                            class="w-5 h-5">
                                <path
                                    fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                    clip-rule="evenodd" />
                        </svg>
                    </div>
                        <div class="timeline-end timeline-box">
                            {{ $ticket->estatus }}
                        </div>
            <hr/>
        </li>
        @endforeach
        <div class="flex justify-center">
            <form action="{{ route('mckoi.update', ['ticket_id' => $ticket->ticket_id]) }}" method="POST">
                @method('PUT')
                @csrf
                <p>Establecer estatus:</p>
                <button
                    type="submit"
                    class="btn glass"
                >
                    En proceso
                </button>
            </form>
        </div>
    </ul>
@endforeach