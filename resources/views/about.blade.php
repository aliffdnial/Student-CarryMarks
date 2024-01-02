@extends('layouts.mytemplate2')

@section('pagetitle')
About
@endsection

@section('content')
<br>
<h2>About</h2>

<form action="" method="post">
<div class="row">
    <div class="col-md-12">
        <label for="Name">Name</label>
        <input type="text" name="" id="" class="form-control">
    </div>
    
    <div class="col-md-12">
        <label for="B">B</label>
        <input type="text" name="" id="" class="form-control">
    </div>

    <div class="col-md-12">
        <label for="date">Date</label>
        <input type="date" name="" id="" class="form-control">
    </div>

    <div class="col-md-12">
       <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection