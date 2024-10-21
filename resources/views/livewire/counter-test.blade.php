<div>
    <h1>{{ $count }}</h1>
 
    <button wire:click="increment">+</button>
 
    <button wire:click="decrement">-</button>

    <div x-data="{ open: false }">
        <button x-on:click="open = !open">
            Menu
        </button>

        <nav x-show="open" x-on:click.away="open = false">
            <ul>
                <li>Item 1</li>
                <li>Item 2</li>
                <li>Item 3</li>
                <li>Item 4</li>
                <li>Item 5</li>
                <li>Item 6</li>
            </ul>
        </nav>
    </div>
</div>