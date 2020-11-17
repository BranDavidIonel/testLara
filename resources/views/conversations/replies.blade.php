@foreach ($conversation->replies as $reply)
    <div>
        <p class="m-0"><strong>{{$reply->user->name}} said...</strong></p>

        {{$reply->body}}
        @can('update-conversation',$conversation)
        <form method="POST" action="{{route('best-reply.update',[ 'id'=>$reply->id ]}}">
            <button type="submit" class="btn"> Best Reply? </button>

        </form>
        @endcan
    </div>

    @continue($loop->last)
    <hr>
@endforeach
