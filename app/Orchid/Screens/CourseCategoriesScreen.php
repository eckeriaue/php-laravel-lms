<?php

namespace App\Orchid\Screens;

use App\Models\CourseCategory;
use App\Orchid\Layouts\CourseCategoryListLayout;
use Illuminate\Http\Request;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Facades\Toast;

class CourseCategoriesScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'categories' => CourseCategory::all()->sortBy('id'),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Категории';
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
                ->route('category.create'),
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
            CourseCategoryListLayout::class
        ];
    }
    public function remove(Request $request) {
        $category = CourseCategory::findOrFail($request->get('id'));

        if (count($category->courses) > 0) {
            Toast::error(__('Нельзя удалить категорию. Какие-то курсы еще привязаны к категории'));
        }
        else {
            $category->delete();
            Toast::info(__('курс удален.'));
        }
    }
}
