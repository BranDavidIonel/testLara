@extends('layout.header')
@section('content')
    <div class="container">
    <ul>
    show all notifacations for the article
    @forelse($notifications as $notification )
        <li>
        @if ($notification->type == "App\Notifications\PaymentReceived")
            We have received a payment of {{$notification->data["amount"]}} from you.
        @endif
        <br> 
        -{{$notification->read_at}}
        <br>
        -{{$notification->created_at}}
        </li>
    @empty
        <li>You have no unread notifications at this time. </li>
    @endforelse
    </ul>
    </div>
@endsection