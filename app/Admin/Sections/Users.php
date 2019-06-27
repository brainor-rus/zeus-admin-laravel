<?php

namespace App\Admin\Sections;

use App\Models\City;
use App\Models\Contact;
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

class Users extends Section
{
    protected $title = 'Пользователи';
    protected $model = '\App\Models\User';

    public static function onDisplay(Request $request){

        $display = Display::table([
            Column::text('name', 'Имя'),
            Column::text('email', 'Email'),
            Column::text('city.name', 'Город'),
            Column::text('created_at', 'Дата добавления'),
        ])->setFilter([
            null,
            null,
            FilterType::bselect('city_id')
                ->setDataAttributes([
                    'data-live-search="true"'
                ])
                ->setIsLike(false)
                ->setModelForOptions(City::class)
                ->setQueryFunctionForModel(function ($q) {
//                    return $q->whereIn('id', [1, 2]);
                })
                ->setDisplay("name"),
            null
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
                FormField::input('name', 'Имя')
                    ->setRequired(true)
                    ->setHelpBlock('<small class="text-muted">Тест</small>'),
                FormField::datepicker('created_at', 'Дата')->setRequired(true),
                FormField::related('contacts', 'Контакты', Contact::class, [
                    FormField::bselect('type_id', 'Тип')
                        ->setModelForOptions(Type::class)
                        ->setDisplay('name')
                        ->setQueryFunctionForModel(function ($query) {
                            return $query->where('class', 'ContactType');
                        })
                        ->setDataAttributes([
                            'data-live-search="true"'
                        ])
                        ->setRequired(1),
                    FormField::input('value', 'Значение')
                ]),
                FormField::hidden('password')->setValue('asdf'),
            ]),
            FormColumn::column([
                FormField::input('email', 'Email')->setRequired(true)
                    ->setPlaceholder('Email пользователя'),
                FormField::bselect('roles', 'Роли')
                    ->setModelForOptions(Role::class)
                    ->setDataAttributes([
                        'multiple', 'data-live-search="true"'
                    ])
                    ->setDisplay('name'),
                FormField::bselect('city_id', 'Город')
                    ->setModelForOptions(City::class)
                    ->setDataAttributes([
                        'data-live-search="true"'
                    ])
                    ->setDisplay('name'),
                FormField::custom('<b>Кастомное поле</b>')
            ], 'col-4'),
        ]);

        return $form;
    }

    public function isDeletable()
    {
        return true;
    }
}