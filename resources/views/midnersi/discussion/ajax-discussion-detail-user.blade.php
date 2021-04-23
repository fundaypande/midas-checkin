<div>
    <div class="row">
        <div id="messages">
            @foreach ($data as $item)
                @if ($item->is_user == null)
                    <div class="msg-left">
                        {{ $item->chat }}
                        <p class="created">{{ $item->created_at }}</p>
                    </div>

                @else
                    <div class="msg-right">
                        {{ $item->chat }}
                        <p class="created">{{ $item->created_at }}</p>
                    </div>
                @endif
            @endforeach

        </div>

    </div>
</div>
