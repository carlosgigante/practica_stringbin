@extends('layouts.app')

@section('template_title')
    Update Cuentabanco
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Cuentabanco</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('cuentas.update', $cuentabanco->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('cuentabanco.form-edit')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
