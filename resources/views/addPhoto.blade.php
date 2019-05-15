<form action="" method = "POST">
   <p>
   <select name="account">
   @foreach($users as $user)
   {
    <option>{{$user->uname}}</option>
   }
   @endforeach
   </select>
   <br/>
   <input type="file" name="photo" multiple accept="image/*,image/jpeg">
   <br/>
   <br/>
   <br/>

   <input type="submit" value="Отправить"></p>
  </form> 
