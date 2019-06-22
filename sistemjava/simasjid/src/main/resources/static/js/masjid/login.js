var server = "http://localhost:8080"
var rest = server+"/rest";

var cekUsername = rest+"/anggota/cekActive/";

function cekUsernameActive() {
    var username = document.getElementById("username").value;
    $.ajax({
        type : "GET",
        contentType : 'application/json; charset=utf-8',
        url : cekUsername+username,
        success : function(result) {
            if (result=="0"){
                $("#peringatan").removeClass("hidden");
                $("#tombol-kirim").addClass("hidden");
            } else {
                $("#peringatan").addClass("hidden");
                $("#tombol-kirim").removeClass("hidden");
            }
        },
        error: function(e){
            console.log("ERROR: ", e);
        },
        done : function(e) {
            console.log("DONE");
        }
    });
}