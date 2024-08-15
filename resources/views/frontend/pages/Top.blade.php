<div id="head" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://via.placeholder.com/200x100" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h3>Connecting you to the best in the business</h3>
        <p>Connecting you to the best in the business</p>
      </div>
    </div>
    @foreach($slider as $slide)
    @if($slide->is_active === '1')
    <div class="carousel-item">
      <img src="https://via.placeholder.com/200x100" class="d-block w-100" alt="{{$slide->slide_title}}">
      <div class="carousel-caption d-none d-md-block">
        <h3>{{$slide->slide_title}}</h3>
        <p>{{$slide->slide_sub_title}}</p>
        @if($slide->button_title)
        <a class="btn btn-primary btn-xl text-uppercase" href="{{$slide->button_link}}">{{$slide->button_title}}</a>
        @endif
      </div>
    </div>
      @endif
    @endforeach

  <button class="carousel-control-prev" type="button" data-bs-target="#head" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#head" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>