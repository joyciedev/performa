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
                    <h5>Collaborator Objectives</h5>
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
                            <ul>
                                @foreach (auth()->user()->agents as $agent)
                                    <li>{{ $agent->name }} </li>
                                @endforeach
                            </ul>
                        </div>


                    </div>
                    <div class="card-panel-obj ms-auto">
                        <div class="header-card d-flex align-items-center flex-row w-100 ps-4 pe-4">
                            <h5 class="w-100 fw-bold">Collaborators Statistics</h5>
                        </div>
                        <div class="item-card d-flex align-items-center w-100 ps-4 pe-4">
                            <div class="w-75 ps-4">Effectives with objectives</div>
                            <div class="w-25 fw-bold">01</div>
                        </div>
                        <div class="item-card d-flex align-items-center w-100 ps-4 pe-4">
                            <div class="w-75 ps-4">On Going Objectives</div>
                            <div class="w-25 fw-bold">00</div>
                        </div>
                        <div class="item-card d-flex align-items-center w-100 ps-4 pe-4">
                            <div class="w-75 ps-4">Pending Validation</div>
                            <div class="w-25 fw-bold">00</div>
                        </div>
                        <div class="item-card d-flex align-items-center w-100 ps-4 pe-4">
                            <div class="w-75 ps-4">Validated</div>
                            <div class="w-25 fw-bold">00</div>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-row align-items-center w-100 mt-5">
                    <div class="full-card-panel">
                        <div class="d-flex align-items-center w-100 p-3">
                            <h5 class="mb-0">Objectives</h5>
                            <button class="btn-validate ms-auto me-2">
                                <i class="icon-align-center me-1"></i> Validate All
                            </button>
                            <button class="btn-reject">
                                <i class="icon-remove me-1"></i> Reject All
                            </button>
                        </div>
                        <div class="w-100 table-responsive pb-0">
                            <table class="table mb-0 align-middle">
                                <thead>
                                    <tr>
                                        <th style="font-size: 15px"  scope="col">Title</th>
                                        <th  style="font-size: 15px" scope="col">Descriptions</th>
                                        <th  style="font-size: 15px" scope="col">Weight</th>
                                        <th  style="font-size: 15px" scope="col">Date-debut</th>
                                        <th  style="font-size: 15px" scope="col">Date-fin</th>
                                        <th style="font-size: 15px"  scope="col">Value</th>
                                        <th style="font-size: 15px" scope="col">Metric</th>
                                        <th style="font-size: 15px"  scope="col">Status</th>
                                        <th style="font-size: 15px"  scope="col"></th>
                                        <th style="font-size: 15px"  scope="col"></th>
                                    </tr>
                                </thead>
                                <!-- Modal de confirmation -->
                                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmDeleteLabel">Confirmation de suppression</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                            </div>

                                            <div class="modal-body">
                                                Voulez-vous vraiment supprimer cet objectif ?
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annuler</button>
                                                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Supprimer</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <tbody>
                                    @foreach ($objectives as $obj)

                                        <tr  id="row-{{ $obj->id }}"  class="clickable-row" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" data-title="{{ $obj->title }}" data-description="{{ $obj->description }}" data-weight="{{ $obj->weight }}"
                                                data-date_debut="{{ $obj->date_debut }}"
                                                data-date_fin="{{ $obj->date_fin }}"
                                                data-value="{{ $obj->value }}"
                                                data-metric="{{ $obj->metric }}"
                                                data-status="{{ $obj->status }}">
                                            <td>{{ $obj->title }}</td>
                                            <td>{{ $obj->description }}</td>
                                            <td>{{ $obj->weight }}</td>
                                            <td>{{ $obj->date_debut }}</td>
                                            <td>{{ $obj->date_fin }}</td>
                                            <td>{{ $obj->value }}</td>
                                            <td>{{ $obj->metric }}</td>
                                            <td>
                                                 @if ($obj->status == 'Declined')
                                                    <span class="badge bg-danger"></span>
                                                @elseif ($obj->status == 'Success')
                                                    <span class="badge bg-success">Success</span>
                                                @else
                                                    <span class="badge bg-warning">processing</span>
                                                @endif
                                            </td>
                                            <td class="button-class">
                                                <button title="Supprimer"
                                                    class="delete-btn btn-action" data-id="{{ $obj->id }}" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" style="background-color:transparent; border:none;">
                                                    <img src="{{ asset('images/delete.png')}}" alt="Supprimer" style="width: 25px" class="delete-class">
                                                </button>

                                                <a href="{{ route('edit', $obj->id) }}">
                                                    <button title="Modifier"
                                                    class="btn-edit btn-action" data-id="{{ $obj->id }}" style="background-color:transparent; border:none;">
                                                        <img src="{{ asset('images/editing.png')}}" alt="" style="width: 25px" class="delete-class">
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                <script>
                                let objectifIdToDelete = null;

                                // Stocker l’ID quand on clique sur supprimer
                                $('.delete-btn').on('click', function () {
                                    objectifIdToDelete = $(this).data('id');
                                });

                                // Quand on clique sur "Oui, supprimer"
                                $('#confirmDeleteBtn').on('click', function () {
                                    if (objectifIdToDelete) {
                                        $.ajax({
                                            url: '/objectifs/' + objectifIdToDelete,
                                            type: 'DELETE',
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                            success: function (response) {
                                                if (response.success) {
                                                    $('#row-' + objectifIdToDelete).remove();
                                                    $('#confirmDeleteModal').modal('hide');
                                                } else {
                                                    alert(response.message || 'Erreur lors de la suppression.');
                                                }
                                            },
                                            error: function (xhr, status, error) {
                                                alert('Erreur serveur : ' + error);
                                            }
                                        });
                                    }
                                });

                                </script>
                            </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </body>

</html>
