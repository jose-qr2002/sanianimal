<div class="card {{ $class }}">
    @if ($title)
        <h2 class="card__title">{{ $title }}</h2> 
    @endif
    <div class="card__body">
        {{ $slot }}
    </div>
</div>
