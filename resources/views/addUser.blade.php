<form method = "POST" action = "{{route('instaAuth')}}">
<input type = "text" name = "uname" placeholder = "Логин или имейл">
<br/>
<input type = "password" name = "password" placeholder = "Пароль">
<input type = "submit">
{{csrf_field()}}
</form>

@if(count($errors)>0)
@foreach($errors->all() as $error)
{{$error}}
<br/>
@endforeach
@endif