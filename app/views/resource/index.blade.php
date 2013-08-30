@extends('layouts.no_vertical_fill')

@include('elements.sidebar')
@include('elements.footer')

@section('body')
    <div class="wrap">
        <!-- header block -->
        <div class="header">
            <!-- header elem -->
            <div class="header-title">
                <p class="header-title-text">{{ $Resources }}</p>
            </div>
            <!-- header elem -->
            <div class="header-sub">
                <p class="header-sub-text">last modified: none</p>
            </div>
        </div>
        <!-- search block -->
        <div class="search">
            <div class="search-input input">
                <i class='search-input-icon input-icon icon icon-search'></i>
                {{ Form::text('search', '', ['class' => 'search-input-field input-field input-has-icon']) }}
                {{ Form::label('search', 'Search', ['class' => 'search-input-lbl input-lbl input-has-icon lbl visible']) }}
            </div>
            <div class="search-results invisible">
                <div class="search-results-number">
                    <p class="search-results-number-text"></p>
                </div>
                <ul class="search-results-rsrc rsrc">
                </ul>
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
