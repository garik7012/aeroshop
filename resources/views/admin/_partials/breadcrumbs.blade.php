@if(!empty($breadcrumbs))
<ol class="breadcrumb">
    @foreach($breadcrumbs as $page)
    @if(isset($page['active']) && $page['active'])
        <li class="active">{{ $page['name'] or ''}}</li>
    @else
        <li>
            <a href="{{ $page['url'] or '' }}">{{ $page['name'] or ''}}</a>
        </li>
    @endif
    @endforeach
</ol>
@endif