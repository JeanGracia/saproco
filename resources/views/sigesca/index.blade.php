@extends('layouts.template')

@section('title', 'Gestión SIGESCA')

@section('meta-description', 'Home meta description')

@section('content')
<h2 class="flex items-center my-6 p-4 mb-8 text-2xl font-semibold text-purple-100 bg-blue-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple">
    <div class="flex items-center">
        <span>SECCIÓN DE CORRECCIÓN PARA SIGESCA</span>
    </div>
</h2>

<div class="grid gap-6 mb-10 md:grid-cols-2">
    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="text-center p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
            <h4 class="mb-4 mt-4 font-semibold text-gray-600 dark:text-gray-300">
                CARGA DE PAGO SOLICITUD DE CALIBRACIÓN
            </h4>
        </div>

        <div class="text-center mt-6">
            <p class="text-gray-600 dark:text-gray-400">
                Este modúlo esta disponible para cargar los pagos que a los clientes se les ha olvidado registrar en el sistema en el tiempo estipulado.
            </p>
        </div>

        <div class="text-center mt-6 mb-6">
            <a
                href="{{ route('buscar-solicitud.index') }}"
                class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"
            >
                Cargar Pago
            </a>
        </div>
    </div>

    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="text-center p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
            <h4 class="mb-4 mt-4 font-semibold text-gray-600 dark:text-gray-300">
                REVERSO DE SOLICITUD DE CALIBRACIÓN
            </h4>
        </div>

        <div class="text-center mt-6">
            <p class="text-gray-600 dark:text-gray-400">
                Este modúlo esta disponible para reversar solicitudes que no pueden ser devueltas entre las bandejas de los distintos roles.
            </p>
        </div>

        <div class="text-center mt-6">
            <button
                class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"
            >
                Reversar Solicitud
            </button>
        </div>
    </div>
</div>

@endsection