<div>
    <div class="search-input">
        <input class="form-control" name="search" type="text" placeholder="Search" aria-label="Search" wire:model="query" style="position:relative;">
    </div>

    @if(!empty($query))
        <div class="search-box">
            @if(!empty($posts))
                @foreach($posts as $post)
                    <ul class="list-group">
                        <li style="position: absolute;" class="list-group-item"><a href="{{ route('show.single', $post['slug']) }}">{{ $post['title'] }}</a></li>
                    </ul>

                @endforeach
            @else
                <div class="list-group-item">No results</div>
            @endif
        </div>
    @endif
</div>
