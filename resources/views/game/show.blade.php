@extends('layouts.app')

@push('styles')
    <style>
         @keyframes rotate {
            from {
                transform: : rotate(0deg);
            } to {
                transform: rotate(360deg);
            }
         }

         .refresh {
             animation: rotate 1.5s linear infinite;
         }
    </style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-body text-center">
                        <img 
                            {{-- class="refresh" --}}
                            id="circle"
                            src="{{asset('img/circle.png')}}" 
                            height="250"
                            width="250"
                        > <br><br>
                        <p id="winner" class="dispaly-1 d-none text-primary"></p>
                        <div class="text-center">
                            <label class="font-wigth-bold h5"></label>
                            <select name="" id="" class="custom-select col-auto">
                                <option selected value="">Not in</option>
                                @foreach (range(1, 12) as $number)
                                    <option value="">{{$number}}</option>                                    
                                @endforeach
                            </select>
                            <hr>
                            <p class="font-weight-bold h5">Ramaining Time</p>
                            <p id="time" class="h5 text-danger">Waiting to start</p>
                            <hr>
                            <p id="result" class="h1"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>

    </script>
@endpush
