@extends('layouts.master')

@include('elements.sidebar')
@include('elements.footer')

@section('body')
    <div class="vert-outer-wrap vert-stretch">
        <div class="vert-inner-wrap">
            <!-- resource block -->
            <ul class="rsrc">
                @foreach ($resources as $resource)
                <!-- resource elem -->
                <li class="rsrc-elem rsrc-type">
                    <div class="rsrc-type-name">
                        <p class="rsrc-type-name-text">{{ $resource['name'] }}</p>
                    </div>
                    <!-- resource commands block -->
                    <div class="rsrc-type-cmds">
                        <!-- resource commands elem -->
                        <div class="rsrc-type-cmds-btn btn btn-cmd btn-link btn-active">
                            <a class="rsrc-type-cmds-btn-link-text" href="{{ $resource['url']['index'] }}">
                                <div class="vert-outer-wrap vert-stretch">
                                    <div class="vert-inner-wrap">
                                        <i class="icon icon-list"></i>
                                    </div>
                                </div>
                            </a>                           
                        </div>
                        <!-- resource commands elem -->
                        <div class="rsrc-type-cmds-btn btn btn-cmd btn-link btn-active">
                            <a class="rsrc-type-cmds-btn-link-text" href="{{ $resource['url']['search'] }}">
                                <div class="vert-outer-wrap vert-stretch">
                                    <div class="vert-inner-wrap">
                                        <i class="icon icon-search"></i>
                                    </div>
                                </div>
                            </a>                          
                        </div>
                        <!-- resource commands elem -->
                        <div class="rsrc-type-cmds-btn btn btn-cmd btn-link btn-active">
                            <a class="rsrc-type-cmds-btn-link-text" href="{{ $resource['url']['create'] }}">
                                <div class="vert-outer-wrap vert-stretch">
                                    <div class="vert-inner-wrap">
                                        <i class="icon icon-file-alt"></i>
                                    </div>
                                </div>
                            </a>                          
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    @yield('footer')
    @yield('sidebar')

@stop
