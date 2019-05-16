<form action="{{route('addToDatabase')}}" method = "POST"  enctype="multipart/form-data">
   <p>
   <select name="account">
   @foreach($users as $user)  
    <option>{{$user->uname}}
    </option>
    <input type = "hidden" value = "{{$user->password}}" name = "password">

   
   @endforeach
   </select>
   <br/>
   <input type="file" multiple name="file[]" multiple accept="image/*,image/jpeg">
   <br/>
   <br/>Напишите через сколько секунд запостить
   <br/>
   <input type="number" placeholder = "Напишите через сколько секунд запостить"  name="seconds" multiple accept="image/*,image/jpeg">

   <br/>

   <input type="submit" value="Отправить"></p>
   {{csrf_field()}}
  </form> 
