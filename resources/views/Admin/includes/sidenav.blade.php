


    <ul class="nav nav-pills mt-5 flex-column sidebar">
      <li class="nav-item">
        <a class="nav-link active" href="#">Overview <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('trip.index')}}">trips</a>
      </li>
      <li class="nav-item">
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/admin/category')}}">Category</a>
      </li>
    </ul>

    <ul class="nav nav-pills flex-column sidebar">
      <li class="nav-item">
        <a class="nav-link" href="{{route('trip.create')}}">Creat Trip</a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{route('subCategory.index')}}">Products Types</a>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" href="{{url('/admin/city')}}">Create City</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Another nav item</a>
      </li>
    </ul>


  </div>
