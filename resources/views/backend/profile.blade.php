@extends('layouts.backend_master')
@section('main_part')

<div class="row mt-4 mx-auto">
<div class="col-lg-6">
   <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="card-style settings-card-1 mb-30">
        <div class="title mb-30 d-flex justify-content-between align-items-center">
          <h6>My Profile</h6>
          <button class="border-0 bg-transparent">
            <i class="lni lni-pencil-alt"></i>
          </button>
        </div>
        <div class="profile-info">
          <div class="d-flex align-items-center mb-30">
            <div class="profile-image">
              <img src="{{auth()->user()->profile == null?" https://api.dicebear.com/7.x/initials/svg?seed= ".auth()->user()->name : asset('storage/users/'.auth()->user()->profile)}}" alt="">
              <div class="update-image">
                <input id="profile_image" type="file"name="profile">
                <label for="profile_image"><i class="lni lni-cloud-upload"></i></label>
              </div>
            </div>
            <div class="profile-meta">
              <h5 class="text-bold text-dark mb-10">{{ auth()->user()->name }}</h5>

            </div>
          </div>
          @error('profile')
          <p class="text-danger">{{ $message}}</p>
                    @enderror
          <div class="input-style-1">
            <label>Name</label>
            <input type="text"name="name" placeholder="name" value="{{ auth()->user()->name}}">
            @error('name')
            <p class="text-danger">{{ $message}}</p>
                      @enderror
          </div>
          <div class="input-style-1">
            <label>Email</label>
            <input type="email"name="email"  placeholder="admin@example.com" value="{{ auth()->user()->email}}">
          @error('email')
<p class="text-danger">{{ $message}}</p>
          @enderror
        </div>
          <div class="input-style-1">
<button type="submit"class="main-btn primary-btn btn-hover w-100">Update Profile</button>
          </div>

        </div>
      </div>


    </form>
</div>



<div class="col-lg-6">
    <form action="{{ route('changePassword') }}"method="POST">
@method('PUT')
@csrf
        <div class="card-style mb-30">
            <h6 class="mb-25">Change Password</h6>
            <div class="input-style-1">
              <label>Current Password</label>
              <input type="password" placeholder="Current Password"name="current_password">
            @error('current_password')
<p class="text-danger">{{ $message }}</p>
            @enderror
            </div>
            <div class="input-style-1">
                <label>new Password</label>
                <input type="password" placeholder="New Password"name="password">
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                            @enderror
            </div>
              <div class="input-style-1">
                <label>Confirm Password</label>

            <input type="password" placeholder="Confirm Password"name="password_confirmation">
            @error('password_confirmation')
            <p class="text-danger">{{ $message }}</p>
                        @enderror
        </div>

              <div class="input-style-1">
                <button type="submit"class="main-btn primary-btn btn-hover w-100">Change Password</button>
              </div>
          </div>
        </form>
    </div>

</div>
@endsection
