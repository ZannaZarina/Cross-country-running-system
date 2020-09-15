<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<body>
<br>
<div class="col-md-8 offset-md-2">
    <div class="card">
        <div class="card-body text-center">
            <h1>Rezultāti</h1> <br>
            @for ($i = 1; $i <= 8; $i++)
                <a href='/{{ $i }}'>{{ $i }}.posms </a> |
            @endfor
            <a href='{{ route('overall') }}'>Kopvērtējums</a>
        </div>
    </div>
</div>
<br>
@if($isNumeric)
    @foreach($levels as $level)
        <h1 class="text-center"><b> {{ $level[0]->level }}. posma rezultāti </b></h1> <br>
        @break
    @endforeach
    <div class="col-md-8 offset-md-2">
        @foreach($levels as $age_group => $level)
            <h4><b>{{ $age_group }}</b></h4>
            <table class="table table-borderless text-center">
                <thead>
                <tr>
                    <th scope="col">Vieta</th>
                    <th scope="col">Nr</th>
                    <th scope="col">Vārds Uzvārds</th>
                    <th scope="col">Laiks(sek)</th>
                    <th scope="col">Punkti</th>
                </tr>
                </thead>
                <tbody>
                @foreach($level as $key => $runner)
                    <tr>
                        <th scope="row"> {{ $key+1 }} </th>
                        <td> {{ $runner->number }} </td>
                        <td> {{ $runner->name }} {{ $runner->surname }}</td>
                        <td> {{ $runner->time }} </td>
                        <td> {{ $runner->level_points }} </td>
                    </tr>
                @endforeach
                </tbody>
            </table> <br>
        @endforeach
    </div>
@else
    <h1 class="text-center"><b> Kopvērtējums </b></h1> <br>
    <div class="col-md-8 offset-md-2">
        @foreach($levels as $age_group => $level)
            <h4><b> {{ $age_group }} </b></h4>
            <table class="table table-borderless text-center">
                <thead>
                <tr>
                    <th scope="col">Vieta</th>
                    <th scope="col">Nr</th>
                    <th scope="col">Vārds Uzvārds</th>
                    <th scope="col">Sum</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">TOP5</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($level as $position => $results)
                    <tr>
                        <th scope="row">  {{ $position+1 }} </th>
                        @foreach($results as $result)
                            <td> {{ $result->number }} </td>
                            <td> {{ $result->name }} {{ $result->surname }} </td>
                            <td> {{ $result->points }} </td>

                            @break @endforeach
                        @foreach($results as $result)
                            <td> {{ $result->level_points }} </td> @endforeach
                    </tr>
                @endforeach
                </tbody>
            </table> <br>
        @endforeach
    </div>
@endif

<div class="col-md-8 offset-md-2">
    <div class="card">
        <div class="card-body text-center">
            <h3>Reģistrēt dalībnieku <a href='{{ route('welcome') }}'>šeit</a></h3>
        </div>
    </div>
</div>
<br>

</body>
</html>
