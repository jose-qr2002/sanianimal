@extends('cabecera')

@section('body')
<div class="app">
    <div class="sidebar-container" id="sidebar">
        <div class="sidebar-container__header">
            <div class="sidebar-container__title">
                <div class="sidebar-container__header__logo">
                    <i class="ri-medicine-bottle-fill"></i>
                </div>
                <div class="sidebar-container__header__brand">SaniAnimal</div>
            </div>
            <div class="sidebar-container__hamburguer" id="sidebar-close">
                <i class="ri-menu-line"></i>
            </div>
        </div>
        <div class="sidebar-container__list">
            <div class="sidebar-container__list__item"><a href=""><i class="ri-layout-5-fill"></i> Dashboard</a></div>
            <div class="sidebar-container__list__item"><a href="{{ route('clientes.index') }}"><i class="ri-user-fill"></i> Clientes</a></div>
            <div class="sidebar-container__list__item"><a href="{{ route('mascotas.index') }}"><i class="ri-stethoscope-fill"></i> Mascotas</a></div>
            <div class="sidebar-container__list__item"><a href=""><i class="ri-clipboard-fill"></i> H. Clinico</a></div>
            <div class="sidebar-container__list__item"><a href="{{ route('medicamentos.index') }}"><i class="ri-medicine-bottle-fill"></i> Medicamentos</a></div>
            <div class="sidebar-container__list__item"><a href=""><i class="ri-scissors-2-fill"></i> Estetica</a></div>
            <div class="sidebar-container__list__item"><a href=""><i class="ri-money-dollar-circle-fill"></i> Ventas</a></div>
            <div class="sidebar-container__list__item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" href=""><i class="ri-door-open-fill"></i> Logout</button>
                </form>
            </div>
        </div>
    </div>
    <div class="cotenido-principal">
        <nav class="nav">
            <h1 class="nav__title">SaniAnimal</h1>
            <div class="nav__hamburguer" id="sidebar-open">
                <i class="ri-menu-line"></i>
            </div>
        </nav>
        <div class="mx-auto" style="width: 95%">
            @yield('contenido')
        </div>
    </div>
</div>

@endsection
