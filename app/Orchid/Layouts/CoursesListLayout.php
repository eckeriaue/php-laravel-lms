<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use App\Models\Course;
use Orchid\Screen\Actions\Button;

class CoursesListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'courses';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [

            TD::make('name', __('Название'))
                ->sort()
                ->cantHide()
                ->filter(Input::make())
                ->render(fn (Course $course) => $course->name),

            TD::make('category_id', __('Категория'))
                ->cantHide()
                ->filter(Input::make())
                ->render(fn (Course $course) => $course->category?->name ?? '—'),

            TD::make('created_at', __('Создан'))
                ->usingComponent(DateTimeSplit::class)
                ->align(TD::ALIGN_RIGHT)
                ->defaultHidden()
                ->sort(),

            TD::make('updated_at', __('Последнее редактирование'))
                ->usingComponent(DateTimeSplit::class)
                ->align(TD::ALIGN_RIGHT)
                ->sort(),

            TD::make(__('Действия'))
            ->align(TD::ALIGN_CENTER)
            ->width('100px')
            ->render(fn (Course $course) => DropDown::make()
                ->icon('bs.three-dots-vertical')
                ->list([
                    Link::make(__('Изменить'))
                        ->route('course.edit', $course->id)
                        ->icon('bs.pencil'),
                    Button::make(__('Удалить'))
                        ->icon('bs.trash3')
                        ->confirm(__('уверены что хотите удалить курс ?'))
                        ->method('remove', ['id' => $course->id]),
                ])
            ),
        ];
    }
}
