<div class="modal fade" id="modalMembers" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-card card" data-list='{"valueNames": ["name"]}'>
                <div class="card-header">

                    <!-- Title -->
                    <h4 class="card-header-title" id="exampleModalCenterTitle">
                        Add a contributor
                    </h4>
                    <div class="alert alert-danger alert-dismissible fade show" id="error_block" role="alert"
                        style="position: absolute;right:10px;top:10px;display:none">
                        <span id="err"></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <!-- Close -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="card-header">

                    <!-- Form -->
                    <form>
                        <div class="input-group input-group-flush input-group-merge input-group-reverse">
                            <input class="form-control list-search" type="search" placeholder="Search">
                            <div class="input-group-text">
                                <span class="fe fe-search"></span>
                            </div>
                        </div>



                    </form>

                </div>
                <div class="card-body">

                    <!-- List group -->
                    <ul class="list-group list-group-flush list my-n3">
                        @foreach ($users as $user)
                            <li class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col ms-n2">
                                        <!-- Title -->
                                        <h4 class="mb-1 name">
                                            <a href="profile-posts.html">{{ $user->name }}</a>
                                        </h4>
                                    </div>
                                    <div class="col-auto">

                                        @php
                                            // Check for any invite related to the current contribution
                                            $invitesForCurrentContribution = $user->invitations->where(
                                                'pivot.contribution_id',
                                                $contribution->id,
                                            );
                                            $hasPendingOrAcceptedInvite = $invitesForCurrentContribution
                                                ->whereIn('pivot.status', [0, 1])
                                                ->isNotEmpty();
                                            $hasDeclinedInvite = $invitesForCurrentContribution
                                                ->where('pivot.status', 2)
                                                ->isNotEmpty();
                                        @endphp

                                        @if ($hasPendingOrAcceptedInvite)
                                            @foreach ($invitesForCurrentContribution as $invite)
                                                @if ($invite->pivot->status == 0)
                                                    <button class="btn btn-sm btn-white invite"
                                                        data-id="{{ $user->id }}"
                                                        data-cont_id="{{ $contribution->id }}" disabled>
                                                        Invite Sent <i class="fe fe-check-circle"></i>
                                                    </button>
                                                @elseif ($invite->pivot->status == 1)
                                                    <button class="btn btn-sm btn-white invite"
                                                        data-id="{{ $user->id }}"
                                                        data-cont_id="{{ $contribution->id }}" disabled>
                                                        Invite Accepted <i class="fe fe-check-circle"></i>
                                                    </button>
                                                @endif
                                            @endforeach
                                        @elseif ($hasDeclinedInvite || $invitesForCurrentContribution->isEmpty())
                                            <button class="btn btn-sm btn-white invite" data-id="{{ $user->id }}"
                                                data-cont_id="{{ $contribution->id }}">
                                                Invite
                                            </button>
                                        @endif


                                    </div>
                                </div>
                            </li>
                        @endforeach


                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- HEADER -->
<div class="header">
    <div class="container-fluid">

        <!-- Body -->
        <div class="header-body">
            <div class="row align-items-center">
                <div class="col ms-n3 ms-md-n2">

                    <!-- Pretitle -->
                    <h6 class="header-pretitle">
                        Contributions
                    </h6>

                    <!-- Title -->
                    <h1 class="header-title">
                        {{ $contribution->name }}
                    </h1>

                </div>
                <div class="col-12 col-md-auto mt-3 mt-md-0">

                    <!-- Avatar group -->
                    <div class="avatar-group">
                        @php
                            $colors = [
                                'bg-info',
                                'bg-success',
                                'bg-warning',
                                'bg-danger',
                                'bg-primary',
                                'bg-secondary',
                                'bg-light',
                                'bg-dark',
                            ];
                        @endphp

                        @foreach ($contribution->users as $user)
                            @php
                                $randomColor = $colors[array_rand($colors)];
                            @endphp
                            <a href="{{ route('users.show', $user->id) }}" class="avatar" data-bs-toggle="tooltip"
                                title="{{ $user->name }}">
                                <div class="avatar">
                                    <span class="avatar-title rounded-circle {{ $randomColor }}">
                                        {{ strtoupper(substr($user->name, 0, 2)) }}
                                    </span>
                                </div>
                            </a>
                        @endforeach


                    </div>

                    <!-- Button -->
                    <a href="#modalMembers" class="btn btn-lg btn-rounded-circle btn-white lift" data-bs-toggle="modal">
                        +
                    </a>

                </div>
            </div> <!-- / .row -->
            <div class="row align-items-center">
                <div class="col">

                    <!-- Nav -->
                    {{-- create a single page for this navigation --}}
                    <ul class="nav nav-tabs nav-overflow header-tabs" id="tab-menu">
                        <li class="nav-item">
                            <a href="{{ route('contribution.show', $contribution->id) }}" class="nav-link ">
                                Overview
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contribution.repayments', $contribution->id) }}" class="nav-link">
                                Payments
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="project-reports.html" class="nav-link">
                                Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="project-reports.html" class="nav-link">
                                Settings
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

    </div>
</div> <!-- / .header -->
<script>
    $(document).ready(function() {
        var currentUrl = window.location.href;
        $('#tab-menu .nav-link').each(function() {
            if (this.href === currentUrl) {
                $('#tab-menu .nav-link').removeClass('active');
                $(this).addClass('active');
            }
        });

    });
</script>
<script src="{{ asset('assets/js/invite.js') }}"></script>
