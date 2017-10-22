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
            'title' => 'Знакомство с Adobe After Effect',
            'duration' => 5,
            'description' => 'Введение в After Effects. Знакомство с AE, его интерфейсом , базовыми инструментами и др.',
            'online_player' => '',
            'download_link' => '',
            'active' => true,
        ]);

        Lesson::create([
            'title' => 'Текстовые заставки',
            'duration' => 5,
            'description' => 'Текстовые заставки. Данная глава отвечает за: анимацию текста, инфографика, типографика и др.',
            'online_player' => '',
            'download_link' => '',
            'active' => true,
        ]);

        Lesson::create([
            'title' => 'Цветокоррекция',
            'duration' => 5,
            'description' => 'Здесь мы подробно разберем процесс изменения яркости, контраста, насыщенности и цвета изображения.',
            'online_player' => '',
            'download_link' => '',
            'active' => true,
        ]);

        Lesson::create([
            'title' => 'Слайдшоу',
            'duration' => 5,
            'description' => 'В этом уроке Вы разберете эффектные переходы, анимацию слайдов, анимацию титров',
            'online_player' => '',
            'download_link' => '',
            'active' => true,
        ]);

        Lesson::create([
            'title' => 'Анимация',
            'duration' => 5,
            'description' => 'Введение в Анимацию, основы работы с выражениями, Сжатие/растяжение и многое другое.',
            'online_player' => '',
            'download_link' => '',
            'active' => true,
        ]);

        Lesson::create([
            'title' => 'Шейповая анимированная графика',
            'duration' => 5,
            'description' => 'Знакомство с шейпами, анимированние роликов и многое др.',
            'online_player' => '',
            'download_link' => '',
            'active' => true,
        ]);

        Lesson::create([
            'title' => 'Слои в трехмерном пространстве',
            'duration' => 5,
            'description' => 'В этом уроке Вы научитесь "оживлять" свои фотографии и др.',
            'online_player' => '',
            'download_link' => '',
            'active' => true,
        ]);

        Lesson::create([
            'title' => '3D-графика',
            'duration' => 5,
            'description' => 'В этом уроке Вы научитесь создавать 3D объекты и многое другое.',
            'online_player' => '',
            'download_link' => '',
            'active' => true,
        ]);

        Lesson::create([
            'title' => 'Зеленый фон',
            'duration' => 5,
            'description' => 'Данный урок научит Вас работать с зеленым/синим фоном, так же Вы узнаете что такое Хромакей и др.',
            'online_player' => '',
            'download_link' => '',
            'active' => true,
        ]);
        Lesson::create([
            'title' => 'Вывод композиции',
            'duration' => 5,
            'description' => 'Экспорт композиции из After Effects в готовый видео-файл.',
            'online_player' => '',
            'download_link' => '',
            'active' => true,
        ]);

    }
}
