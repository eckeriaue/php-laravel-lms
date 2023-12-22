<?php

namespace App\Orchid\Layouts;

use App\Models\CourseCategory;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;

class CourseEditLayout extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        return [
            Input::make('course.name')
                ->type('text')
                ->max(255)
                ->required()
                ->title(__('Название'))
                ->placeholder(__('Введите название курса')),

            TextArea::make('course.description')
                ->type('text')
                ->title(__('Описание')),

            Select::make('course.category_id')
                ->title(__('Категория'))
                ->required()
                ->fromModel(CourseCategory::class, 'name', 'id')
        ];
    }
}
