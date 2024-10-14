@extends('layout.admin')

@section('contenido')
    <x-card class="mt-8 mb-8 history">
        <header class="history-header">
            <div class="history-principal">
                <img class="history__img" src="{{ asset('img/profile/perro.png') }}" alt="">
                <div class="history-info">
                    <p class="history__pet">{{ $history->pet->name }}</p>
                    <p class="history__pet-detail">{{ "{$history->pet->specie->specie} - {$history->pet->race} - {$history->pet->sex}" }}</p>
                    <p class="history__pet-detail">Propietario: {{ "{$history->pet->customer->name} {$history->pet->customer->lastname}" }}</p>
                </div>
            </div>
            <div class="history-secondary">
                <div class="history__badge">
                    <p>{{ $history->number }}</p>
                </div>
                <div class="history__badge">
                    <p>Activo</p>
                </div>
            </div>
        </header>

        <hr class="mt-4 mb-4">

        <h2 class="card__title">Visitas</h2>

        <section class="history__visits">
            <table class="table">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Temperatura</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($history->visits as $visit)
                        <tr>
                            <td>{{ $visit->date->toDateString() }}</td>
                            <td>{{ $visit->time }}</td>
                            <td>{{ $visit->temperature }}</td>
                            <td>
                                <a href="{{ route('visits.edit', $visit->id) }}"><i class="ri-file-edit-line edit-icon icons"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </x-card>
@endsection