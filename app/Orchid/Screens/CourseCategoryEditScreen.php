<?php

namespace App\Orchid\Screens;

use App\Models\CourseCategory;
use App\Orchid\Layouts\CourseCategoryEditLayout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Illuminate\Http\Request;
use Orchid\Support\Facades\Toast;

class CourseCategoryEditScreen extends Screen
{
    /**
     * @var \App\Models\CourseCategory
     */
    public $category;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this?->category?->exists ? 'Редактирование категории' : 'Создание категории';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [

            Button::make(__('Удалить'))
            ->type(Color::BASIC)
            ->icon('bs.trash3')
            ->method('remove')
            ->canSee($this->category?->exists && $this->category?->id),

            Button::make(__('Сохранить'))
            ->type(Color::BASIC)
            ->icon('bs.check-circle')
            ->method('save')
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
            Layout::block(CourseCategoryEditLayout::class)
            ->title(__('Создание категории'))
            ->description(__('К категориям будут отноится курсы и фильтроваться по ним.'))
        ];
    }

    public function save(CourseCategory $category, Request $request) {
        $name = $request->get('categories')['name'];
        $category->fill(['name' => $name]);
        if ($this->category?->exists) {
            $category->update();
        }
        else {
            $category->save();
        }
        Toast::info(__($this->category?->exists ? 'категория обновлена.' : 'категория создана.'));
    }

}
