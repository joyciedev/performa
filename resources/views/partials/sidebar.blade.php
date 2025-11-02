<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>sidebar</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css')}}">
    <link rel="stylesheet" href="{{ asset('css/merriweather-sans.css')}}">
    <link rel="stylesheet" href="{{ asset('css/sansation.css')}}">
</head>
<body>
        <div class="sidebar">
            <div class="d-flex align-items-center w-100 justify-content-center logo-brand">
                <img src="{{ asset('images/logo.png')}}" width="47px" alt="">
                <h5 class="fw-bold" style="font-size: 2rem">Performa</h5>
            </div>
            <div class="menu-sidebar">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingZero">
                            <a href="dashboard.html" class="accordion-button collapsed no-item active" type="button">
                                Home
                            </a>
                        </h2>
                    </div>

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
                                    <li><a href="user-create-objective.html">Create Objective</a></li>
                                    <li><a href="collaborator-objective.html">Collaborator Objectives</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
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
                                    <li><a href="dashboard-self-evaluation.html">Self Evaluation</a></li>
                                    <li><a href="user-create-collaborator-evaluation.html">Collaborator Evaluations</a></li>
                                    <li><a href="user-history.html">Evaluation History</a></li>
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
                </div><div class="footer">
                <div class="divider"></div>
                <div class="account-info mt-3 mb-3 w-100">
                    <div class="img-account">
                    </div>
                    <div class="info">
                        <h5>John Doe FullName</h5>
                        <p>john.doe@gmail.com</p>
                    </div>
                    <i class="icon-signout ms-auto" style="font-size: 1.5rem; color: #778093"></i>
                </div>
            </div>
        </div>
</body>
</html>
