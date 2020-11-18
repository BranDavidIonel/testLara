@foreach ($conversation->replies as $reply)
    <div>
        <p class="m-0"><strong>{{$reply->user->name}} said...</strong></p>
        <div>
        @if($reply->isBest($conversation))
            <span style="color: green"> Best reply!</span>
        @endif
        </div>
        {{$reply->body}}
        
        @can('update',$conversation)
        <form method="POST" action="best-reply/{{$reply->id}}">
        @csrf
            <button type="submit" class="btn"> Best Reply? </button>

        </form>
        @endcan
    </div>

    @continue($loop->last)
    <hr>
@endforeach
