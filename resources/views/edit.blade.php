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
                                    Objectives
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
                    <h5>Welcome back, John Doe</h5>
                    <p>Evaluation status</p>
                </div>
                <div class="right-header d-flex ms-auto">
                    <button class="btn-period">Period 2025</button>
                </div>
            </div>
            <div class="body d-flex flex-column align-items-center w-100">
                <div class="d-flex flex-column align-items-start w-100">
                    <h5 class="mt-3 mb-5 fw-bold">Edit your Objective</h5>

                    <form class="form-perfoma d-flex flex-column align-items-start w-100" method="POST" action="{{ route('objectives.update', $objective->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="d-flex align-items-start flex-column w-50 mb-3">
                            <label for="title">Title</label>
                            <input class="input-form-control" type="text" name="title" value="{{ $objective->title}}" id="title" />
                        </div>

                        <div class="d-flex align-items-start flex-column w-50 mb-3">
                            <label for="description">Description</label>
                            <textarea class="textarea-form-control" type="text" value="{{ old('description', $objective->description) }}" name="description" id="description"></textarea>
                        </div>

                        <div class="d-flex align-items-start flex-column w-50 mb-3">
                            <label for="weight">Weight</label>
                            <input class="input-form-control" type="text" name="weight" value="{{ $objective->weight}}"  id="weight" />
                        </div>

                        <div class="d-flex align-items-start flex-column w-50 mb-3">
                            <label for="date_debut">date_debut</label>
                            <input class="input-form-control" type="date" name="date_debut" value="{{ $objective->date_debut}}" id="period" />
                        </div>

                        <div class="d-flex align-items-start flex-column w-50 mb-3">
                            <label for="date_fin">date_fin</label>
                            <input class="input-form-control" type="date" name="date_fin" value="{{ $objective->date_fin}}" id="period" />
                        </div>

                        <div class="d-flex align-items-start flex-column w-50 mb-3">
                            <label for="value">Value</label>
                            <input class="input-form-control" type="text" name="value" value="{{ $objective->value}}" id="value" />
                        </div>

                        <div class="d-flex align-items-start flex-column w-50">
                            <label for="metric">Metric</label>
                            <input class="input-form-control" type="text" name="metric" value="{{ $objective->metric}}" id="metric" />
                        </div>

                        <div class="d-flex align-items-center flex-column w-50 mt-5">
                            <button class="btn-submit-form" type="submit">Edit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
