
<html >
<head>
  
    <title>dice roll simulation</title>
</head>
<body>
    <h1>dice roll simulation</h1>

    @if (isset($rolls) && isset($spentTime))
        <p><strong>Total Rolls:</strong> {{ $rolls }}</p>
        <p><strong>Total Time Spent:</strong> {{ number_format($spentTime, 4) }} seconds</p>
        
        <h3>Roll History:</h3>
        <table border="1">
            <thead>
                <tr>
                    <th> No</th>
                    <th>Dice 1</th>
                    <th>Dice 2</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rollHistory as $history)
                    <tr>
                        <td>{{ $history['roll'] }}</td>
                        <td>{{ $history['dice1'] }}</td>
                        <td>{{ $history['dice2'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
   
      
    @endif

    <p><a href="{{ route('dice.roll') }}">Roll Again</a></p>
</body>
</html>
