<div class="container">
    <div class="broadcrumbs">
        <div class="broadcrumbs__item broadcrumbs-item">
            <a href="#">Главная</a>
        </div>

        @if( in_array(\Illuminate\Support\Facades\Route::currentRouteName(), ['user.main']) )
            <div class="broadcrumbs__item broadcrumbs-item">
                <span>Курсы школы</span>
            </div>
        @elseif( in_array(\Illuminate\Support\Facades\Route::currentRouteName(), ['user.lesson']) )

            <div class="broadcrumbs__item broadcrumbs-item">
                <a href="{{route('user.main')}}">Курсы школы</a>
            </div>

            <div class="broadcrumbs__item broadcrumbs-item">
                <span>{{$regular->course->title}}</span>
            </div>
        @elseif( in_array(\Illuminate\Support\Facades\Route::currentRouteName(), ['user.account']) )
            <div class="broadcrumbs__item broadcrumbs-item">
                <span>Настройки аккаунта</span>
            </div>
        @endif



    </div>
</div>