<ul>
  @foreach($items as $class =>  $item)
      <li class='{{ $class }}'>{{ $item }}</li>
  @endforeach
</ul>
