 <ul class="inner-sub-category">
@foreach($children as $child)
        <li>

    @if(count($child->children))
    <a href="#">{{ $child->name }} <i class="lni lni-chevron-right"></i></a>
        @include('layouts.subcategory',['children' => $child->children])
     @else

        <a href="#">{{ $child->name }} </a>

    @endif
</li>
@endforeach
 </ul>
