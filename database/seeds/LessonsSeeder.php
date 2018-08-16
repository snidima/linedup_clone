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
            'duration' => 2,
            'complexity' => 3,
            'description' => 'Введение в After Effects. Знакомство с AE, его интерфейсом , базовыми инструментами и др.',
            'short_description' => 'Введение в After Effects. Знакомство с AE, его интерфейсом , базовыми инструментами и др.',
            'online_player' => 'http://zerocdn.com/56187091/%D0%97%D0%BD%D0%B0%D0%BA%D0%BE%D0%BC%D1%81%D1%82%D0%B2%D0%BE%20%D1%81%20Adobe%20After%20Effect.mp4',
            'download_link' => 'http://zerocdn.com/56187091/%D0%97%D0%BD%D0%B0%D0%BA%D0%BE%D0%BC%D1%81%D1%82%D0%B2%D0%BE%20%D1%81%20Adobe%20After%20Effect.mp4',
            'homework_link' => 'change me',
            'active' => true,
        ]);

        Lesson::create([
            'title' => 'Текстовые заставки',
            'duration' => 5,
            'complexity' => 3,
            'description' => 'Текстовые заставки. Данная глава отвечает за: анимацию текста, инфографика, типографика и др.',
            'short_description' => 'Текстовые заставки. Данная глава отвечает за: анимацию текста, инфографика, типографика и др.',
            'online_player' => 'http://zerocdn.com/56191732/%D0%A2%D0%B5%D0%BA%D1%81%D1%82%D0%BE%D0%B2%D1%8B%D0%B5%20%D0%B7%D0%B0%D1%81%D1%82%D0%B0%D0%B2%D0%BA%D0%B8.mp4',
            'download_link' => 'http://zerocdn.com/56191732/%D0%A2%D0%B5%D0%BA%D1%81%D1%82%D0%BE%D0%B2%D1%8B%D0%B5%20%D0%B7%D0%B0%D1%81%D1%82%D0%B0%D0%B2%D0%BA%D0%B8.mp4',
            'homework_link' => 'change me',
            'active' => true,
        ]);

        Lesson::create([
            'title' => 'Цветокоррекция',
            'duration' => 5,
            'complexity' => 3,
            'description' => 'Здесь мы подробно разберем процесс изменения яркости, контраста, насыщенности и цвета изображения.',
            'short_description' => 'Здесь мы подробно разберем процесс изменения яркости, контраста, насыщенности и цвета изображения.',
            'online_player' => 'http://zerocdn.com/56192590/%D0%A6%D0%B2%D0%B5%D1%82%D0%BE%D0%BA%D0%BE%D1%80%D1%80%D0%B5%D0%BA%D1%86%D0%B8%D1%8F.mp4',
            'download_link' => 'http://zerocdn.com/56192590/%D0%A6%D0%B2%D0%B5%D1%82%D0%BE%D0%BA%D0%BE%D1%80%D1%80%D0%B5%D0%BA%D1%86%D0%B8%D1%8F.mp4',
            'homework_link' => 'change me',
            'active' => true,
        ]);

        Lesson::create([
            'title' => 'Слайдшоу',
            'duration' => 5,
            'complexity' => 3,
            'description' => 'В этом уроке Вы разберете эффектные переходы, анимацию слайдов, анимацию титров',
            'short_description' => 'В этом уроке Вы разберете эффектные переходы, анимацию слайдов, анимацию титров',
            'online_player' => 'http://zerocdn.com/56193752/%D0%A1%D0%BB%D0%B0%D0%B9%D0%B4%D1%88%D0%BE%D1%83.mp4',
            'download_link' => 'http://zerocdn.com/56193752/%D0%A1%D0%BB%D0%B0%D0%B9%D0%B4%D1%88%D0%BE%D1%83.mp4',
            'homework_link' => 'change me',
            'active' => true,
        ]);

        Lesson::create([
            'title' => 'Анимация',
            'duration' => 5,
            'complexity' => 3,
            'description' => 'Введение в Анимацию, основы работы с выражениями, Сжатие/растяжение и многое другое.',
            'short_description' => 'Введение в Анимацию, основы работы с выражениями, Сжатие/растяжение и многое другое.',
            'online_player' => 'http://zerocdn.com/56194658/%D0%90%D0%BD%D0%B8%D0%BC%D0%B0%D1%86%D0%B8%D1%8F.mp4',
            'download_link' => 'http://zerocdn.com/56194658/%D0%90%D0%BD%D0%B8%D0%BC%D0%B0%D1%86%D0%B8%D1%8F.mp4',
            'homework_link' => 'change me',
            'active' => true,
        ]);

        Lesson::create([
            'title' => 'Шейповая анимированная графика',
            'duration' => 5,
            'complexity' => 3,
            'description' => 'Знакомство с шейпами, анимированние роликов и многое др.',
            'short_description' => 'Знакомство с шейпами, анимированние роликов и многое др.',
            'online_player' => 'http://zerocdn.com/56210196/%D0%A8%D0%B5%D0%B9%D0%BF%D0%BE%D0%B2%D0%B0%D1%8F%20%D0%B0%D0%BD%D0%B8%D0%BC%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%BD%D0%B0%D1%8F%20%D0%B3%D1%80%D0%B0%D1%84%D0%B8%D0%BA%D0%B0.mp4',
            'download_link' => 'http://zerocdn.com/56210196/%D0%A8%D0%B5%D0%B9%D0%BF%D0%BE%D0%B2%D0%B0%D1%8F%20%D0%B0%D0%BD%D0%B8%D0%BC%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%BD%D0%B0%D1%8F%20%D0%B3%D1%80%D0%B0%D1%84%D0%B8%D0%BA%D0%B0.mp4',
            'homework_link' => 'change me',
            'active' => true,
        ]);

        Lesson::create([
            'title' => 'Слои в трехмерном пространстве',
            'duration' => 5,
            'complexity' => 3,
            'description' => 'В этом уроке Вы научитесь "оживлять" свои фотографии и др.',
            'short_description' => 'В этом уроке Вы научитесь "оживлять" свои фотографии и др.',
            'online_player' => 'http://zerocdn.com/56210214/%D0%A1%D0%BB%D0%BE%D0%B8%20%D0%B2%20%D1%82%D1%80%D0%B5%D1%85%D0%BC%D0%B5%D1%80%D0%BD%D0%BE%D0%BC%20%D0%BF%D1%80%D0%BE%D1%81%D1%82%D1%80%D0%B0%D0%BD%D1%81%D1%82%D0%B2%D0%B5.mp4',
            'download_link' => 'http://zerocdn.com/56210214/%D0%A1%D0%BB%D0%BE%D0%B8%20%D0%B2%20%D1%82%D1%80%D0%B5%D1%85%D0%BC%D0%B5%D1%80%D0%BD%D0%BE%D0%BC%20%D0%BF%D1%80%D0%BE%D1%81%D1%82%D1%80%D0%B0%D0%BD%D1%81%D1%82%D0%B2%D0%B5.mp4',
            'homework_link' => 'change me',
            'active' => true,
        ]);

        Lesson::create([
            'title' => '3D-графика',
            'duration' => 5,
            'complexity' => 3,
            'description' => 'В этом уроке Вы научитесь создавать 3D объекты и многое другое.',
            'short_description' => 'В этом уроке Вы научитесь создавать 3D объекты и многое другое.',
            'online_player' => 'http://zerocdn.com/56210221/3D-%D0%B3%D1%80%D0%B0%D1%84%D0%B8%D0%BA%D0%B0.mp4',
            'homework_link' => 'change me',
            'download_link' => 'http://zerocdn.com/56210221/3D-%D0%B3%D1%80%D0%B0%D1%84%D0%B8%D0%BA%D0%B0.mp4',
            'active' => true,
        ]);

        Lesson::create([
            'title' => 'Зеленый фон',
            'duration' => 5,
            'complexity' => 3,
            'description' => 'Данный урок научит Вас работать с зеленым/синим фоном, так же Вы узнаете что такое Хромакей и др.',
            'short_description' => 'Данный урок научит Вас работать с зеленым/синим фоном, так же Вы узнаете что такое Хромакей и др.',
            'online_player' => 'http://zerocdn.com/56210240/%D0%97%D0%B5%D0%BB%D0%B5%D0%BD%D1%8B%D0%B9%20%D1%84%D0%BE%D0%BD.mp4',
            'homework_link' => 'change me',
            'download_link' => 'http://zerocdn.com/56210240/%D0%97%D0%B5%D0%BB%D0%B5%D0%BD%D1%8B%D0%B9%20%D1%84%D0%BE%D0%BD.mp4',
            'active' => true,
        ]);
        Lesson::create([
            'title' => 'Вывод композиции',
            'duration' => 5,
            'complexity' => 3,
            'description' => 'Экспорт композиции из After Effects в готовый видео-файл.',
            'short_description' => 'Экспорт композиции из After Effects в готовый видео-файл.',
            'online_player' => 'http://zerocdn.com/56210270/%D0%92%D1%8B%D0%B2%D0%BE%D0%B4%20%D0%BA%D0%BE%D0%BC%D0%BF%D0%BE%D0%B7%D0%B8%D1%86%D0%B8%D0%B8.mp4',
            'homework_link' => 'change me',
            'download_link' => 'http://zerocdn.com/56210270/%D0%92%D1%8B%D0%B2%D0%BE%D0%B4%20%D0%BA%D0%BE%D0%BC%D0%BF%D0%BE%D0%B7%D0%B8%D1%86%D0%B8%D0%B8.mp4',
            'active' => true,
        ]);

    }
}
