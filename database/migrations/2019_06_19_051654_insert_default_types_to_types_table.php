<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertDefaultTypesToTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $types = [
            [
                'name' => 'Телефон',
                'class' => 'ContactType',
            ],
            [
                'name' => 'Email',
                'class' => 'ContactType',
            ],
        ];

        foreach($types as $type) {
            $typeModel = new \App\Models\Type();

            $typeModel->name = $type['name'];
            $typeModel->class = $type['class'];

            $typeModel->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
