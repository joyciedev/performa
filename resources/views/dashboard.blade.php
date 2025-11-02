<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfoma</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        <div class="img-account me-3">
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
                    <h5>Welcome back, {{ Auth::user()->name}} </h5>
                    <p>Evaluation status</p>
                </div>
                <div class="right-header d-flex ms-auto">
                    <button class="btn-period">Period 2025</button>
                </div>
            </div>
            <div class="body d-flex flex-column align-items-center w-100">
                <div class="d-flex flex-row align-items-center w-100" aria-hidden="true">
                    <div class="card-panel">
                        <h5 class="">Personals Informations</h5>
                        <div class="divider"></div>
                        <div class="body-panel-card mt-2">
                            <ul class="list-unstyled">
                                <strong><li class="mb-2">Name : {{ Auth::user()->name}}</li></strong>
                                <strong><li class="mb-2"> Direction : {{ Auth::user()->direction }}</li></strong>
                                <strong><li class="mb-2"> Direction : {{ Auth::user()->matricule }}</li></strong>
                                <strong><li>Name Manager :{{ auth()->user()->manager ? auth()->user()->manager->name : 'Aucun manager attribué' }}</li></strong>
                            </ul>
                        </div>
                    </div>
                    <div class="card-panel ms-auto">
                        <h5 class="">Manager Strategic Objectives</h5>
                        <div class="divider"></div>
                        <div class="body-panel-card mt-2">
                            <ul class="list-unstyled">
                                <li class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                                <li class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                                <li class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center w-100 mt-5">
                    <div class="card-panel-shortcut">
                        <div class="d-flex align-items-center w-100">
                            <div class="d-flex align-items-center w-25">
                                <img src="{{ asset('images/cible.png')}}" style="padding-left: 100px" alt="">
                            </div>
                            <a href="{{ route('user-create-objective') }}" class="text-decoration-none text-dark" style="all: unset; cursor: pointer;">
                                <div class="d-flex flex-column w-75 item ms-5">
                                    <h5 class="mb-0 w-100">Create New Objective</h5>
                                    <p class="w-100 mb-0">Add New Objective and Assign to User</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="card-panel-shortcut ms-auto">
                        <div class="d-flex align-items-center w-100">
                            <div class="d-flex align-items-center w-25">
                                  <img src="{{ asset('images/evaluation.png')}}" style="padding-left: 100px" alt="">
                            </div>
                            <a href="{{ route('user-create-self-evaluation') }}" class="text-decoration-none text-dark" style="all: unset; cursor: pointer;">
                                <div class="d-flex flex-column w-75 item ms-5">
                                    <h5 class="mb-0 w-100">Perform Self Evaluation</h5>
                                    <p class="w-100 mb-0">Add New Objective and Assign to User</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row align-items-center w-100 mt-5">
                    <div class="full-card-panel">
                        <div class="d-flex align-items-center w-100 p-4">
                            <h5 class="mb-0" >Objectives</h5>
                            <i class="icon-ellipsis-vertical ms-auto" style="color: #98A2B3 !important"></i>
                        </div>
                        <div class="w-100 table-responsive pb-0">
                            @if(auth()->user()->roles === 'agent')
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
                                        <th style="font-size: 15px"  scope="col">Status</th>
                                        <th style="font-size: 15px"  scope="col"></th>
                                        <th  style="font-size: 15px" scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($objectives as $obj)
                                        <tr  id="row-{{ $obj->id }}"  class="clickable-row" data-bs-target="#offcanvasRight" data-bs-toggle="offcanvas"
                                        data-title="{{ $obj->title }}"
                                        data-description="{{ $obj->description }}"
                                        data-weight="{{ $obj->weight }}"
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
                                                @elseif ($obj->status == 'Declined')
                                                    <span class="badge bg-success">Success</span>
                                                @else
                                                    <span class="badge bg-warning">processing</span>
                                                @endif
                                            </td>
                                            <td class="button-class">
                                                <button title="Supprimer"
                                                    class="delete-btn" data-id="{{ $obj->id }}" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" style="background-color:transparent; border:none;">
                                                    <img src="{{ asset('images/delete.png')}}" alt="Supprimer" style="width: 25px" class="delete-class">
                                                </button>

                                                <a href="{{ route('edit', $obj->id) }}">
                                                    <button title="Modifier"
                                                    class="btn-edit" data-id="{{ $obj->id }}" style="background-color:transparent; border:none;">
                                                        <img src="{{ asset('images/editing.png')}}" alt="" style="width: 25px" class="delete-class">
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <div class="alert alert-warning text-center mt-4">
                                    <strong>Accès réservé aux agents.</strong><br>
                                    Ce tableau est uniquement visible par les agents pour la gestion de leurs objectifs personnels.
                            </div>
                            @endif
                        </div>
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

                            </div>
                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                        let objectifIdToDelete = null;

                                        // Quand on clique sur le bouton Supprimer (dans le tableau)
                                        $(document).on('click', '.delete-btn', function () {
                                            objectifIdToDelete = $(this).data('id');
                                        });

                                        // Quand on confirme dans le modal
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
                                                            // Supprime la ligne de la table
                                                            $('#row-' + objectifIdToDelete).remove();
                                                            // Ferme le modal
                                                            $('#confirmDeleteModal').modal('hide');
                                                            // Réinitialise l'ID
                                                            objectifIdToDelete = null;
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

                                    {{-- <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                                            <div class="offcanvas-header">
                                                <br><h5 class="offcanvas-title pt-5 fw-bold" id="offcanvasRightLabel">Objective Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Fermer"></button>
                                            </div>
                                            <div class="offcanvas-body">
                                                <br><p><strong style="font-size: 15px; color :black" >Title:</strong> <br><span id="oc-title"></span></p>
                                                <br><p><strong style="font-size: 15px; color :black" >Description:</strong> <br><span id="oc-description"></span></p>
                                                <br><p><strong style="font-size: 15px; color :black" >Date_debut:</strong> <br><span id="oc-date_debut"></span></p>
                                                <br><p><strong style="font-size: 15px; color :black" >Date_fin:</strong> <br><span id="oc-date_fin"></span></p>
                                                <br><p><strong style="font-size: 15px; color :black" >Value:</strong> <br><span id="oc-value"></span></p>
                                                <br><p><strong style="font-size: 15px; color :black" >Metric:</strong> <br><span id="oc-metric"></span></p>
                                                <br><p><strong style="font-size: 15px; color :black" >Status:</strong> <br><span id="oc-status"></span></p>
                                            </div>
                                    </div> --}}

                                </script>

                               </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
 <script>

    // Quand on clique sur une ligne, afficher les détails dans l'offcanvas
    document.querySelectorAll('.clickable-row').forEach(row => {
        row.addEventListener('click', function () {
            document.getElementById('oc-title').textContent = row.getAttribute('data-title');
            document.getElementById('oc-description').textContent = row.getAttribute('data-description');
            document.getElementById('oc-date_debut').textContent = row.getAttribute('data-date_debut');
            document.getElementById('oc-date_fin').textContent = row.getAttribute('data-date_fin');
            document.getElementById('oc-value').textContent = row.getAttribute('data-value');
            document.getElementById('oc-metric').textContent = row.getAttribute('data-metric');
            document.getElementById('oc-status').textContent = row.getAttribute('data-status');
        });

    });
</script>

</body>

</html>
