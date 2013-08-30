@extends('layouts.no_vertical_fill')

@include('elements.sidebar')
@include('elements.footer')

@section('body')
    <div class="index wrap">
        <!-- header block -->
        <div class="header">
            <!-- header elem -->
            <div class="header-title">
                <p class="header-title-text">{{ $Resources }}</p>
            </div>
            <!-- header elem -->
            <div class="header-sub">
                <p class="header-sub-text"></p>
            </div>
        </div>
        <!-- nav block -->
        <div class="nav">
            <div class="nav-return">
                <p class="nav-return-text">Return to <a href="{{ $url['home'] }}">Home</a></p>
            </div>
        </div>
        <!-- resource block -->
        <ul class="rsrc">
            @foreach ($resources as $resource)
            <!-- resource elem -->
            <li class="rsrc-elem rsrc-inst">
                <div class="rsrc-elem-checkbox">
                    <i class="icon icon-circle-blank"></i>
                </div>
                <a href="{{ $url['index'].'/'.$resource['id'] }}">
                    <div class="rsrc-inst-name">
                        <p class="rsrc-inst-name-text">{{ $resource['name'] }}</p>
                    </div>
                    <div class="rsrc-inst-info">
                        <p class="rsrc-inst-info-text">{{ $resource['info']}}</p>
                    </div>
                </a>
            </li>
            @endforeach
        </ul>
    </div>

    @yield('sidebar')
    @yield('footer')

@stop

@section('scripts')
    <script>
        $('.rsrc-elem-checkbox').on('click', function(event) {
            console.log('registering');
            event.preventDefault();
            $(this).children().toggleClass('icon-circle-blank icon-ok');
        });
    </script>
@stop
