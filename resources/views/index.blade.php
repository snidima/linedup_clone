@extends('layouts/main')

@section('title','Онлайн курсы видеомонтажа в Adobe After Effects школы Linedup.ru')
@section('description','На этом сайте вы можете купить и записаться на онлайн курс видеомонтажа в программе Adobe After Effects - школы LinedUp')

@section('content')
    <div class="scroll-to-top js-scrollToTop">
        <div class="scroll-to-top__icon">
            <svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 20 11" style="enable-background:new 0 0 20 11;" xml:space="preserve">
                <path class="st0" d="M10.7,0.3c-0.4-0.4-1-0.4-1.4,0l-9,9c-0.4,0.4-0.4,1,0,1.4c0.4,0.4,1,0.4,1.4,0L10,2.4l8.3,8.3
                    c0.4,0.4,1,0.4,1.4,0c0.4-0.4,0.4-1,0-1.4L10.7,0.3z"/>
            </svg>
        </div>
        <div class="scroll-to-top__caption">
            Наверх
        </div>
    </div>
    @include('index/section-1')
    @include('index/section-2')
    @include('index/section-3')
    @include('index/section-4')
    <section class="section_black section" id="reviews">
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
                    'videoTitle' => 'Одна из работ Анны:',
                    'poster' => '/images/rev1.jpg',
                    'video' => 'https://zerocdn.com/61449013/Anna%20Besaraba%20Slide%20Show.mp4',
                ]])


                @include('partials.review',['review' => [
                    'photo' => 'https://pp.userapi.com/c846220/v846220207/25c25/E6X6hT9qdCQ.jpg?ava=1',
                    'name' => 'Эвелина Чурилова',
                    'link' => 'https://vk.com/churilova.lina',
                    'stars' => 5,
                    'text' => "Я не новичок в адобовских приложениях,
                    но After Effects всегда обходила стороной и честно говоря побаивалась его интерфейса.
                    Ребята с \"linedUp\" помогли во всем разобраться и расставить все точки над \"ё\".
                    После прохождения курса я неплохо ориентируюсь в программе,
                    а самое главное это то что я научилась делать слайд шоу и прикольные короткие видео,
                    а так же овладела базами цветокорекции. Спасибо всей команде за предоставленный курс, всем мир!",
                    'videoTitle' => 'Одна из работ Эвелины:',
                    'poster' => '/images/rev2.jpg',
                    'video' => 'https://zerocdn.com/61449016/Evelina%20Churilova%20Paralax.mp4',
                ]])

                {{--@include('partials.review',['review' => [--}}
                    {{--'photo' => 'https://pp.userapi.com/c845324/v845324082/10467/788kYxfLQyw.jpg?ava=1',--}}
                    {{--'name' => 'Анна Ковалева',--}}
                    {{--'link' => 'https://vk.com/anya_kovalyova_12',--}}
                    {{--'stars' => 5,--}}
                    {{--'text' => "Хочу выразить большую благодарность за то что мне помогли разобраться с ключевыми кадрами и выражениями.--}}
                    {{--Я графический дизайнер и переход со статики в анимацию для меня дался очень не просто.--}}
                     {{--Цель прохождения курса было научиться анимировать инфографику, я получила то что хотела, спасибо команде \"LinedUp\"!",--}}
                    {{--'videoTitle' => 'Одна из работ Анны:',--}}
                    {{--'poster' => '/images/rev3.jpg',--}}
                    {{--'video' => 'http://zerocdn.com/61449017/Kovaleva%20Anna%20infographics.mp4',--}}
                {{--]])--}}

                @include('partials.review',['review' => [
                    'photo' => 'https://pp.userapi.com/c845324/v845324082/10467/788kYxfLQyw.jpg?ava=1',
                    'name' => 'Анна Ковалева',
                    'link' => 'https://vk.com/anya_kovalyova_12',
                    'stars' => 5,
                    'text' => "Хочу выразить большую благодарность за то что мне помогли разобраться с ключевыми кадрами и выражениями.
                    Я графический дизайнер и переход со статики в анимацию для меня дался очень не просто.
                     Цель прохождения курса было научиться анимировать инфографику, я получила то что хотела, спасибо команде \"LinedUp\"!",
                    'videoTitle' => 'Одна из работ Анны:',
                    'poster' => '/images/rev3.jpg',
                    'video' => 'https://zerocdn.com/61449017/Kovaleva%20Anna%20infographics.mp4',
                ]])

            </div>
        </div>
    </section>
    @include('partials.footer')
@endsection