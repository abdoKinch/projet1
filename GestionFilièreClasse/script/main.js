/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {
    var main = $('#main-content');
    var doc = $(this);
    var email = $("#email");
    var password = $("#password");
    var check = $("#checkLogin");
    var btn = $("#connect");
    email.val('');
    password.val('');
    $(".filiere").click(function () {
        main.load("./pages/filiere.php");
    });
    $(".classe").click(function () {
        main.load("./pages/classe.php");
    });
    $(".employe").click(function () {
        main.load("./pages/admin.php");
    });
    $(".statistiques").click(function () {
        main.load("../pages/statistiques.php");
    });

    $(document).keypress(function (e) {
        if (e.which == 13) {
            btn.click();
        }
    });
    function redirect(data) {
        $.ajax({
            url: './login.php',
            data: {email: data.email, admin: data.cin, nom: data.nom},
            type: 'POST',
            success: function (data, textStatus, jqXHR) {
                location.href = './index.php';
            },
            error: function (jqXHR, textStatus, errorThrown) {
            }
        });
    }
});
