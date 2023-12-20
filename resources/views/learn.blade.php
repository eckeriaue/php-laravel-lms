<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Обучение') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 grid grid-cols-[2fr,8fr] gap-x-4">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                Категории:
                <ul>
                    @foreach($categories as $category)
                    <li> {{$category->name}} </li>
                    @endforeach
                </ul>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <!--  content -->
                <ul class="">
                    @foreach($courses as $course)
                        <li>
                            <a href="{{ route('learn.page', ['id' => $course->id]) }}"> goto </a>
                            {{$course}}
                        </li>
                    @endforeach
                </ul>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
