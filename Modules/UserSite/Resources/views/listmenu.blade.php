<div class="your-profile">
    <div class="ui-block-title ui-block-title-small">
        <h6 class="title">Your PROFILE</h6>
    </div>

    <div id="accordion1" role="tablist" aria-multiselectable="true">
        <div class="card">
            <div class="card-header" role="tab" id="headingOne-1">
                <h6 class="mb-0">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne-1" aria-expanded="true"
                       aria-controls="collapseOne">
                        Profile Settings
                        <svg class="olymp-dropdown-arrow-icon">
                            <use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use>
                        </svg>
                    </a>
                </h6>
            </div>

            <div id="collapseOne-1" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                <ul class="your-profile-menu">
                    <li>
                        <a href="{{ route('profile.setting') }}">Personal Information</a>
                    </li>
                    <li>
                        <a href="{{ route('profile.countsetting') }}">Account Settings</a>
                    </li>
                    <li>
                        <a href="{{ route('profile.changepassword') }}">Change Password</a>
                    </li>
                    <li>
                        <a href="31-YourAccount-HobbiesAndInterests.html">Hobbies and Interests</a>
                    </li>
                    <li>
                        <a href="32-YourAccount-EducationAndEmployement.html">Education and Employement</a>
                    </li>
                    <li>
                        <a href="{{ route('profile.statistics') }}">Statistics</a>
                    </li>
                    <li>
                        <a href="{{ route('profile.verification') }}">Verify your profile</a>
                    </li>
                    <li>
                        <a href="{{ route('profile.stage') }}">Profile Stage</a>
                    </li>
                    <li>
                        <a id="deleteacc" href="#">Delete Account</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>


    <div class="ui-block-title">
        <a href="33-YourAccount-Notifications.html" class="h6 title">Notifications</a>
        <a href="#" class="items-round-little bg-primary">8</a>
    </div>
    <div class="ui-block-title">
        <a href="34-YourAccount-ChatMessages.html" class="h6 title">Chat / Messages</a>
    </div>
    <div class="ui-block-title">
        <a href="35-YourAccount-FriendsRequests.html" class="h6 title">Friend Requests</a>
        <a href="#" class="items-round-little bg-blue">4</a>
    </div>
    <div class="ui-block-title ui-block-title-small">
        <h6 class="title">FAVOURITE PAGE</h6>
    </div>
    <div class="ui-block-title">
        <a href="36-FavPage-SettingsAndCreatePopup.html" class="h6 title">Create Fav Page</a>
    </div>
    <div class="ui-block-title">
        <a href="36-FavPage-SettingsAndCreatePopup.html" class="h6 title">Fav Page Settings</a>
    </div>
</div>