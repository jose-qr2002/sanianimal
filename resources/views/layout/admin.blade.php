@extends('app')

@section('body')
<div class="app">
    <aside class="sidebar-container" id="sidebar">
        <header class="sidebar-container__header">
            <div class="sidebar-container__title">
                <div class="sidebar-container__header__logo">
                    <i class="ri-medicine-bottle-fill"></i>
                </div>
                <div class="sidebar-container__header__brand">SaniAnimal</div>
            </div>
            <div class="sidebar-container__hamburguer" id="sidebar-close">
                <i class="ri-menu-line"></i>
            </div>
        </header>
        <ul class="sidebar-container__list">
            <li class="sidebar-container__list__item"><a class="sidebar-container__enlace {{ request()->routeIs('dashboard') ? 'active' : '' }}" href=""><i class="ri-layout-5-fill"></i> Dashboard</a></li>
            <li class="sidebar-container__list__item"><a class="sidebar-container__enlace {{ request()->routeIs('customers.index') ? 'active' : '' }}" href="{{ route('customers.index') }}"><i class="ri-user-fill"></i> Clientes</a></li>
            <li class="sidebar-container__list__item"><a class="sidebar-container__enlace {{ request()->routeIs('pets.index') ? 'active' : '' }}" href="{{ route('pets.index') }}"><i class="ri-stethoscope-fill"></i> Mascotas</a></li>
            <li class="sidebar-container__list__item"><a class="sidebar-container__enlace {{ request()->routeIs('histories.index') ? 'active' : '' }}" href="{{ route('histories.index') }}"><i class="ri-clipboard-fill"></i> H. Clinico</a></li>
            <li class="sidebar-container__list__item"><a class="sidebar-container__enlace {{ request()->routeIs('medications.index') ? 'active' : '' }}" href="{{ route('medications.index') }}"><i class="ri-medicine-bottle-fill"></i> Medicamentos</a></li>
            <li class="sidebar-container__list__item"><a class="sidebar-container__enlace {{ request()->routeIs('services.index') ? 'active' : '' }}" href=""><i class="ri-scissors-2-fill"></i> Estetica</a></li>
            <li class="sidebar-container__list__item"><a class="sidebar-container__enlace {{ request()->routeIs('ventas.index') ? 'active' : '' }}" href=""><i class="ri-money-dollar-circle-fill"></i> Ventas</a></li>
            <li class="sidebar-container__list__item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="sidebar-container__enlace"  type="submit" href=""><i class="ri-door-open-fill"></i> Logout</button>
                </form>
            </li>
        </ul>
    </aside>
    <div class="cotenido-principal">
        <nav class="nav">
            <h1 class="nav__title">SaniAnimal</h1>
            <div class="nav__hamburguer" id="sidebar-open">
                <i class="ri-menu-line"></i>
            </div>
        </nav>
        <main class="mx-auto" style="width: 95%">
            @yield('contenido')
        </main>
    </div>
</div>
@push('scripts')
    @session('msn_success')
        <script>
            let mensaje="{{ $value }}";

            Swal.fire({
                icon:"success",
                html: `<span style="font-size: 16px;">${mensaje}</span>`,
            });
        </script>
    @endsession
    @session('msn_error')
        <script>
            let mensaje="{{ $value }}";

            Swal.fire({
                icon:"error",
                html: `<span style="font-size: 16px;">${mensaje}</span>`,
            });
        </script>
    @endsession
    <script>
        function confirmaEliminarCliente(event){
            event.preventDefault();
            let form=event.target;

            Swal.fire({
                //title: "?",
                text: "¿Estás seguro de que deseas eliminar este cliente?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si",
                cancelButtonText: "No"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });

        }
    </script>
@endpush
@endsection
