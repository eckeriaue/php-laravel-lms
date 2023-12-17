<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{

    public int $counter = 0;

    public function inc(): void
    {
        $this->counter += 1;
    }

    public function dec(): void
    {
        $this->counter -= 1;
    }

    public function render()
    {
        return <<<'HTML'
            <div>
                {{ $counter }}

                <button type="button" wire:click="inc"> + </button>
                <button type="button" wire:click="dec"> - </button>
            </div>
        HTML;
    }
}
