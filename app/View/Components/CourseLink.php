<?php

namespace App\View\Components;

use App\Models\Course;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CourseLink extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $course,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        // return function($a) {
        //     dd($a);
        // };
        return <<<'HTML'
            <article>
            <a
                role="link"
                href="{{ route('learn.page', ['id' => $course?->id ?? 0]) }}"
                class="
                    flex flex-col justify-between
                    p-4 shadow transition-all
                    duration-150 ease-in-out
                    w-full h-full
                    rounded-2xl hover:rounded-3xl
                    outline outline-gray-300 dark:outline-gray-700 hover:outline-sky-400
                    dark:hover:outline-sky-600 outline-2
                    cursor-pointer
                    "
            >
                <header>            
                    <p class="flex gap-1 mb-1 text-sm">
                        {{$course->category->name}}
                    </p>
                    <h3 class="mb-1 text-xl font-medium">
                        {{$course->name}}
                    </h3>
                    <p class="my-4 text-gray-500 max-h-[79px] text-ellipsis overflow-hidden">
                        {{$course->description}}
                    </p>
                </header>

                <footer
                    class="flex justify-between items-center leading-6"
                >
                    <span
                        title="Курс проверен командой Igs Internet."
                        class="flex items-center text-nowrap text-gray-500 gap-1"
                        >Igs Internet.
                        <svg
                            class="w-4 h-4 fill-slate-500 mt-1"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M12 21a9 9 0 100-17.999A9 9 0 0012 21zM8.097 10.726l2.475 2.474 5.302-5.302 1.414 1.414-6.719 6.72-1.414-1.415.002-.002-2.474-2.475 1.414-1.414z"
                            ></path>
                        </svg>
                    </span>

                    <button
                        type=button
                        class="px-2 py-1 text-xs bg-white dark:bg-gray-800 rounded"
                    >
                        начать
                    </button>
                </footer>
            </a>
            </article>
        HTML;
    }
}
