var server = "http://localhost:8080"
var rest = server+"/rest";
var getPekerjaan = rest+"/pekerjaan/find/";

console.log("setup set! at "+rest);
loadData();

function loadData() {
    var idPekerjaan = $("#idPekerjaan").text();
    $.get(getPekerjaan+idPekerjaan, function(respond){

    });
}
