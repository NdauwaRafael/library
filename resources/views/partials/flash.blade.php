@if(count((array) session('flash_notification')) > 0)
    @foreach ((array) session('flash_notification') as $message)
        <div>
            <flash-message :message="'{{$message[0]->message}}'" :level="'{{$message[0]->level}}'" ></flash-message>
        </div>
    @endforeach
@endif
