var server = "http://localhost:8080"
var rest = server+"/rest";

var cekUsername = rest+"/anggota/cek/";

function cekUsernameAvailable() {
    var username = document.getElementById("username").value;
    console.log("cek data username : "+username);
    if(username.length >5){
        $("#peringatan2").addClass("hidden");
        $.ajax({
            type : "GET",
            contentType : 'application/json; charset=utf-8',
            url : cekUsername+username,
            success : function(result) {
                console.log("simpan notulensi ajax : "+result);

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
    } else {
        $("#peringatan2").removeClass("hidden");
    }
}

function cekPassword() {
    var password = document.getElementById("password").value;
    console.log("cek data password : "+password);
    if (password.length>5){
        $("#peringatan3").addClass("hidden");
    } else {
        $("#peringatan3").removeClass("hidden");
    }
}