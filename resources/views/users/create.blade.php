@extends('layouts.app')


@section('content')

<style>
div.form {
    border: solid 1px #3aafed;
    padding: 3%;
}

</style>

<form action="/users/create" method="post">
    @csrf
    <div class="form">
        <label for="">Name</label>
        <input type="text" name="name">
        <br>
        <label for="">Email</label>
        <input type="text" name="email">
        <br>
        <label for="">Password</label>
        <input type="password" name="password">
        <br>
        <input type="submit" value="Salvar">    
    </div>
</form>

@endsection