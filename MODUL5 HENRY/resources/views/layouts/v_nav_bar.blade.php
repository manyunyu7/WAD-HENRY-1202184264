@include('layouts.v_style')
<br>
<ul class="nav justify-content-center">
  <li class="nav-item">
  <strong> <a class="nav-link"href="{{ url('/') }}">HOME</a></strong>
  </li>
  <li class="nav-item">
      <strong>
    <a class="nav-link"  href="{{ url('/product') }}">PRODUCT</a></strong>
  </li>
  <li class="nav-item">
  <strong> <a class="nav-link" href="{{ url('/order') }}">ORDER</a></strong>
  </li>
  <li class="nav-item">
  <strong> <a class="nav-link" href="{{ url('/history') }}">HISTORY</a></strong>
  </li>
</ul>