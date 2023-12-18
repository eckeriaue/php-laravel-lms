<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Window extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return <<<'HTML'
            @props([
                'title' => 'Document',
            ])

            <!DOCTYPE html>
            <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>{{ $title }} </title>
                @vite('resources/js/app.js')
                @vite('resources/css/app.css')
            </head>
            <body>
                {{ $slot }}
            </body>
            </html>
        HTML;
    }
}

