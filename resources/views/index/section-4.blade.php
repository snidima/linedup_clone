@if( $courses->get(0) )
<section class="section">
    <div class="container">
        <h3 class="h3" id="price">Цены на видеокурсы</h3>
        <div class="courses-thumb-wrapper">
            @foreach($courses as $course)
                @include('partials/course-thumb', ['course' => $course])
            @endforeach
        </div>
    </div>
</section>
@endif