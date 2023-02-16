<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tool;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tool = new Tool();
        $tool->fill([
            'name' => 'Bootstrap',
            'img' => '/img/bootstrap.png'
        ]);
        $tool->saveOrFail();

        $tool = new Tool();
        $tool->fill([
        'name' => 'Css',
        'img' => '/img/css3.png'
        ]);
        $tool->saveOrFail();

        $tool = new Tool();
        $tool->fill([
        'name' => 'Html',
        'img' => '/img/html5.png'
        ]);
        $tool->saveOrFail();

        $tool = new Tool();
        $tool->fill([
        'name' => 'Javascript',
        'img' => '/img/javascript.png'
        ]);
        $tool->saveOrFail();

        $tool = new Tool();
        $tool->fill([
        'name' => 'Laravel',
        'img' => '/img/laravel.png'
        ]);
        $tool->saveOrFail();

        $tool = new Tool();
        $tool->fill([
        'name' => 'Maria DB',
        'img' => '/img/mariadb.png'
        ]);
        $tool->saveOrFail();

        $tool = new Tool();
        $tool->fill([
        'name' => 'PHP',
        'img' => '/img/php.png'
        ]);
        $tool->saveOrFail();
    }
}
