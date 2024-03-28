@extends('backend.dashboard.layout')

@section('title', config('apps.title.index.members-list'))

@section('content-dashboard')

    <div class="row">
        <div class="col-md-4">
            @include('backend.profile.component.information')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex_space-between_item-center">
                        <h4 class="card-title">{{ config('apps.title.index.members-list') }}</h4>
                        <a href="{{ route('create.profile') }}" class="btn btn-outline-success btn-round">
                            {{ config('apps.title.create.member-new') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @include('backend.profile.component.membersListThead')

                    <ul class="list-unstyled team-members">
                        @include('backend.profile.component.membersList')
                    </ul>

                    {{ $users->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

@endsection
