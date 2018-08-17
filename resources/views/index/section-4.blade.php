@if( $courses->get(0) )
<section class="section">
    <div class="container">
        <h2 class="h3" id="price">Цены на онлайн видеокурсы</h2>
        <div class="courses-thumb-wrapper">
            @foreach($courses as $course)
                @include('partials/course-thumb', ['course' => $course])
            @endforeach
        </div>
    </div>
</section>
@endif