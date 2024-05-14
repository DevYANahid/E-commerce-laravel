
<div class="nav-responsive">
    <ul class="nav  main-navigation collapse in ">
        @foreach($subCategorise as $subCategory)
            <li><a href="{{ route('client.subCategory',$subCategory->sub_category_slag) }}">{{ $subCategory->name }}</a></li>
        @endforeach
    </ul>
</div>

