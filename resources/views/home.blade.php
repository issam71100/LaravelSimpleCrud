@extends('layout')

@section('stylesheet')
    <link href="{{ asset('css/front/home.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('body_id','home')

@section('content')
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div><br/>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="profiles-name">
                    @foreach($profiles as $profile)
                        @php
                            $fullName = $profile->first_name . ' ' . $profile->last_name;
                        @endphp

                        <div class="profile-name btn btn-light" data-id="{{$profile->id}}">
                            {{ $fullName }}
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-8 col-12">
                @foreach($profiles as $profile)
                    @php
                        $fullName = $profile->first_name . ' ' . $profile->last_name;
                    @endphp
                    <div class=" profile-name mobile btn btn-light" data-id="{{$profile->id}}">
                        {{ $fullName }}
                    </div>
                    <div class="profile" data-id="{{$profile->id}}">
                        <div class="profile-img">
                            <img class="img-fluid" src="{{$profile->image}}">
                        </div>

                        <h2 class="profile-title">{{ $fullName }}</h2>

                        <div class="profile-description">
                            {{$profile->description}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        let profiles_name = document.querySelectorAll('.profile-name');
        Array.from(profiles_name).forEach(function (el) {
            el.addEventListener('click',function (e) {
                console.log(this);
                let id = this.getAttribute('data-id');
                let info = document.querySelector('.profile[data-id="'+id+'"]');

                let previous = document.querySelector('.show');
                if(previous != null) previous.classList.remove('show');

                info.classList.add('show');
            })
        })
    </script>

@endsection