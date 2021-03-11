
<div class="breadcrumbs">
    <div class="breadcrumbs__wrapper">
        @foreach($response['data']['content']['breadcrumbs'] as $item)
            <a href="{{ $item['link'] }}" class="breadcrumbs__item {{ $loop->last ? 'active' : '' }}">{{ $item['name'] }}</a>

            @if (!$loop->last)
                <p class="breadcrumbs__separator">/</p>
            @endif
        @endforeach
    </div>
    
</div>