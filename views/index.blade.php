<body>
<ol>
@foreach($roomArray as $room)
<li> <h1>{{$room->getName() }}</h1>
    <ul>
            @foreach($room as $key => $value)
                <li>
                    <strong>{{$key}}:</strong> {{$value}}
                </li>
            @endforeach
    </ul>
</li>
@endforeach
</ol>
</body>