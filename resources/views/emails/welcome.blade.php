@component('mail::message')
# Hello,

You have successfully registered an account with Apple Gutters.<br>

Thank you and welcome to Apple Gutters.<br>


Regards,<br>
{{env("MAIL_FROM_NAME")}}

<img src='{{env("APP_URL")}}/public/images/logo.jpeg' style='width: 100px;'>

@endcomponent
