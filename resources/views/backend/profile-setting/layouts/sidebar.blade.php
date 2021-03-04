<div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg toggle-screen-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
    <div class="card-inner-group" data-simplebar="init"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: 0px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;"><div class="simplebar-content" style="padding: 0px;">
        <div class="card-inner">
            <div class="user-card">
                <div class="user-avatar bg-primary">
                    @if (Auth::user()->profile_picture)
                        <img src="{{ Auth::user()->takeProfilePicture }}" alt="">
                    @else
                        {{ Str::limit(Auth::user()->name, 1, '') }}
                    @endif
                </div>
                <div class="user-info">
                    <span class="lead-text">{{ Auth::user()->name }} <span class="text-azure"><em class="icon ni ni-check-circle-fill"></em></span></span>
                    <span class="sub-text">{{ Auth::user()->email }}</span>
                </div>
                <div class="user-action">
                    <div class="dropdown">
                        <a class="btn btn-icon btn-trigger mr-n2" data-toggle="dropdown" href="#"><em class="icon ni ni-more-v"></em></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <ul class="link-list-opt no-bdr">
                                <li><a href="#file-upload" data-toggle="modal"><em class="icon ni ni-camera-fill"></em><span>Change Photo</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-inner">
            <div class="row text-center">
                <div class="col-6">
                    <div class="profile-stats">
                        <span class="amount">{{ $articles->count() }}</span>
                        <span class="sub-text">Total Article</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="profile-stats">
                        <span class="amount">-</span>
                        <span class="sub-text">Total Views</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-inner p-0">
            <ul class="link-list-menu">
                <li><a class="personalInformation" href="{{ route('profile.personal.information') }}"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                <li><a class="securitySettings" href="{{ route('profile.personal.settings') }}"><em class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a></li>
            </ul>
        </div>
    </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 443px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="width: 0px; display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 0px; display: none;"></div></div></div>
</div>

<form action="{{ route('update.photo.profile') }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="modal fade" tabindex="-1" role="dialog" id="file-upload">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-md">
                    <div class="nk-upload-form">
                        <h5 class="title mb-5">Upload Photo Profile</h5>
                        <div class="form-group">
                            <input type="file" multiple="" class="custom-file-input @error('photo_profile') is-invalid @enderror" id="photo_profile" name="photo_profile">
                            <label class="custom-file-label" for="photo_profile">Choose image for thumbnail</label>
                            @error('photo_profile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <small class="text-danger">** Photo profile will resize to : 300px x 300px</small>
                        </div>
                    </div>
                    <div class="nk-modal-action justify-end">
                        <ul class="btn-toolbar g-4 align-center">
                            <li><button class="btn btn-primary">Add Photo</button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>