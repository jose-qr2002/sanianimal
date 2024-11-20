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

        @if ($history->visits->count() != 0)
            <hr class="mt-4 mb-4">

            <h2 class="card__title">Visitas</h2>

            <section class="history__visits">
                <livewire:visits.show-visits :history='$history'/>
            </section>
        @endif
        
        <hr class="mt-4 mb-4">
        <form onsubmit="confirmateDeleteHistory(event)" action="{{ route('histories.destroy', $history->id) }}" method="POST" >
            @csrf
            @method('DELETE')
            <section class="danger-zone">
                    @if ($history->visits->count() != 0)
                        <p>La historia clinica contiene visitas registradas por lo tanto no se puede eliminar esta historia directamente sin antes eliminar las visitas</p>
                    @else 
                        <p>El siguiente boton eliminara esta historia clinica pero no los datos de la mascota ni del dueño</p>
                        <button type="submit" class="form__button--red">Eliminar</button>
                    @endif
            </section>
        </form>
    </x-card>
    @push('scripts')
        <script>
            function confirmateDeleteHistory(event){
                event.preventDefault();
                let form=event.target;

                Swal.fire({
                    //title: "?",
                    text: "¿Estás seguro de que deseas eliminar esta historia clinica?",
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