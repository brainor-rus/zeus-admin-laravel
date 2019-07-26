<?php

namespace App\Admin\Sections;

use App\Models\Role;
use Zeus\Admin\Section;
use Zeus\Admin\SectionBuilder\Display\BaseDisplay\Display;
use Zeus\Admin\SectionBuilder\Display\Table\Columns\BaseColumn\Column;
use Zeus\Admin\SectionBuilder\Display\Table\DisplayTable;
use Zeus\Admin\SectionBuilder\Form\BaseForm\Form;
use Zeus\Admin\SectionBuilder\Form\Panel\Columns\BaseColumn\FormColumn;
use Zeus\Admin\SectionBuilder\Form\Panel\Fields\BaseField\FormField;
use Illuminate\Support\Facades\Request;
use Illuminate\View\View;

class Permissions extends Section
{
    protected $title = 'Привелегии';
    protected $model = '\App\Models\Permission';

//    protected $checkAccess = true;

    public static function onDisplay(Request $request){

        $display = Display::table([
            Column::text('name', 'Имя'),
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
                FormField::input('name', 'Имя')->setRequired(true),
                FormField::input('slug', 'Слаг')->setRequired(true),
                FormField::textarea('description', 'Описание'),
            ])
        ]);

        return $form;
    }

    public function isDeletable()
    {
        return true;
    }
}