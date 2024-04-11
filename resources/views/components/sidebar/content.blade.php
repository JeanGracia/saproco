{{-- Sidebar --}}
<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-4 px-3">

    <x-sidebar.link title="Dashboard" href="{{ route('dashboard') }}" :isActive="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <div x-transition x-show="isSidebarOpen || isSidebarHovered" class="text-sm text-gray-500">Módulos</div>

    {{-- utilizó la función Str::startsWith para determinar si la ruta actual comienza con la palabra 'gestion'. Si es así, el dropdown estará activo --}}
    <x-sidebar.dropdown title="GestionWeb" :active="Str::startsWith(request()->route()->uri(), 'gestion' )">
        <x-slot name="icon">
            <x-heroicon-arrow class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink title="Consultar facturas" href="{{ route('gestion.buscar-factura') }}"
            :active="request()->routeIs('gestion.buscar-factura')" />
        <x-sidebar.sublink title="Mostrar factura" href="{{ route('gestion.mostrar-factura') }}"
            :active="request()->routeIs('gestion.mostrar-factura')" />
    </x-sidebar.dropdown>

    <x-sidebar.dropdown title="Sigesca" :active="Str::startsWith(request()->route()->uri(), 'sigesca/pago' )">
        <x-slot name="icon">
            <x-heroicon-wallet class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink title="Consultar solicitudes" href="{{ route('buscar-solicitud.index') }}"
            :active="request()->routeIs('buscar-solicitud.index')" />
        <x-sidebar.sublink title="Mostrar solicitud" href="{{ route('mostrar-solicitud.show') }}"
            :active="request()->routeIs('mostrar-solicitud.show')" />
    </x-sidebar.dropdown>

</x-perfect-scrollbar>