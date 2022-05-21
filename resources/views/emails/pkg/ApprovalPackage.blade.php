
@component('mail::message')
    # Hello OurClient,
    <br>
    Your Package has been activated tody

    @component('mail::button', ['url' => 'https://ko-sky.com/client_join'])
        البوابة الالكترونية
    @endcomponent
    @component('mail::button', ['url' => 'https://apps.apple.com/sa/app/%D8%AE%D9%8A%D8%B1-%D8%B9%D9%88%D9%86/id1583985554'])
        رابط التطبيق للآيفون
    @endcomponent
    @component('mail::button', ['url' => 'https://play.google.com/store/apps/details?id=com.kojed.khayroawn'])
        رابط التطبيق للاندرويد
    @endcomponent

    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent