<div class="course-detail course-detail_userpage">
    <div class="course-detail__title">Детали урока</div>

    <div class="course-detail__texts course-detail-texts">
        <div class="course-detail-texts__left">
            Дата:
        </div>
        <div class="course-detail-texts__right">
            {{iconv("cp1251", "UTF-8", \Carbon\Carbon::parse($lesson->date_start)->formatLocalized('%d %B %Y'))}}
            -
            {{iconv("cp1251", "UTF-8", \Carbon\Carbon::parse($lesson->date_end)->formatLocalized('%d %B %Y'))}}
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
            еще не загружено
        </div>
    </div>

</div>




<div class="course-homework">
    <div class="course-homework__title">Домашнее задание</div>
    @if( $homework )
        @if( $homework->check )
            <div class="course-homework-status course-homework-status_success">
                Домашнее задание проверено.
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
    @endif
</div>




<div class="course-teacher">
    <div class="course-teacher__title">Вам будут помогать</div>

    <div class="course-teacher-items">

        <div class="course-teacher-items__item course-teacher-item">
            <div class="course-teacher-item__photo" style=" background-image: url(https://avatars.mds.yandex.net/get-pdb/231404/f0f38eba-ab66-41df-8485-414d239db2de/s1200);"></div>
            <div class="course-teacher-item__name">Никита Литвенков<br>(читает курс)</div>
            <div class="course-teacher-item__desc">Вопросы по курсу и домашним заданиям</div>
            <div class="course-teacher-item__btn">
                <div class="btn btn-small btn-type-2">Написать Никите</div>
            </div>
        </div>

        <div class="course-teacher-items__item course-teacher-item">
            <div class="course-teacher-item__photo" style=" background-image: url(https://avatars.mds.yandex.net/get-pdb/231404/f0f38eba-ab66-41df-8485-414d239db2de/s1200);"></div>
            <div class="course-teacher-item__name">Никита Литвенков<br>(читает курс)</div>
            <div class="course-teacher-item__desc">Вопросы по курсу и домашним заданиям</div>
            <div class="course-teacher-item__btn">
                <div class="btn btn-small btn-type-2">Написать Никите</div>
            </div>
        </div>

    </div>
</div>