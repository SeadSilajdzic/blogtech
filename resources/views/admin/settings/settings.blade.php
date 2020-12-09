@extends('layouts.admin')

@section('content')

    <h2>Site settings</h2>

    @include('includes._errors')
    @include('includes._sessions')

    <form action="{{ route('settings.update') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="site_name">Site name</label>
            <input type="text" name="site_name" class="form-control" required placeholder="This field is required!" value="{{ old('site_name', $settings->site_name) }}">
        </div>

        <div class="form-group">
            <label for="site_description">Site description</label>
            <textarea name="site_description" class="form-control mytinytext" id="site_description" placeholder="Don't be shy, get in touch with us and create the world again!" cols="30" rows="10">{!! old('site_description', $settings->site_description) !!}</textarea>
        </div>

        <div class="form-group">
            <label for="site_facebook">Site facebook page</label>
            <input type="text" name="site_facebook" class="form-control" placeholder="https://www.facebook.com/" value="{{ old('site_facebook', $settings->site_facebook) }}">
        </div>

        <div class="form-group">
            <label for="site_instagram">Site instagram page</label>
            <input type="text" name="site_instagram" class="form-control" placeholder="https://www.instagram.com/" value="{{ old('site_instagram', $settings->site_instagram) }}">
        </div>

        <div class="form-group">
            <label for="site_twitter">Site twitter page</label>
            <input type="text" name="site_twitter" class="form-control" placeholder="https://twitter.com/" value="{{ old('site_twitter', $settings->site_twitter) }}">
        </div>

        <div class="form-group">
            <label for="site_linkedin">Site linkedin page</label>
            <input type="text" name="site_linkedin" class="form-control" placeholder="https://www.linkedin.com/" value="{{ old('site_linkedin', $settings->site_linkedin) }}">
        </div>

        <div class="form-group">
            <label for="site_behance">Site behance page</label>
            <input type="text" name="site_behance" class="form-control" placeholder="https://www.behance.net/" value="{{ old('site_behance', $settings->site_behance) }}">
        </div>

        <div class="form-group">
            <label for="site_dribbble">Site dribbble page</label>
            <input type="text" name="site_dribbble" class="form-control" placeholder="https://dribbble.com/" value="{{ old('site_dribbble', $settings->site_dribbble) }}">
        </div>

        <div class="form-group">
            <label for="site_email">Site email</label>
            <input type="text" name="site_email" class="form-control" placeholder="...@outlook... / ...@hotmail... / ...@gmail..." value="{{ old('site_email', $settings->site_email) }}">
        </div>

        <hr class="divider">

        <div class="form-group">
            <label for="site_field_one">First footer field title</label>
            <input type="text" name="site_field_one" class="form-control" placeholder="PHONE" value="{{ old('site_field_one', $settings->site_field_one) }}">
        </div>

        <div class="form-group">
            <label for="site_field_one_value">First footer field value</label>
            <textarea name="site_field_one_value" id="site_field_one_value" class="mytinytext form-control" placeholder="+80 (0)5 22 55 66 77">{{ old('site_field_one_value', $settings->site_field_one_value) }}</textarea>
        </div>

        <hr class="divider">

        <div class="form-group">
            <label for="site_field_two">Second footer field title</label>
            <input type="text" name="site_field_two" class="form-control" placeholder="ADDRESS" value="{{ old('site_field_two', $settings->site_field_two) }}">
        </div>

        <div class="form-group">
            <label for="site_field_two_value">Second footer field value</label>
            <textarea name="site_field_two_value" id="site_field_two_value" class="mytinytext form-control" placeholder="33 rue Burdeau 69089, Paris France">{{ old('site_field_two_value', $settings->site_field_two_value) }}</textarea>
        </div>

        <hr class="divider">

        <div class="form-group">
            <label for="site_field_three">Third footer field title</label>
            <input type="text" name="site_field_three" class="form-control" placeholder="ENQUIRUES" value="{{ old('site_field_three', $settings->site_field_three) }}">
        </div>

        <div class="form-group">
            <label for="site_field_three_value">Third footer field value</label>
            <textarea name="site_field_three_value" id="site_field_three_value" class="mytinytext form-control" placeholder="email@gmail.com">{{ old('site_field_three_value', $settings->site_field_three_value) }}</textarea>
        </div>

        <hr class="divider">

        <div class="form-group">
            <label for="site_field_four">Fourth footer field title</label>
            <input type="text" name="site_field_four" class="form-control" placeholder="WORK HOURS" value="{{ old('site_field_four', $settings->site_field_four) }}">
        </div>

        <div class="form-group">
            <label for="site_field_four_value">Fourth footer field value</label>
            <textarea name="site_field_four_value" id="site_field_four_value" class="mytinytext form-control" placeholder="Weekdays: 09:00 - 18:00  Weekends: 11:00 - 17:00">{{ old('site_field_four_value', $settings->site_field_four_value) }}</textarea>
        </div>

        <hr class="divider">

        <div class="form-group">
            <label for="site_copyright">Site copyright</label>
            <input type="text" name="site_copyright" class="form-control" placeholder="Created with love by _______ (fill 'Site creator name' field)" value="{{ old('site_copyright', $settings->site_copyright) }}">
        </div>

        <hr class="divider">

        <div class="form-group">
            <label for="site_creator_name">Site creator name</label>
            <input type="text" name="site_creator_name" class="form-control" placeholder="John Doe" value="{{ old('site_creator_name', $settings->site_creator_name) }}">
        </div>

        <div class="form-group">
            <label for="site_creator_link">Site creator page</label>
            <input type="text" name="site_creator_link" class="form-control" placeholder="https://site-creator-page.com" value="{{ old('site_creator_link', $settings->site_creator_link) }}">
        </div>

        <div class="form-group">
            <div class="alert alert-warning">
                <p>
                    <strong>Link</strong> <br>
                    <span>Please make sure that your links are complete (with http://, https:// ...)</span>
                </p>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" name="btn_update_site_settings" class="btn btn-block btn-success">Update site settings</button>
        </div>
    </form>

    @include('includes._errors')

@endsection
