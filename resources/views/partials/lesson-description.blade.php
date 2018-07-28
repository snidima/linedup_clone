<div class="course-text-block">
    <div class="course-text-block__title">
        Описание урока
    </div>
    <div class="course-text-block__text">
        {{$lesson->description}}
    </div>
</div>

<div class="course-text-block">
    <div class="course-text-block__title">
        Видео
    </div>
    <div class="course-text-block__video">
        <video poster="/poster.jpg" id="lesson-player" playsinline controls>
            <source src="{{$lesson->online_player}}" type="video/mp4">
        </video>
    </div>
</div>