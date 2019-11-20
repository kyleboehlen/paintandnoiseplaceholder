@extends('layouts.base')

@section('body')
    <body>
        {{-- Main logo --}}
        <img src="{{ route('logo') }}" id="main-logo" />

        {{-- Title --}}
        <h1>{{ env('APP_NAME', 'P&N') }}</h1>

        {{-- Description --}}
        <h2>Our Mission</h2><hr>

        <p>
            @foreach(explode('.', App\Http\Helpers\Splash::DESCRIPTION) as $line)
                {{ $line }}<br/>
            @endforeach
        </p>

        {{-- Social section --}}
        <h2>Follow Us</h2><hr>

        <div class="figure-container">
            {{-- Iterate through social class accounts property --}}
            @foreach(App\Http\Helpers\Social::ACCOUNTS as $account)
                <figure>
                    <a href="{{ $account['url'] . $account['username'] }}" target="_blank">
                        <img src="{{ route('social', ['icon' => $account['icon']]) }}"/>
                        <figcaption>{{ $account['service'] }}</figcaption>
                    </a>
                </figure>
            @endforeach
        </div>

        {{-- Team section --}}
        <h2>Our Team</h2><hr>

        <div class="figure-container">
            {{-- Iterate through team class members property --}}
            @foreach(App\Http\Helpers\Team::MEMBERS as $team_member)
                <figure>
                    <img src="{{ route('team', ['name' => $team_member['name']]) }}"/>
                    <figcaption>{{ $team_member['full_name'] }}</figcaption>
                </figure>
            @endforeach
        </div>

        <footer>
            {{-- copyright --}}
            <p class="copyright">&copy; {{ env('APP_NAME', 'P&N') }}</p>
        </footer>
    </body>
@endsection