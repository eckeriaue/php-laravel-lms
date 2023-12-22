<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Обучение') }}
        </h2>
    </x-slot>



    <div class="page_wrapper container mx-auto 2xl">
            <main class="flex gap-8 pt-16 pb-24">
                <aside class="text-base w-56">
                    <nav>
                        <h4 class="pt-2 pb-2 font-medium">Категории <i>курсов</i> </h4>
                        <menu class="flex flex-col">
                            <ul>
                                @foreach($categories as $category)
                                <li class="py-2 hover:bg-white dark:hover:bg-gray-800">
                                    <a
                                        class="pt-2 pb-2 pl-4 pr-8 text-gray-400"
                                        href="#"
                                        >{{ $category->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </menu>
                    </nav>
                </aside>
                <div class="main_content max-w-7xl">
                    <h1 class="mb-8 leading-8 text-4xl font-bold">
                        Список <i>курсов</i> 
                    </h1>
                    <div class="filters mb-8 flex justify-between ">
                        <div class="tabs flex">
                            <!-- <button
                                class="py-1.5 px-6 border-2 border-gray-950 rounded-3xl mx-1 mt-3 hover:bg-slate-300"
                            >
                                пока не знаю для чего эта кнопка
                            </button> -->
                        </div>
                    </div>
                    <div class="catalog_cards grid grid-cols-[repeat(3,minmax(120px,420px))] grid-rows-[min(220px)] gap-5">
                        @foreach($courses as $course)
                            <x-course-link :course="$course"></x-course-link>
                        @endforeach
                    </div>
                </div>
            </main>
        </div>

</x-app-layout>
