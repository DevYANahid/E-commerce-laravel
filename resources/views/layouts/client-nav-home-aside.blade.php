
<div class="nav-responsive">
    <ul class="nav  main-navigation collapse in ">
        @foreach($categories as $category)
            <li><a href="{{ route('client.category',$category->category_slag) }}">{{ $category->category_name }}</a></li>
        @endforeach
    </ul>
</div>

