<div class="course-nav">


    @if( $prevLesson )
    <a class="course-nav__prev course-nav-prev" href="{{route('user.lesson',['course' => $courseID, 'lesson' => $lessonID-1])}}">
        <div class="course-nav-prev__texts course-nav-prev-texts">
            <div class="course-nav-prev-texts__time">
                @if( $prevLesson->was )
                    Урок прошел
                @endif
            </div>
            <div class="course-nav-prev-texts__title">
                Урок №{{$lessonID-1}}. {{$prevLesson->title}}
            </div>
        </div>
        <div class="course-nav-prev__icon">
            <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 31.5 22.1" style="enable-background:new 0 0 31.5 22.1;" xml:space="preserve">
                <path class="st0" d="M10.3,0.3c0.4-0.4,1.1-0.4,1.6,0c0.4,0.4,0.4,1.1,0,1.6l-8,8h26.6c0.6,0,1.1,0.5,1.1,1.1s-0.5,1.1-1.1,1.1H3.8
                l8,8c0.4,0.4,0.4,1.2,0,1.6c-0.4,0.4-1.1,0.4-1.6,0l-10-10c-0.4-0.4-0.4-1.1,0-1.6L10.3,0.3z"/>
            </svg>
        </div>
    </a>
    @endif


    <div class="course-nav__current">
        Урок №{{$lessonID}}.{{$lesson->title}}
        @if( $lesson->now )
            Урок идет
        @elseif( $lesson->was )
            Урок прошел
        @endif
    </div>


    @if( $nextLesson )
    <a class="course-nav__next course-nav-next" href="{{route('user.lesson',['course' => $courseID, 'lesson' => $lessonID+1])}}">
        <div class="course-nav-next__icon">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                 viewBox="0 0 31.5 22.1" style="enable-background:new 0 0 31.5 22.1;" xml:space="preserve">
                <path class="st0" d="M21.2,21.8c-0.4,0.4-1.1,0.4-1.6,0c-0.4-0.4-0.4-1.1,0-1.6l8-8H1.1c-0.6,0-1.1-0.5-1.1-1.1S0.5,10,1.1,10h26.6
                l-8-8c-0.4-0.4-0.4-1.2,0-1.6c0.4-0.4,1.1-0.4,1.6,0l10,10c0.4,0.4,0.4,1.1,0,1.6L21.2,21.8z"/>
            </svg>
        </div>
        <div class="course-nav-next__texts course-nav-next-texts">

            <div class="course-nav-next-texts__time">
                @if( $nextLesson->indays > 0 )
                    Начало через {{$nextLesson->indays}} дней
                @elseif( $nextLesson->indays == 0 )
                    Урок идет
                @else
                    Урок прошел
                @endif
            </div>

            <div class="course-nav-next-texts__title">
                Урок №{{$lessonID+1}}. {{$nextLesson->title}}
            </div>
        </div>
    </a>
    @endif


</div>