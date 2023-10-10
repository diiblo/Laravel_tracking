<div class="container-fluid">
    <div class="mb-4 d-sm-flex justify-content-between align-items-center">
        <h3 class="mb-0 text-dark">Tableau de Bord</h3>
        <a class="btn btn-primary btn-sm d-none d-sm-none" role="button" href="#">
            <i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate Report </a>
    </div>
    <div class="row justify-content-center">
        <div class="mb-4 col-md-6 col-xl-3">
            <div class="py-2 shadow card border-start-primary">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="mb-1 text-xs text-uppercase text-danger fw-bold">
                                <span>doc(Archivé)</span>
                            </div>
                            <div class="mb-0 text-dark fw-bold h5">
                                <span>{{ count($archiveDocuments) }}</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-archive fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-4 col-md-6 col-xl-3">
            <div class="py-2 shadow card border-start-success">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="mb-1 text-xs text-uppercase text-success fw-bold">
                                <span>doc(actif)</span>
                            </div>
                            <div class="mb-0 text-dark fw-bold h5">
                                <span>{{ count($actifDocuments) }}</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-file fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-4 col-md-6 col-xl-3">
            <div class="py-2 shadow card border-start-warning">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="mb-1 text-xs text-uppercase text-warning fw-bold">
                                <span>MES DOCUMENTS</span>
                            </div>
                            <div class="mb-0 text-dark fw-bold h5">
                                <span>{{ count($myDocuments) }}</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="text-gray-300 fas fa-sticky-note fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start: Chart -->
    <div class="row">
        <div class="col-12 col-xxl-12">
            <div class="mb-4 shadow card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="m-0 text-primary fw-bold">Statistiques des documents</h6>
                    <div class="dropdown no-arrow">
                        <button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button">
                            <i class="text-gray-400 fas fa-ellipsis-v"></i>
                        </button>
                        <div class="shadow dropdown-menu dropdown-menu-end animated--fade-in">
                            <p class="text-center dropdown-header">dropdown header:</p>
                            <a class="dropdown-item" href="#">&nbsp;Action</a>
                            <a class="dropdown-item" href="#">&nbsp;Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">&nbsp;Something else here</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas data-bss-chart="{&quot;type&quot;:&quot;line&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Jan&quot;,&quot;Feb&quot;,&quot;Mar&quot;,&quot;Apr&quot;,&quot;May&quot;,&quot;Jun&quot;,&quot;Jul&quot;,&quot;Aug&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;Earnings&quot;,&quot;fill&quot;:true,&quot;data&quot;:[&quot;0&quot;,&quot;10000&quot;,&quot;5000&quot;,&quot;15000&quot;,&quot;10000&quot;,&quot;20000&quot;,&quot;15000&quot;,&quot;25000&quot;],&quot;backgroundColor&quot;:&quot;rgba(78, 115, 223, 0.05)&quot;,&quot;borderColor&quot;:&quot;rgba(78, 115, 223, 1)&quot;}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;},&quot;scales&quot;:{&quot;xAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;],&quot;drawOnChartArea&quot;:false},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}],&quot;yAxes&quot;:[{&quot;gridLines&quot;:{&quot;color&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;zeroLineColor&quot;:&quot;rgb(234, 236, 244)&quot;,&quot;drawBorder&quot;:false,&quot;drawTicks&quot;:false,&quot;borderDash&quot;:[&quot;2&quot;],&quot;zeroLineBorderDash&quot;:[&quot;2&quot;]},&quot;ticks&quot;:{&quot;fontColor&quot;:&quot;#858796&quot;,&quot;fontStyle&quot;:&quot;normal&quot;,&quot;padding&quot;:20}}]}}}"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
