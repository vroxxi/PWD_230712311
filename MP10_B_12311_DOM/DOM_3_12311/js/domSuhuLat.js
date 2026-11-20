var spanSuhu;
var spanStatus;

function init() {
    spanSuhu = document.getElementById("outputSuhu");
    spanStatus = document.getElementById("statusCuaca");
}

function konversiSuhu(id) {
    var c = parseFloat(document.getElementById(id).value);
    var f = (c * 9 / 5) + 32;

    spanSuhu = document.getElementById("outputSuhu");
    spanStatus = document.getElementById("statusCuaca");

    spanSuhu.firstChild.data = f;

    if (f > 86) {
        spanStatus.firstChild.data = "Panas";
        spanSuhu.style.color = "red";
        spanSuhu.style.fontWeight = "bold";
    } else if (f < 86) {
        spanStatus.firstChild.data = "Sejuk";
        spanSuhu.style.color = "blue";
        spanSuhu.style.fontWeight = "normal";
    } else {
        spanStatus.firstChild.data = "-";
    }
}

function resetForm() {
    document.getElementById("celcius").value = "";

    spanSuhu = document.getElementById("outputSuhu");
    spanStatus = document.getElementById("statusCuaca");

    spanSuhu.firstChild.data = "0";
    spanStatus.firstChild.data = "-";

    spanSuhu.style.color = "black";
    spanSuhu.style.fontWeight = "normal";
}