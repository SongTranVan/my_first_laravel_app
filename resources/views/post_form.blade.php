<form action="{{route('mypostForm')}}" method="post">
  @csrf
  <input type="text" name="HoTen"/>
  <input type="submit" value="Send"/>
</form>
