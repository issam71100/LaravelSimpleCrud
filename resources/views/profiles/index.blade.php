@extends('layout')

@section('content')
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div><br/>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <td>ID</td>
            <td>Nom</td>
            <td>Prenom</td>
            <td>Image</td>
            <td>Description</td>
            <td colspan="2">Action</td>
        </tr>
        </thead>
        <tbody>
        @foreach($profiles as $profile)
            <tr>
                <td>{{$profile->id}}</td>
                <td>{{$profile->first_name}}</td>
                <td>{{$profile->last_name}}</td>
                <td><img width="100px" src="{{$profile->image}}"></td>
                <td>{{$profile->description}}</td>
                <td><a href="{{ route('profile.edit',$profile->id)}}" class="btn btn-primary">Modifier</a></td>
                <td>
                    <form action="{{ route('profile.destroy', $profile->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection