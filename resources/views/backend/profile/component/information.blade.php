<div class="card card-user">
    <div class="image">
        <img src="{{ asset('dashboard/img/damir-bosnjak.jpg') }}" alt="...">
    </div>
    <div class="card-body">
        <div class="author">
            <a href="{{ route('user.profile') }}">
                <img class="avatar border-gray"
                    src="{{ Auth::check() ? Auth::user()->image : asset('dashboard/img/mike.jpg') }}"
                    alt="...">
                <h5 class="title">{{ Auth::check() ? Auth::user()->name : 'Dashboard' }}</h5>
            </a>
            <p class="description">
                {{ Auth::check() ? Auth::user()->email : 'Dashboard' }}
            </p>
        </div>
        <p class="description text-center">
            "I like the way you work it <br>
            No diggity <br>
            I wanna bag it up"
        </p>
    </div>
    <div class="card-footer">
        <hr>
        <div class="button-container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-6 ml-auto">
                    <h5>12<br><small>Files</small></h5>
                </div>
                <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                    <h5>2GB<br><small>Used</small></h5>
                </div>
                <div class="col-lg-3 mr-auto">
                    <h5>24,6$<br><small>Spent</small></h5>
                </div>
            </div>
        </div>
    </div>
</div>
