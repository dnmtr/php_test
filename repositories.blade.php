@extends('layouts.admin.page')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card z-depth-1">
                    <table class="table table-bordered table-hover repositories">
                        <thead>
                        <tr>
                            <th class="align-middle w-75">
                                Repository
                            </th>
                            <th class="align-middle text-center">
                                Static Analysis <span data-toggle="tooltip" data-html="true" title="Static analysis is currently in beta. Please email hello@pullrequest.com to have it enabled for your account.">
                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                </span>
                            </th>
                            <th class="align-middle text-center">
                                Auto-Review <span data-toggle="tooltip" data-placement="top" title="Auto review requires approval from your account manager.  Please email hello@pullrequest.com to have it enabled for your account.">
                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                </span>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($rows ?: [] as $row)
                            <tr>
                                <td class="w-75 repo-link">
                                    <span><i class="fa fa-{{ $row['provider'] }}" aria-hidden="true"></i>
                                    <a href="{{ $row['url'] }}">{{ $row['name'] }}</a>
                                    </span>
                                </td>
                                <td class="repo-static align-middle text-center">
                                    <label class="switch-lg switch switch-pill switch-text switch-success" data-toggle="tooltip" data-html="true" title="Static analysis is currently in beta. Please email hello@pullrequest.com to have it enabled for your account.">
                                        <input
                                               type="checkbox" disabled="disabled" class="switch-input static-enabled-button"
                                               data-static-enabled="{{ $row['static_analysis'] ? 'true' : 'false' }}"
                                               data-repo-id="{{ $row['id'] }}"
                                               data-provider="{{ $row['provider'] }}"
                                                {{ ($row['static_analysis']) ? 'checked' : ''}}>
                                        <span class="switch-label" data-on="On" data-off="Off"></span>
                                        <span class="switch-handle"></span>
                                    </label>
                                </td>
                                <td class="repo-automatic-reviews align-middle text-center">
                                    <label class="switch-lg switch switch-pill switch-text switch-success" <span data-toggle="tooltip" data-placement="top" title="Auto review requires approval from your account manager.  Please email hello@pullrequest.com to have it enabled for your account.">
                                        <input disabled="disabled" type="checkbox" class="switch-input auto-review-button"
                                               data-auto-enabled="{{ $row['automatic_reviews'] ? 'true' : 'false' }}"
                                               data-repo-id="{{ $row['id'] }}"
                                               data-provider="{{ $row['provider'] }}"
                                                {{ ($row['automatic_reviews']) ? 'checked' : ''}}>
                                        <span class="switch-label" data-on="On" data-off="Off"></span>
                                        <span class="switch-handle" data-on="On" data-off="Off"></span>
                                    </label>
                                </td>
                        @empty
                            <tr>
                                <td colspan="5">
                                    No linked repositories.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                @if($isGithubAuthed)
                    <a href="https://github.com/apps/PullRequest">
                        <h4>Add / Update Repositories.</h4>
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection