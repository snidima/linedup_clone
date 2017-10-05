<?php

use App\Models\Lesson;
use Illuminate\Database\Seeder;

class LessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lesson::create([
            'sort' => 1,
            'title' => 'Знакомство с Adobe After Effect',
            'description' => 'Введение в After Effects. Знакомство с AE, его интерфейсом , базовыми инструментами и др.',
            'online_player' => '',
            'download_link' => '',
            'active' => true,
        ]);

        Lesson::create([
            'sort' => 2,
            'title' => 'Текстовые заставки',
            'description' => 'Текстовые заставки. Данная глава отвечает за: анимацию текста, инфографика, типографика и др.',
            'online_player' => '',
            'download_link' => '',
            'active' => true,
        ]);

        Lesson::create([
            'sort' => 3,
            'title' => 'Цветокоррекция',
            'description' => 'Здесь мы подробно разберем процесс изменения яркости, контраста, насыщенности и цвета изображения.',
            'online_player' => '',
            'download_link' => '',
            'active' => true,
        ]);

        Lesson::create([
            'sort' => 4,
            'title' => 'Слайдшоу',
            'description' => 'В этом уроке Вы разберете эффектные переходы, анимацию слайдов, анимацию титров',
            'online_player' => '',
            'download_link' => '',
            'active' => true,
        ]);

        Lesson::create([
            'sort' => 5,
            'title' => 'Анимация',
            'description' => 'Введение в Анимацию, основы работы с выражениями, Сжатие/растяжение и многое другое.',
            'online_player' => '',
            'download_link' => '',
            'active' => true,
        ]);

        Lesson::create([
            'sort' => 6,
            'title' => 'Шейповая анимированная графика',
            'description' => 'Знакомство с шейпами, анимированние роликов и многое др.',
            'online_player' => '',
            'download_link' => '',
            'active' => true,
        ]);

        Lesson::create([
            'sort' => 7,
            'title' => 'Слои в трехмерном пространстве',
            'description' => 'В этом уроке Вы научитесь "оживлять" свои фотографии и др.',
            'online_player' => '',
            'download_link' => '',
            'active' => true,
        ]);

        Lesson::create([
            'sort' => 8,
            'title' => '3D-графика',
            'description' => 'В этом уроке Вы научитесь создавать 3D объекты и многое другое.',
            'online_player' => '',
            'download_link' => '',
            'active' => true,
        ]);

        Lesson::create([
            'sort' => 9,
            'title' => 'Зеленый фон',
            'description' => 'Данный урок научит Вас работать с зеленым/синим фоном, так же Вы узнаете что такое Хромакей и др.',
            'online_player' => '',
            'download_link' => '',
            'active' => true,
        ]);
        Lesson::create([
            'sort' => 10,
            'title' => 'Вывод композиции',
            'description' => 'Экспорт композиции из After Effects в готовый видео-файл.',
            'online_player' => '',
            'download_link' => '',
            'active' => true,
        ]);

    }
}
