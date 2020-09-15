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
<div class="col-sm-6 offset-sm-3">
    <div class="card">
        <div class="card-body">
            <form
                method="post"
                action="{{ route('registerResults') }}"
                enctype="multipart/form-data"
            > @csrf
                <div class="form col-md-10 offset-sm-1">
                    <h1 class="text-center">Dalībnieku reģistrācija</h1><br>
                    <div class="form-row">
                        <div class="col col-md-6">
                            <div class="form-group ">
                                <label for="name">Vārds</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       id="name"
                                       required>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="surname">Uzvārds</label>
                                <input type="text"
                                       class="form-control"
                                       name="surname"
                                       id="surname"
                                       required>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="number">Starta Nr.</label>
                                <input type="text"
                                       class="form-control @error('number') is-invalid @enderror"
                                       name="number"
                                       id="number"
                                       required>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="age-group">Vecuma grupa</label>
                                <select id="age-group"
                                        class="form-control"
                                        name="age_group"
                                        required>
                                    <option>S 3</option>
                                    <option>V 3</option>
                                    <option>S 5</option>
                                    <option>V 5</option>
                                    <option>S 7</option>
                                    <option>V 7</option>
                                    <option>S 9</option>
                                    <option>S 9</option>
                                    <option>S 10</option>
                                    <option>V 10</option>
                                    <option>S 12</option>
                                    <option>V 12</option>
                                    <option>S 14</option>
                                    <option>V 14</option>
                                    <option>S 16</option>
                                    <option>V 16</option>
                                    <option>S 18</option>
                                    <option>V 18</option>
                                    <option>S 20</option>
                                    <option>V 20</option>
                                    <option>S 21</option>
                                    <option>V 21</option>
                                    <option>S 35</option>
                                    <option>V 35</option>
                                    <option>S 40</option>
                                    <option>V 40</option>
                                    <option>S 45</option>
                                    <option>V 45</option>
                                    <option>S 50</option>
                                    <option>V 50</option>
                                    <option>S 55</option>
                                    <option>V 55</option>
                                    <option>S 60</option>
                                    <option>V 60</option>
                                    <option>S 65</option>
                                    <option>V 65</option>
                                    <option>S 70</option>
                                    <option>V 70</option>
                                    <option>S 75</option>
                                    <option>V 75</option>
                                    <option>S 80</option>
                                    <option>V 80</option>
                                </select>
                            </div>

                        </div>

                        <div class="col col-md-5 offset-md-1">
                            <label>Laiks(sek)</label>
                            <div class="form-group">
                                <input type="text"
                                       class="form-control"
                                       placeholder="1.posms"
                                       name="level_1"
                                       required>
                            </div>
                            <div class="form-group">
                                <input type="text"
                                       class="form-control"
                                       placeholder="2.posms"
                                       name="level_2"
                                       required>
                            </div>
                            <div class="form-group">
                                <input type="text"
                                       class="form-control"
                                       placeholder="3.posms"
                                       name="level_3"
                                       required>
                            </div>
                            <div class="form-group">
                                <input type="text"
                                       class="form-control"
                                       placeholder="4.posms"
                                       name="level_4"
                                       required>
                            </div>

                            <div class="form-group">
                                <input type="text"
                                       class="form-control"
                                       placeholder="5.posms"
                                       name="level_5"
                                       required>
                            </div>
                            <div class="form-group">
                                <input type="text"
                                       class="form-control"
                                       placeholder="6.posms"
                                       name="level_6"
                                       required>
                            </div>
                            <div class="form-group">
                                <input type="text"
                                       class="form-control"
                                       placeholder="7.posms"
                                       name="level_7"
                                       required>
                            </div>
                            <div class="form-group">
                                <input type="text"
                                       class="form-control"
                                       placeholder="8.posms"
                                       name="level_8"
                                       required>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                @error('number')
                <div class="alert alert-danger">{{ 'Šāds starta numurs jau ir aizņemts!' }}</div>
                @enderror

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Reģistrēt</button>
                </div>
            </form>
        </div>
    </div>
</div>
<br>
<div class="col-sm-6 offset-sm-3">
    <div class="card">
        <div class="card-body text-center">
            <h1>Rezultāti</h1> <br>
            @for ($i = 1; $i <= 8; $i++)
                <a href='/{{ $i }}'>{{ $i }}.posms | </a>
            @endfor
            <a href='{{ route('overall') }}'>Kopvērtējums</a>
        </div>
    </div>
</div>

</body>
</html>
