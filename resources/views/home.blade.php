@extends('layout')

@section('stylesheet')
    <link href="{{ asset('css/front/home.css') }}" rel="stylesheet" type="text/css"/>
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

                        <div class="profile-name btn " data-id="{{$profile->id}}">
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
                    <div class=" profile-name mobile btn " data-id="{{$profile->id}}">
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
        /*Implementation of Array.from for IE */
        if (!Array.from) {
            Array.from = (function () {
                var toStr = Object.prototype.toString;
                var isCallable = function (fn) {
                    return typeof fn === 'function' || toStr.call(fn) === '[object Function]';
                };
                var toInteger = function (value) {
                    var number = Number(value);
                    if (isNaN(number)) {
                        return 0;
                    }
                    if (number === 0 || !isFinite(number)) {
                        return number;
                    }
                    return (number > 0 ? 1 : -1) * Math.floor(Math.abs(number));
                };
                var maxSafeInteger = Math.pow(2, 53) - 1;
                var toLength = function (value) {
                    var len = toInteger(value);
                    return Math.min(Math.max(len, 0), maxSafeInteger);
                };

                // The length property of the from method is 1.
                return function from(arrayLike/*, mapFn, thisArg */) {
                    // 1. Let C be the this value.
                    var C = this;

                    // 2. Let items be ToObject(arrayLike).
                    var items = Object(arrayLike);

                    // 3. ReturnIfAbrupt(items).
                    if (arrayLike == null) {
                        throw new TypeError("Array.from requires an array-like object - not null or undefined");
                    }

                    // 4. If mapfn is undefined, then let mapping be false.
                    var mapFn = arguments.length > 1 ? arguments[1] : void undefined;
                    var T;
                    if (typeof mapFn !== 'undefined') {
                        // 5. else
                        // 5. a If IsCallable(mapfn) is false, throw a TypeError exception.
                        if (!isCallable(mapFn)) {
                            throw new TypeError('Array.from: when provided, the second argument must be a function');
                        }

                        // 5. b. If thisArg was supplied, let T be thisArg; else let T be undefined.
                        if (arguments.length > 2) {
                            T = arguments[2];
                        }
                    }

                    // 10. Let lenValue be Get(items, "length").
                    // 11. Let len be ToLength(lenValue).
                    var len = toLength(items.length);

                    // 13. If IsConstructor(C) is true, then
                    // 13. a. Let A be the result of calling the [[Construct]] internal method of C with an argument list containing the single item len.
                    // 14. a. Else, Let A be ArrayCreate(len).
                    var A = isCallable(C) ? Object(new C(len)) : new Array(len);

                    // 16. Let k be 0.
                    var k = 0;
                    // 17. Repeat, while k < len… (also steps a - h)
                    var kValue;
                    while (k < len) {
                        kValue = items[k];
                        if (mapFn) {
                            A[k] = typeof T === 'undefined' ? mapFn(kValue, k) : mapFn.call(T, kValue, k);
                        } else {
                            A[k] = kValue;
                        }
                        k += 1;
                    }
                    // 18. Let putStatus be Put(A, "length", len, true).
                    A.length = len;
                    // 20. Return A.
                    return A;
                };
            }());
        }
    </script>
    <script type="text/javascript">
        let profiles_name = document.querySelectorAll('.profile-name');
        Array.from(profiles_name).forEach(function (el) {
            el.addEventListener('click', function (e) {
                console.log(this);
                let id = this.getAttribute('data-id');
                let info = document.querySelector('.profile[data-id="' + id + '"]');

                let previous = document.querySelector('.show');
                if (previous != null) previous.classList.remove('show');

                info.classList.add('show');
            })
        })
    </script>

@endsection