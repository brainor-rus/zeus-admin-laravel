<?php

namespace App\Admin\Sections;

use App\Models\City;
use App\Models\Role;
use App\Models\Type;
use App\Models\User;
use Zeus\Admin\Section;
use Zeus\Admin\SectionBuilder\Display\BaseDisplay\Display;
use Zeus\Admin\SectionBuilder\Display\Table\Columns\BaseColumn\Column;
use Zeus\Admin\SectionBuilder\Display\Table\DisplayTable;
use Zeus\Admin\SectionBuilder\Filter\Types\BaseType\FilterType;
use Zeus\Admin\SectionBuilder\Form\BaseForm\Form;
use Zeus\Admin\SectionBuilder\Form\Panel\Columns\BaseColumn\FormColumn;
use Zeus\Admin\SectionBuilder\Form\Panel\Fields\BaseField\FormField;
use Illuminate\Support\Facades\Request;
use Illuminate\View\View;

class Contacts extends Section
{
    protected $title = 'Контакты';
    protected $model = '\App\Models\Contact';

    protected $checkAccess = true;

    public static function onDisplay(Request $request){

        $display = Display::table([
            Column::text('user.name', 'Пользователь'),
            Column::text('type.name', 'Тип'),
            Column::text('value', 'Значение'),
        ])->setPagination(10);

        return $display;
    }

    public static function onCreate()
    {
        return self::onEdit();
    }

    public static function onEdit()
    {
        $form = Form::panel([
            FormColumn::column([
                FormField::select('user_id', 'Пользователь')
                    ->setModelForOptions(User::class)
                    ->setDisplay('name')
                    ->setRequired(1),
                FormField::select('type_id', 'Тип')
                    ->setModelForOptions(Type::class)
                    ->setDisplay('name')
                    ->setQueryFunctionForModel(function ($query) {
                        return $query->where('class', 'ContactType');
                    })
                    ->setRequired(1),
                FormField::input('value', 'Значение')
            ])
        ]);

        return $form;
    }
}