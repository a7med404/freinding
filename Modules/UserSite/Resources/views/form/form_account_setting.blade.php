<div class="ui-block-title">
    <h6 class="title">Account Settings</h6>
</div>
<div class="ui-block-content">
    {!! Form::open(array('route' => 'profile.countsetting.store', 'method'=>'post','class' => '','data-parsley-validate'=>"")) !!}
    <div class="text-center mb-10">
        @include('site.layouts.alert_save')
    </div>
    <div class="row">

        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group label-floating is-select">
                <label class="control-label">Who Can Friend You?</label>
                <select class="selectpicker form-control">
                    <option value="EO">Everyone</option>
                    <option value="NO">No One</option>
                </select>
            </div>
        </div>
        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="form-group label-floating is-select">
                <label class="control-label">Who Can View Your Posts</label>
                <select class="selectpicker form-control">
                    <option value="US">Friends Only</option>
                    <option value="EO">Everyone</option>
                </select>
            </div>
        </div>

        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="description-toggle">
                <div class="description-toggle-content">
                    <div class="h6">Notifications Sound</div>
                    <p>A sound will be played each time you receive a new activity notification</p>
                </div>

                <div class="togglebutton">
                    <label>
                        <input type="checkbox" checked="">
                    </label>
                </div>
            </div>
            <div class="description-toggle">
                <div class="description-toggle-content">
                    <div class="h6">Notifications Email</div>
                    <p>We’ll send you an email to your account each time you receive a new activity notification</p>
                </div>

                <div class="togglebutton">
                    <label>
                        <input type="checkbox" checked="">
                    </label>
                </div>
            </div>
            <div class="description-toggle">
                <div class="description-toggle-content">
                    <div class="h6">Friend’s Birthdays</div>
                    <p>Choose wheather or not receive notifications about your friend’s birthdays on your newsfeed</p>
                </div>

                <div class="togglebutton">
                    <label>
                        <input type="checkbox" checked="">
                    </label>
                </div>
            </div>
            <div class="description-toggle">
                <div class="description-toggle-content">
                    <div class="h6">Chat Message Sound</div>
                    <p>A sound will be played each time you receive a new message on an inactive chat window</p>
                </div>

                <div class="togglebutton">
                    <label>
                        <input type="checkbox" checked="">
                    </label>
                </div>
            </div>
        </div>

        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
            <button class="btn btn-secondary btn-lg full-width">Restore all Attributes</button>
        </div>
        <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
            <button class="btn btn-primary btn-lg full-width">Save all Changes</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>