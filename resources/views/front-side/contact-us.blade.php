@extends('layouts.main')

@section('breadcrumbs')
    <div class="col-xs-12">
        <div id="navBreadCrumb" class="breadcrumb"><a class="home" href="{{route('index')}}"></a>
            <span> @lang('g.contacts')</span>
        </div>
    </div>
@endsection

@section('content')
<div class="centerColumn" id="contactUsDefault">
    <form role="form" name="contact_us" action="{{route('contact-us')}}" method="post">
        @csrf
        <h1 class="centerBoxHeading">@lang('Contact Us')</h1>
        <div class="tie text2">
            <div class="tie-indent">
                <div class="form-control-block">
                    <address>Украина, Киев,<br>
                        б-р Верховного Совета, 34
                    </address>
                    <div id="contactUsNoticeContent" class="content">
                        <p><strong>@lang('Contact Us')</strong></p>
                        </div>
                    <div class="contact_fields_wrapper clearfix">
                        <div class="row">
                            <div class="contacts_left_fields col-xs-12 col-sm-5">
                                <div class="form-group contact-group {{$errors->has('name') ? ' has-error' : ''}}">
                                    <label for="contactname">@lang('site.contact.name'):</label>
                                    <input type="text" name="name" size="40" id="contactname" class="form-control" value="{{old('name')}}">
                                    @if ($errors->has('name')) <span class="help-block text-danger"><strong>{{ $errors->first('name') }}</strong></span>@endif
                                </div>
                                <div class="form-group contact-group {{$errors->has('email') ? ' has-error' : ''}}">
                                    <label for="email-address">Email:</label>
                                    <input type="text" name="email" size="40" id="email-address" class="form-control"  value="{{old('email')}}">
                                    @if ($errors->has('email')) <span class="help-block text-danger"><strong>{{ $errors->first('email') }}</strong></span>@endif
                                </div>
                            </div>
                            <div class="form-group contact-group-area col-xs-12 col-sm-7 {{$errors->has('message') ? ' has-error' : ''}}">
                                <label for="enquiry">@lang('site.contact.message'):</label>
                                <textarea name="message" cols="20" rows="7" id="enquiry" class="form-control">{{old('message')}}"</textarea>
                                @if ($errors->has('message')) <span class="help-block text-danger"><strong>{{ $errors->first('message') }}</strong></span>@endif
                            </div>
                        </div>
                    </div>
                    <br>
                    <div>
                        <input type="submit" class="btn btn-success add-to-cart" value="@lang('site.contact.send')">
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </form>
    <h3>@lang('site.contact.schedule')</h3>
    <table class="table table-striped table-bordered">
        <tbody>
        <tr>
            <th>День</th>
            <th>Время работы</th>
        </tr>
        <tr>
            <td>Понедельник - Пятница</td>
            <td>
                09:00&nbsp;—&nbsp;18:00
            </td>
        </tr>
        <tr>
            <td>Суббота</td>
            <td>
                10:00&nbsp;—&nbsp;17:00
            </td>
        </tr>
        <tr>
            <td>Воскресенье</td>
            <td>
                Выходной
            </td>
        </tr>
        </tbody>
    </table>
    {!! $page->lang->description !!}

    <a href="{{route('index')}}"><span class="cssButton normal_button button  button_back pull-left"
                                       onmouseover="this.className='cssButtonHover normal_button button  button_back button_backHover'"
                                       onmouseout="this.className='cssButton normal_button button  button_back'">&nbsp;Back&nbsp;</span></a>
    <div class="m-b-100"></div>
</div>
@endsection