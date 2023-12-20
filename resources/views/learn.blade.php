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
                <ul>
                    <li> item 1 </li>
                </ul>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <!--  content -->
                <ul class="">
                    @foreach($courses as $course)
                        <li> {{$course}} </li>
                    @endforeach
                </ul>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
