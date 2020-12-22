@extends('layouts.App')
@section('bootstrap')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
@endsection
@section('style')
    <style>
@import url('https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins&display=swap');

        * {
    padding: 0;
    margin: 0;
    box-sizing: border-box
        }

        body {
    background-color: #eee;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to top, #fff 10%, rgba(93, 42, 141, 0.4) 90%) no-repeat
        }

        .wrapper {
    max-width: 550px;
            border-radius: 10px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 20px 20px 80px rgb(206, 206, 206)
        }

        .h2 {
    font-family: 'Kaushan Script', cursive;
            font-size: 3.0rem;
            font-weight: bold;
            color: #7b2ee8;
            text-shadow: 0 0 2px #a069ee;
            font-style: italic
        }

        .h5 {
    color: #555;
    margin: 0
        }

        .form-control {
    border: 1.5px solid #7b2ee8
        }

        .form-control:focus {
    box-shadow: none
        }

        .mandatory::after {
    content: "*";
    color: #ff0000
}

        .button-section .btn {
    background-color: #fff;
            border-radius: 20px;
            border: 1.5px solid #7b2ee8;
            padding: 5px 15px
        }

        .button-section .btn.btn-primary {
    background-color: #7b2ee8;
            color: #eee
        }

        .button-section .btn:hover {
    background-color: #7b2ee8;
            color: #eee
        }

        .remember {
    border: 1px solid #7b2ee8
        }

        .gender-l {
    margin: 0
        }

        #male {
            display: none
        }

        input[type="radio"] {
    visibility: hidden
        }

        input[type='radio']:checked {
    background-color: #7b2ee8
        }

        .btn.btn-primary {
    background-color: #fff;
            color: #555;
            border: 1px solid #7b2ee8;
            width: 115px
        }

        .btn.btn-primary:hover {
    background-color: #a069ee;
            color: #fff
        }

        .btn-primary:not(:disabled):not(.disabled).active,
        .btn-primary:not(:disabled):not(.disabled):active {
    background-color: #7b2ee8
        }

        @media(max-width: 575px) {
    .btn-group {
        width: 100%
            }

            .btn-group>.btn {
        flex: 50%
            }

            .wrapper {
        margin: 10px
            }

            .h5 {
        padding-top: 10px
            }
        }

    </style>
@endsection
<title>
    @section('title')
        Create users
    @endsection
</title>
@section('main')
<div class="wrapper bg-white">
    <div class="h2 text-center">Coding </div>
    <div class="h2 text-center">Academy</div>
    <div class="h5 font-weight-bold">Registration</div>
    <div class="text-muted">Enter your registration details</div>
    <form method="post" action="/users">
@CSRF
{{--        d-sm-flex--}}
<div class=" align-items-sm-center justify-content-sm-between pt-1">
{{--    <div class="form-group"> <label class="text-muted mandatory">full Name</label> <input type="text" name="name"  class="form-control"> </div>--}}
    <div class="form-group"> <label class="text-muted mandatory">Email Address</label> <input  name="email"  class="form-control">@error("email")
        <p style="color:red;font-size: 1rem ;">{{$message}}</p>
        @enderror </div>

</div>

<div class="d-sm-flex align-items-sm-center justify-content-sm-between pt-1">
    <div class="form-group"> <label class="text-muted mandatory">Phone Number</label> <input type="tel" name="mobile" class="form-control">  @error("mobile")
        <p style="color:red;font-size: 1rem ;">{{$message}}</p>
        @enderror</div>
    <div class="form-group"> <label class="text-muted">Username</label> <input type="text" name="fname" class="form-control">@error("fname")
        <p style="color:red;font-size: 1rem ;">{{$message}}</p>
        @enderror </div>
</div>


<div class="form-group"> <label class="text-muted mandatory">Password</label> <input name="password" type="password"  class="form-control">@error("password")
    <p style="color:red;font-size: 1rem ;">{{$message}}</p>
    @enderror </div>


<div class="d-flex align-items-center justify-content-sm-end button-section"> <button class="btn btn-primary mx-4" type="submit" name="submit">Submit</button> <button class="btn">Cancel</button> </div>

</form>
</div>


<div class="container">
<div class="table-responsive">
    <table id="mytable" class="table table-bordred table-striped">
        <thead>
        <th>userId</th>
        <th>Email</th>
        <th>Password</th>
        <th>Mobile</th>
        <th>FullName</th>
        <th>Created at</th>
        <th>Edit</th>
        <th>Delete</th>
        </thead>
        <tbody>
        @foreach($rows as $row)
        <tr>
            <td>{{$row->userid}}</td>
            <td>{{$row->email}}</td>
            <td>{{$row->password}}</td>
            <td>{{$row->mobile}}</td>
            <td>{{$row->fname}}</td>
            <td>{{$row->created_at}}</td>
            <td> <a href="users/{{$row->userid}}/edit">
                <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p>
                </a></td>

            <form method="post" action="/users/{{$row->userid}}">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
            <td>
                    <p data-placement="top" data-toggle="tooltip" title="Delete">
                        <button class="btn btn-danger btn-xs" value="DELETE" data-title="Delete" data-toggle="modal" data-target="#delete" >
                            <span class="glyphicon glyphicon-trash"></span></button></p></td>
            </form>
        </tr>
        @endforeach
        </tbody>

    </table>
</div>
</div>

@endsection



