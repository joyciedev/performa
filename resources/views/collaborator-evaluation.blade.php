<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfoma</title>
</head>

<body>
    @extends('layouts.base')
    <div class="d-flex flex-row w-100">
        <div class="sidebar">
            <div class="d-flex align-items-center w-100 justify-content-center logo-brand">
                <img src="images/logo.png" width="47px" alt="">
                <h5 class="fw-bold" style="font-size: 2rem">Performa</h5>
            </div>
            <div class="menu-sidebar">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingZero">
                            <a href="{{ route('dashboard')}}" class="accordion-button collapsed no-item active" type="button">
                                Home
                            </a>
                        </h2>
                    </div>
                    @if(Auth::user()->roles === 'agent' || Auth::user()->roles === 'manager')
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    evaluationectives
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul class="list-unstyled">
                                        @if(Auth::user()->roles === 'agent')
                                        <li><a href="{{ route('user-create-objective')}}">Create Objective</a></li>
                                    @endif
                                    @if(Auth::user()->roles === 'manager')
                                        <li><a href="{{ route('collaborator-objective')}}">Collaborator Objectives</a></li>
                                    @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                Evaluations
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul class="list-unstyled">
                                    @if(Auth::user()->roles === 'agent')
                                    <li><a href="{{ route('user-create-self-evaluation')}}">Self Evaluation</a></li>
                                @endif
                                @if(Auth::user()->roles === 'manager')
                                    <li><a href="{{ route('collaborator-evaluation')}}">Collaborator Evaluations</a></li>
                                @endif
                                    <li><a href="{{ route('evaluation-history')}}">Evaluation History</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                Organisation Management
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul class="list-unstyled">
                                    <li><a href="user-create-organisation-management.html">Delegation</a></li>
                                    <li><a href="user-organisation-management-reattachment.html">Reattachement</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                Period Management
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul class="list-unstyled">
                                    <li><a href="user-create-period-management.html">Create period</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingZeroOne">
                            <button class="accordion-button collapsed no-item" type="button">
                                Reports
                            </button>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="divider"></div>
                    <div class="account-info mt-3 mb-3 w-100">
                        <div class="img-account">
                            {{-- <img src="{{ asset('images/Capture JOYCIE.png')}}" alt=""> --}}
                        </div>
                            <div class="info">
                                <h5 style="font-weight: bold"> {{ Auth::user()->name }} </h5>
                                <p> {{ Auth::user()->email }} </p>
                            </div>
                            <form action="{{ route('signout') }}" method="POST" class="ms-auto">
                                @csrf
                                <button type="submit" title="Déconnexion" style="background: none; border: none;">
                                    <i class="icon-signout" style="font-size: 1.5rem; color: #12B76A; cursor: pointer;"></i>
                                </button>
                            </form>

                        </div>
                </div>
            </div>
        <div class="main-content">
            <div class="header">
                <div class="left-header d-flex flex-column">
                    <h5>Collaborator Evaluations</h5>
                    <p>Evaluation status</p>
                </div>
                <div class="right-header d-flex ms-auto">
                    <button class="btn-period">Period 2025</button>
                </div>
            </div>
            <div class="body d-flex flex-column align-items-center w-100 mt-3">
                <div class="d-flex flex-row align-items-center w-100">
                    <div class="card-panel-obj">
                        <div class="header-card d-flex align-items-center flex-row w-100 ps-4 pe-4">
                            <h5 class="w-75 fw-bold">List of Collaborators</h5>
                            <h5 class="ms-auto w-25 fw-bold">Status</h5>
                        </div>
                        <div class="item-card d-flex align-items-center w-100 active-line ps-4 pe-4">
                            <div class="w-75">John Doe Zara</div>
                            <div class="w-25">Validated</div>
                        </div>
                        <div class="item-card d-flex align-items-center w-100 ps-4 pe-4">
                            <div class="w-75">Johnes Does Mic</div>
                            <div class="w-25">Validated</div>
                        </div>
                        <div class="item-card d-flex align-items-center w-100 ps-4 pe-4">
                            <div class="w-75">Zimple Trqdex</div>
                            <div class="w-25">Ongoing</div>
                        </div>
                        <div class="item-card d-flex align-items-center w-100 ps-4 pe-4">
                            <div class="w-75">Kaduna Johna</div>
                            <div class="w-25">Awaiting Validation</div>
                        </div>
                        <div class="item-card d-flex align-items-center w-100 ps-4 pe-4">
                            <div class="w-75">Kim Jo Fire</div>
                            <div class="w-25">Objective rejected</div>
                        </div>
                    </div>
                    <div class="card-panel-obj ms-auto">
                        <div class="header-card d-flex align-items-center flex-row w-100 ps-4 pe-4">
                            <h5 class="w-100 fw-bold">Collaborators Statistics</h5>
                        </div>
                        <div class="item-card d-flex align-items-center w-100 ps-4 pe-4">
                            <div class="w-75 ps-4">Effectives with objectives</div>
                            <div class="w-25 fw-bold"></div>
                        </div>
                        <div class="item-card d-flex align-items-center w-100 ps-4 pe-4">
                            <div class="w-75 ps-4">On Going Objectives</div>
                            <div class="w-25 fw-bold"></div>
                        </div>
                        <div class="item-card d-flex align-items-center w-100 ps-4 pe-4">
                            <div class="w-75 ps-4">Pending Validation</div>
                            <div class="w-25 fw-bold"></div>
                        </div>
                        <div class="item-card d-flex align-items-center w-100 ps-4 pe-4">
                            <div class="w-75 ps-4">Validated</div>
                            <div class="w-25 fw-bold"></div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center w-100 mt-5">
                    <div class="full-card-panel">
                        <div class="d-flex align-items-center w-100 pt-3 ps-4 pe-4 pb-3">
                            <h5 class="mb-0">Evaluation</h5>
                            <i class="icon-ellipsis-vertical ms-auto" style="color: #98A2B3 !important"></i>
                        </div>
                        <div class="w-100 table-responsive pb-0">
                            <table class="table mb-0 align-middle">
                                 <thead>
                                    <tr>
                                        <th style="font-size: 15px"  scope="col">Title</th>
                                        <th  style="font-size: 15px" scope="col">Descriptions</th>
                                        <th  style="font-size: 15px" scope="col">Weight</th>
                                        <th  style="font-size: 15px" scope="col">Date_debut</th>
                                        <th  style="font-size: 15px" scope="col">Date_fin</th>
                                        <th style="font-size: 15px"  scope="col">Value</th>
                                        <th style="font-size: 15px" scope="col">Metric</th>
                                        <th style="font-size: 15px" scope="col">Score</th>
                                        <th style="font-size: 15px" scope="col">Comments</th>
                                        <th style="font-size: 15px"  scope="col">Status</th>
                                        <th style="font-size: 15px"  scope="col"></th>
                                        <th style="font-size: 15px"  scope="col"></th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        @foreach ($evaluations as $evaluation)

                                            <tr  id="row-{{ $evaluation->id }}"  class="clickable-row" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" data-title="{{ $evaluation->title }}" data-description="{{ $evaluation->description }}" data-weight="{{ $evaluation->weight }}"
                                                    data-date_debut="{{ $evaluation->date_debut }}"
                                                    data-date_fin="{{ $evaluation->date_fin }}"
                                                    data-value="{{ $evaluation->value }}"
                                                    data-metric="{{ $evaluation->metric }}"
                                                    data-status="{{ $evaluation->status }}">
                                                <td>{{ $evaluation->title }}</td>
                                                <td>{{ $evaluation->description }}</td>
                                                <td>{{ $evaluation->weight }}</td>
                                                <td>{{ $evaluation->date_debut }}</td>
                                                <td>{{ $evaluation->date_fin }}</td>
                                                <td>{{ $evaluation->value }}</td>
                                                <td>{{ $evaluation->metric }}</td>
                                                @if ($evaluation->evaluation)
                                                    <td>{{ $evaluation->evaluation->score }}</td>
                                                    <td>{{ $evaluation->evaluation->comments }}</td>
                                                @else
                                                    <td>_</td>
                                                    <td>_</td>
                                                @endif
                                                <td>
                                                    @if ($evaluation->status == 'Declined')
                                                        <span class="badge bg-danger"></span>
                                                    @elseif ($evaluation->status == 'Success')
                                                        <span class="badge bg-success">Success</span>
                                                    @else
                                                        <span class="badge bg-warning">processing</span>
                                                    @endif
                                                </td>
                                                <td class="button-class">
                                                    <a href="{{ route('evaluate-form', $evaluation->id)}}">
                                                        <button type="submit" class="btn btn-outline-success">Evaluate</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>
