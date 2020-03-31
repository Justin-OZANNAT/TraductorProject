$(document).ready(function() {
    let cpt = 0;
    document.getElementById("cpt").innerHTML = "Compteur = " + cpt + " / 5";


    $('.bravo').hide();
    $(".check_btn").hide();
    $(".bdd2").hide();
    $(".card2").hide();
    $(".card").click(function() {
        $(".check_btn").fadeIn(500);
        $(".card").hide();
        $(".card2").fadeIn(1500);
        $(".bdd2").fadeIn(500);
        $(".bdd1").hide();
        $("h1").hide();
    });
    $(".card2").click(function() {
        $("h1").fadeIn(500);
        $(".check_btn").hide();
        $(".bdd2").hide();
        $(".bdd1").fadeIn(1500);
        $(".card2").hide();
        $(".card").fadeIn(1500);
        document.getElementById("cpt").innerHTML = "Compteur = " + ++cpt + " / 5";
        $('.bravo').hide();
        if (cpt >= 5){
            cpt = -1;
        }
    });

    // if ($('#checkbox').attr('checked')){
    //     ++cpt;
    //     alert("I am an alert box!");
    // }
});
