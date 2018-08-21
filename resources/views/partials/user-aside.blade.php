<div class="course-detail course-detail_userpage">
    <div class="course-detail__title">Детали урока</div>

    <div class="course-detail__texts course-detail-texts">
        <div class="course-detail-texts__left">
            Дата:
        </div>
        <div class="course-detail-texts__right">
            {{iconv("cp1251", "UTF-8", \Carbon\Carbon::parse($lesson->date_start)->formatLocalized('%d %B'))}}
            -
            {{iconv("cp1251", "UTF-8", \Carbon\Carbon::parse($lesson->date_end)->formatLocalized('%d %B'))}}
        </div>
    </div>


    <div class="course-detail__texts course-detail-texts">
        <div class="course-detail-texts__left">
            Состояние:
        </div>
        <div class="course-detail-texts__right">
            @if( $lesson->was )
                прошел
            @else
                идет
            @endif
        </div>
    </div>



    <div class="course-detail__texts course-detail-texts">
        <div class="course-detail-texts__left">
            Сложность:
        </div>
        <div class="course-detail-texts__right">
            {{$lesson->complexity}}/5
        </div>
    </div>


    <div class="course-detail__texts course-detail-texts">
        <div class="course-detail-texts__left">
            Домашнее задание:
        </div>
        <div class="course-detail-texts__right">
            @if( $regular->course->isDemo )
                не доступно в демо
            @else
                <a href="{{$lesson->homework_link}}" target="_blank">Скачать</a>
            @endif
        </div>
    </div>

    @if( $lesson->stuff_link )
    <div class="course-detail__texts course-detail-texts">
        <div class="course-detail-texts__left">
            Материалы к уроку:
        </div>
        <div class="course-detail-texts__right">
            <a target="_blank" href="{{$lesson->stuff_link}}">Скачать</a>
        </div>
    </div>
    @endif

</div>




<div class="course-homework">
    <div class="course-homework__title">Домашнее задание</div>
    @if( $regular->course->isDemo )
        <div class="course-homework-status course-homework-status_error">
            Дамашние задания не доступны в демо курсах
        </div>
    @elseif( $homework )
        @if( $homework->check )
            <div class="course-homework-status course-homework-status_success">
                Домашнее задание выполнено.<br>
                Оценка: <b>{{$homework->rate}}</b> из 5
            </div>
        @else
            <upload lessonid="{{$lessonID}}" courseid="{{$courseID}}"></upload>
            <div class="course-homework-status course-homework-status_pending">
                Домашнее задание проверяется.
                <small>
                    Пожалуйста, <b>не меняйте и не удаляйте ссылку на видео без необходимости</b> до тех пор, пока ваше задание не будет проверено!
                </small>
            </div>
        @endif
    @else
        <upload lessonid="{{$lessonID}}" courseid="{{$courseID}}"></upload>
        <div class="course-homework-status course-homework-status_new">
            Вставьте ссылку на youtube
            <small>
                Ссылку нужно вставлять в формате <b>https://www.youtube.com/watch?v=xxxxxxx</b>
            </small>
        </div>
    @endif
</div>




<div class="course-teacher">
    <div class="course-teacher__title">Вам будут помогать</div>

    <div class="course-teacher-items">

        <div class="course-teacher-items__item course-teacher-item">
            <div class="course-teacher-item__photo" style=" background-image: url(/images/teacher01.jpg);"></div>
            <div class="course-teacher-item__name">Никита<br>(куратор курса)</div>
            <div class="course-teacher-item__desc">Вопросы по курсу и домашним заданиям</div>
            <div class="course-teacher-item__btn">
                @if( $regular->course->isDemo )
                    <div class="btn btn-small btn-type-2">Не доступно в демо</div>
                @else
                    <a class="btn btn-small btn-type-2" href="https://vk.com/im?media=&sel=-170162452" target="_blank">Написать Никите</a>
                @endif
            </div>
        </div>

        <div class="course-teacher-items__item course-teacher-item">
            <div class="course-teacher-item__photo" style=" background-image: url(/images/manager01.jpg);"></div>
            <div class="course-teacher-item__name">Милена  <br>(менеджер проекта)</div>
            <div class="course-teacher-item__desc">Все остальыне вопросы</div>
            <div class="course-teacher-item__btn">
                @if( $regular->course->isDemo )
                    <div class="btn btn-small btn-type-2">Не доступно в демо</div>
                @else
                    <a class="btn btn-small btn-type-2" href="https://vk.com/im?media=&sel=-136917696" target="_blank">Написать Валерии</a>
                @endif
            </div>
        </div>

    </div>
</div>