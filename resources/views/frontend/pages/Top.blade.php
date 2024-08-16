<div id="head" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    
    @php $head = 1;
    @endphp
    @foreach($slider as $slide)
    @if($slide->is_active === '1')
    <div class="carousel-item @if($head) active @endif">
      <img src="images/{{$slide->slide_link}}" class="d-block w-100" alt="{{$slide->slide_title}}">
      <div class="carousel-caption d-none d-md-block">
        <h3>{{$slide->slide_title}}</h3>
        <p>{{$slide->slide_sub_title}}</p>
        @if($slide->button_title)
        <a class="btn btn-primary btn-xl text-uppercase" href="{{$slide->button_link}}">{{$slide->button_title}}</a>
        @endif
      </div>
    </div>
      @endif
      @php $head = 0;
    @endphp
    @endforeach

  <button class="carousel-control-prev" type="button" data-bs-target="#head" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#head" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>@include('backend.successMessage')  
</div>