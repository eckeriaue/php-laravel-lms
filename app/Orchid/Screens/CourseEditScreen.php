<?php

namespace App\Orchid\Screens;

use App\Models\Course;
use App\Orchid\Layouts\CourseEditLayout;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Color;

class CourseEditScreen extends Screen
{

    /**
     * @var Course
     */
    public $course;

    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Course $course): iterable
    {
        return [
            'course' => $course,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return "Course";
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
            ->canSee($this->course->exists && $this->course->id),

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
            Layout::block(CourseEditLayout::class)
            ->title(__('Profile Information'))
            ->description(__('Update your account\'s profile information and email address.'))
        ];
    }

    public function save(Course $course, Request $request) {

        $course->category_id = $request->get('course')['category_id'];
        $course->name = $request->get('course')['name'];

        if ($course->exists) {
            $course->update();
        }
        else {
            $course->save();
        }

        Toast::info(__($this->course->exists ? 'курс обновлен.' : 'курс создан.'));
    }

}
