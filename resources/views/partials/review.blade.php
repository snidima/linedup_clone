<div class="review reviews__item">
    <div class="review__photo">
        <img src="{{$review['photo']}}" alt="">
    </div>
    <div class="review__name">
        {{$review['name']}}
    </div>
    <div class="review__link">
        <a target="_blank" href="{{$review['link']}}">{{$review['link']}}</a>
    </div>
    <div class="review__rating">

        @for($i=1; $i<=5;$i++)
        <svg version="1.1" @if($review['stars'] <= $i-1) class="empty" @endif  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 32 31" style="enable-background:new 0 0 32 31;" xml:space="preserve">
        <path d="M16,0l5,11l11,1l-9,7l3,12l-10-6L6,31l3-12l-9-7l11-1"/>
        </svg>
        @endfor

    </div>
    <div class="review__text">
        {{$review['text']}}
    </div>
    <div class="review__video-title">
        {{$review['videoTitle']}}
    </div>
    <div class="review__video">
        <video playsinline controls poster="{{$review['poster']}}">
            <source src="{{$review['video']}}" type="video/mp4">
        </video>
    </div>
</div>