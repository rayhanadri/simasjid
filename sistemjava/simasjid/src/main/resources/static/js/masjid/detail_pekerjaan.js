var server = "http://localhost:8080"
var rest = server+"/rest";
var setProgres = rest+"/pekerjaan/simpanprogres/";
var setHapusProgres = rest+"/pekerjaan/hapusDetailNotulensi/";

var mappingDetailPekerjaan = server+"/pekerjaan/detail/";

console.log("setup set! at "+rest);

function hapusProgres(idProgres) {
    console.log("hapus : "+idProgres);
    $.ajax({
        type : "GET",
        contentType : 'application/json; charset=utf-8',
        url : setHapusProgres+idProgres,
        data : JSON.stringify(data),
        success : function(result) {
            console.log("hapus progres ajax : "+result);
            window.location.href=mappingDetailPekerjaan+idPekerjaan.value;
        },
        error: function(e){
            console.log("ERROR: ", e);
        },
        done : function(e) {
            console.log("DONE");
        }
    });
}

function simpanProgres() {
    var data = [];
    var idPekerjaan = document.getElementById("idPekerjaan");
    var contentProgress = document.getElementById("progres");

    var detailProgres = new Object();
    detailProgres.pekerjaan = idPekerjaan.value;
    detailProgres.keterangan = contentProgress.value;

    data.push(detailProgres);
    console.log("added : "+detailProgres.pekerjaan);
    console.log("data : "+data);

    $.ajax({
        type : "POST",
        contentType : 'application/json; charset=utf-8',
        url : setProgres,
        data : JSON.stringify(data),
        success : function(result) {
            console.log("simpan progres ajax : "+result);
            window.location.href=mappingDetailPekerjaan+idPekerjaan.value;
        },
        error: function(e){
            console.log("ERROR: ", e);
        },
        done : function(e) {
            console.log("DONE");
        }
    });


}