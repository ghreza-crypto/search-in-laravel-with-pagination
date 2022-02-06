<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Search with pagination</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-3.1.1/css/bootstrap.min.css')}}">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6" style="margin-top:40px">
            <h4>Search Everything</h4>
            <hr>
            <form action="{{ route('country.find') }}" method="GET">

                <div class="form-group">
                    <label for="">Enter keyword</label>
                    <input type="text" class="form-control" name="search" placeholder="Search here....."
                           value="{{ request()->input('search') }}">
                    <span class="text-danger">@error('search'){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
            <br>
            <br>
            <hr>
            <br>
            @if(isset($countries))

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Independence Year</th>
                        <th>Continent</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($countries) > 0)
                        @foreach($countries as $country)
                            <tr>
                                <td>{{ $country->Name }}</td>
                                <td>{{ $country->IndepYear }}</td>
                                <td>{{ $country->Continent }}</td>
                            </tr>
                        @endforeach
                    @else

                        <tr>
                            <td>No result found!</td>
                        </tr>
                    @endif
                    </tbody>
                </table>


                {{$countries->links('layouts.paginationLinks')}}

            @endif
        </div>
    </div>
</div>
</body>
</html>
