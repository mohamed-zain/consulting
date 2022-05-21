@component('mail::message')
# {{ $DocName }}

عزيزنا {{ $ClientName }} عميل خير عون
<br>
{{ $Docdetails }}
<br>

يمكنك الموافقة اوالرفض علي المخططات المعماريه من خلال تطبيق خير عون او تسجيل الدخول علي بوابة خير عون للعملاء من خلال الرابط ادناه



@component('mail::button', ['url' => 'https://ko-sky.com/client_join'])
البوابة الالكترونية
@endcomponent
@component('mail::button', ['url' => 'https://apps.apple.com/sa/app/%D8%AE%D9%8A%D8%B1-%D8%B9%D9%88%D9%86/id1583985554'])
    رابط التطبيق للآيفون
@endcomponent
@component('mail::button', ['url' => 'https://play.google.com/store/apps/details?id=com.kojed.khayroawn'])
    رابط التطبيق للاندرويد
@endcomponent
شكرا,<br>
{{ config('app.name') }}
@endcomponent
