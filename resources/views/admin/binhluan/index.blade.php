{{ $ten }}

@if( count($items) > 0 )
    @foreach( $items as $item )
        <li>{{ $item }}</li>
    @endforeach
@else

@endif

@forelse ($items as $item)
    <li>{{ $item }}</li>
@empty
    <p>No users</p>
@endforelse
