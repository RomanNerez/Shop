<div class="bread-crumbs">
    @foreach($response['data']['content']['breadcrumbs'] as $item)
        <a href="{{ $item['link'] }}" class="bread-crumbs__text {{ $loop->last ? 'active' : '' }}">{{ $item['name'] }}</a>

        @if (!$loop->last)
            <p class="bread-crumbs__separator">/</p>
        @endif
    @endforeach
</div>
