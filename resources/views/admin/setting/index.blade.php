@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Settings</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>All Settings</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-2">
                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#general-setting"
                                    role="tab" aria-controls="home" aria-selected="true">General Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="home-tab4" data-toggle="tab" href="#logo-setting" role="tab"
                                    aria-controls="home" aria-selected="true">Logo Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="home-tab4" data-toggle="tab" href="#appearance-setting"
                                    role="tab" aria-controls="home" aria-selected="true">Appearance Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#pusher-setting"
                                    role="tab" aria-controls="profile" aria-selected="false">Pusher Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="" data-toggle="tab" href="#mail-setting" role="tab"
                                    aria-controls="contact" aria-selected="false">Mail Settings</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="" data-toggle="tab" href="#seo-setting" role="tab"
                                    aria-controls="contact" aria-selected="false">Seo Settings</a>
                            </li> 
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-10">
                        <div class="tab-content no-padding" id="myTab2Content">
                            <div class="tab-pane fade show active" id="general-setting" role="tabpanel"
                                aria-labelledby="home-tab4">
                                <div class="card">
                                    <div class="card-body border">
                                        <form action="{{ route('admin.general-setting.update') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="">Site Name</label>
                                                <input name="site_name" type="text" class="form-control" value="{{config('settings.site_name')}}">
                                            </div>
                                            {{-- <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Site Email</label>
                                                        <input name="site_email" type="text" class="form-control" value="{{config('settings.site_email')}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Site Phone</label>
                                                        <input name="site_phone" type="text" class="form-control" value="{{config('settings.site_phone')}}">
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="form-group">
                                                <label for="">Default Currency</label>
                                                <select name="site_default_currency" id="" class="select2 form-control">
                                                    <option value="">Select</option>
                                                    @foreach (config('currencys.currency_list') as $currency)
                                                    <option @selected(config('settings.site_default_currency') === $currency) value="{{ $currency }}">{{ $currency }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Currency Icon</label>
                                                        <input name="site_currency_icon" type="text" class="form-control" value="{{ config('settings.site_currency_icon') }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Currency Icon Position</label>
                                                        <select name="site_currency_icon_position" id="" class="select2 form-control">
                                                            <option @selected(config('settings.site_currency_icon_position') === 'right') value="right">Right</option>
                                                            <option @selected(config('settings.site_currency_icon_position') === 'left') value="left">Left</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
