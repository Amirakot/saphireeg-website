
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="main_nav">

<ul class="navbar-nav">
<li class="nav-item"> <a class="nav-link" href="{{ route('welcome') }}"> Home </a> </li>

<li class="nav-item dropdown">
    <a class=" nav-link dropdown-toggle" href="#" data-toggle="dropdown" >  About </a>
    <ul class="dropdown-menu">
@foreach($abouts as $about)
    @php
        $aboutlevel1 = $about->aboutlevel1;
    @endphp
    @endforeach
    @foreach($aboutlevel1 as $level)

    <li><a class="dropdown-item" href="{{ route('showaboutlevel1',$level->id) }}">{{ $level->title }}</a></li>
    @endforeach

    </ul>
</li>


<li class="nav-item dropdown">
    <a class=" nav-link dropdown-toggle" href="#" data-toggle="dropdown" >  Services</a>
    <ul class="dropdown-menu">
	 @foreach($servicelevel1 as $key => $service)

        <li><a class="dropdown-item" href="{{ route('servicelevel1',$service->id) }}">{{ $service->title }}</a></li>
     @endforeach


    </ul>
</li>

<li class="nav-item"> <a class="nav-link" href="{{ route('showfuturelevel1') }}"> For Future </a> </li>








<li class="nav-item">
    <a class="nav-link" href="{{ route('showfleet') }}"> Fleet</a>
 </li>
<li class="nav-item dropdown">
    <a class=" nav-link dropdown-toggle" href="#" data-toggle="dropdown" >Vision</a>
    <ul class="dropdown-menu">
@foreach ($visions as $vision)
    @if ($vision->title === 'Core Value')
        <li><a class="dropdown-item" href="{{ route('showcorevalue') }}">{{ $vision->title }}</a></li>
    @else
        <li><a class="dropdown-item" href="{{ route('showvision', $vision->id) }}">{{ $vision->title }}</a></li>
    @endif
@endforeach


    </ul>
</li>

<li class="nav-item"> <a class="nav-link" href="{{ route('showgallery') }}"> Gallery </a></li>
<li class="nav-item"> <a class="nav-link" href="{{ route('shownews') }}"> News</a> </li>
<li class="nav-item"> <a class="nav-link" href="{{ route('showcareer') }}"> Career</a> </li>
<li class="nav-item"> <a class="nav-link" href="{{ route('showcontact') }}"> Contact us </a></li>
</ul>

</div> <!-- navbar-collapse.// -->
</nav>
