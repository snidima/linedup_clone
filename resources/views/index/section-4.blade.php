@if( $courses->get(0) )
<section class="section">
    <div class="container">
        <h2 class="h3" id="price">Цены на онлайн-видеокурсы</h2>

        <div class="message warning message_before-price">
            <div class="message__title">
                Уважаемые поситители и будущие ученики!
            </div>
            <div class="message__message">
                Вы можете оплатить курс частями! Половину курса вы можете оплатить сразу, а половину через 5 занятий!<br>
                Для тех, кто оплачивает курс целиком работает система промокодов.
            </div>
        </div>
        <div class="courses-thumb-wrapper">
            @foreach($courses as $course)
                @include('partials/course-thumb', ['course' => $course])
            @endforeach
        </div>
    </div>
</section>
@endif