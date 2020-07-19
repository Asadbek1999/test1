@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-body" >
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable"  >
                                <thead>
                                <tr>
                                    <th>{{__('id')}}</th>
                                    <th>{{ __('numCode') }}</th>
                                    <th>{{ __('charCode') }}</th>
                                    <th>{{ __('name') }}</th>
                                    <th>{{ __('value') }}</th>
                                    <th>{{ __('date') }}</th>
                                </tr>

                                </thead>
                                <tfoot>
                                <tr>
                                    <th>{{__('id')}}</th>
                                    <th>{{ __('numCode') }}</th>
                                    <th>{{ __('charCode') }}</th>
                                    <th>{{ __('name') }}</th>
                                    <th>{{ __('value') }}</th>
                                    <th>{{ __('date') }}</th>
                                </tr>
                                </tfoot>
                                <tbody>

                                @foreach($currency as $p)
                                    <tr>
                                        <td>{{$p->valuteID}}</td>
                                        <td>{{$p->numCode}}</td>
                                        <td>{{$p->charCode}}</td>
                                        <td>{{$p->name}}</td>
                                        <td>{{$p->value}}</td>
                                        <td>{{explode(" ",(string)$p->date )[0]}}</td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                           <div class="text-center">


                                     {{$currency->links()}}


                           </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
