@extends('layouts/main')

@section('title','Онлайн курсы видеомонтажа в Adobe After Effects школы Linedup.ru')
@section('description','На этом сайте вы можете купить и записаться на онлайн курс видеомонтажа в программе Adobe After Effects - школы LinedUp')

@section('content')
    @include('index/section-1')
    @include('index/section-2')
    @include('index/section-3')
    @include('index/section-4')
    <section class="section_black section">
        <h3 class="h3" id="reviews">Отзывы наших учеников</h3>

        <div class="container">
            <div class="reviews">
                @include('partials.review',['review' => [
                    'photo' => 'https://pp.userapi.com/c846523/v846523693/3d334/HwkrexKWeJg.jpg?ava=1',
                    'name' => 'Аня Бесараба',
                    'link' => 'https://vk.com/besarabushka',
                    'stars' => 5,
                    'text' => "Я занимаюсь дизайном уже очень давно, порядка 10 лет,
                    в основном рисую сайты и интерфейсы, статики всегда было мало и
                     последние несколько лет хотела заняться моушн дизайном но никак руки не доходили.
                     Случайно наткнулась на курс, цена приятно удивила, решила купить и пройти.
                     Результатом довольна полностью, помогли разобраться с After Effects От и До,
                     научилась делать от простых слайд шоу до инфографики и работы с 3D.
                     Выражаю большую благодарность всей команде \"LinedUp\" за оперативные ответы и помощь в толковании многих моментов",
                    'videoTitle' => 'Одна из работ Ани:',
                    'poster' => '/images/rev1.jpg',
                    'video' => 'http://zerocdn.com/61447561/Anna%20Besaraba%20Slide%20Show.mp4',
                ]])

            </div>
        </div>
    </section>
    @include('partials.footer')
@endsection