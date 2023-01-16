@extends('dashboard.master')
@section('title','Profile saya')
@section('content')

    <div class="page-title">

    </div>
    <section class="section">
        <div class="container">
            <div class="card">
                <div class="card-head mb-5"></div>
                <div class="card-body">
                    <form action="{{ route('my-profile.update',$me->id) }}" method="post">
                        @csrf
                        {{-- @method('put') --}}
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" value="{{ $me->name }}" class="form-control"id="">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" value="{{ $me->email }}"  class="form-control"id="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" id="myInput" value="{{ $me->password }}">
                                <input type="checkbox" onclick="myFunction()">Show Password
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('script')
    <script>
       function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
            x.type = "text";
            } else {
            x.type = "password";
            }
        }
    </script>
@endsection