<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['employe'])) {
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.2/chart.min.js" integrity="sha512-dnUg2JxjlVoXHVdSMWDYm2Y5xcIrJg1N+juOuRi0yLVkku/g26rwHwysJDAMwahaDfRpr1AxFz43ktuMPr/l1A==" crossorigin="anonymous"></script>
    <div class="app-content content">
        <div class="content-wrapper">
            <p class="h2 text-center text-dark text-uppercase font-weight-bold">Statistiques</p>
            <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <a href="./index.php?p=filiere" class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--green">
                                <h2 class="number">...</h2>
                                <span class="desc">Filières</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-accounts"></i>
                                </div>
                            </div>
                        </a>
                        <a href="./index.php?p=classe" class="col-md-6 col-lg-3">

                            <div class="statistic__item statistic__item--orange">
                                <h2 class="number">...</h2>
                                <span class="desc">Classes</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-group-work"></i>
                                </div>
                            </div>
                        </a>

                    </div>
                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                            </div>
                            <div class="container">
                            <div class="card-content collapse show">
                        <canvas id="myChart" width="400" height="400"></canvas>
                        <script>
                            var ctx = document.getElementById('myChart').getContext('2d');
                            $.ajax({
                                url: 'http://localhost/GestionFilièreClasse/controller/gestionAdmin.php',
                                data: {op: 'countClasse'},
                                type: 'POST',
                                success: function (data, textStatus, jqXHR) {
                                    var x = Array();
                                    var y = Array();
                                    data.forEach(function (e) {
                                        x.push(e.code_filiere);
                                        y.push(e.nbr_classe);
                                    });
                                    showGraph(x, y);
                                },
                                error: function (jqXHR, textStatus, errorThrown) {

                                }
                            });
                            var z= [
                        'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                        ];
                            function showGraph(x, y) {
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: x,
                                        datasets: [{
                                                data: y,
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    'rgba(54, 162, 235, 0.2)',
                                                    'rgba(255, 206, 86, 0.2)',
                                                    'rgba(75, 192, 192, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    'rgba(255, 159, 64, 0.2)'
                                                ],
                                                borderColor: [
                                                    'rgba(255, 99, 132, 1)',
                                                    'rgba(54, 162, 235, 1)',
                                                    'rgba(255, 206, 86, 1)',
                                                    'rgba(75, 192, 192, 1)',
                                                    'rgba(153, 102, 255, 1)',
                                                    'rgba(255, 159, 64, 1)'
                                                ],
                                                borderWidth: 1
                                            }]
                                    },
                                    options: {
                                        plugins: {
                                            legend: {
                                             position: 'right',
                                             labels:{
                                             generateLabels : function(chart){
                                             return chart.data.labels.map(function(label,i){
                                             return {
                                             text: label,
                                             fillStyle: z[i]
                                             };
                                             });
                                             }
                                             }
                                             },
                                            title: {
                                                display: true,
                                                text: 'Nombre de classes par filière'
                                            }
                                        },
                                        scales: {
                                            y: {
                                                title: {
                                                    display: true,
                                                    text: 'Nombre de classes'
                                                }
                                            },
                                            x: {
                                                title: {
                                                    display: true,
                                                    text: 'Filière'
                                                }
                                            }
                                        }
                                    }
                                });
                            }
                        </script>
                    </div>
                            </div>
</div>
                </div>
                    </div>
            </section>
</div>
                </div>
    <script src="script/statistique.js" type="text/javascript"></script>
    <script src="../jquery-ui.min.js" type="text/javascript"></script>
    <?php

} else {
    header("Location: ../index.php");
}
?>