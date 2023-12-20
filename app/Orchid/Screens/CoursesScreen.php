<?php

namespace App\Orchid\Screens;

use App\Models\Course;
use App\Orchid\Layouts\CoursesListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;
use Illuminate\Http\Request;

class CoursesScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            "courses" => Course::all()->sortBy("id"),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Список курсов';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Создать'))
                ->icon('bs.plus-circle')
                ->route('course.create')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            CoursesListLayout::class,
        ];
    }

    public function remove(Request $request) {
        Course::findOrFail($request->get('id'))->delete();
        Toast::info(__('курс удален.'));
    }
}
