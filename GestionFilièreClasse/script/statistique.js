$(document).ready(function () {
    function getCountFrom(url, i) {
        $.ajax({
            url: url,
            data: {op: ''},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                $('h2[class="number"]').eq(i).text(data.length);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $('h2[class="number"]').eq(i).text('...');
            }
        });
    }
    getCountFrom('controller/gestionFiliere.php', 0);
    getCountFrom('controller/gestionClasse.php', 1);
    var ctx = document.getElementById('myChart').getContext('2d');
    $.ajax({
        url: 'http://localhost/gestionpointage50/controller/gestionClasse.php',
        data: {op: 'count'},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            var x = Array();
            var y = Array();
            data.forEach(function (e) {
                x.push(e.fil);
                y.push(e.nbr);
            });
            showGraph(x, y);
        },
        error: function (jqXHR, textStatus, errorThrown) {
        }
    });
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
                },
                plugins: {
                    title: {
                        display: true,
                        text: 'Nombre de classe par filière'
                    }
                }
            }
        });
    }
});
