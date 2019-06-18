var server = "http://localhost:8080"
var rest = server+"/rest";

var setKomentarBaru = rest+"/notulensi/simpanKomentar";
var mappingDetailNotulensi = server+"/notulensi/detail/";

function setKomentar() {
    var idNotulensi = document.getElementById("notulensiKomentar").value;
    var idAnggota = document.getElementById("anggotaKomentar").value;
    var keterangan = document.getElementById("keteranganKomentar").value;

    var komentar = new Object();
    komentar.notulensi = idNotulensi;
    komentar.anggota = idAnggota;
    komentar.keterangan = keterangan;

    $.ajax({
        type : "POST",
        contentType : 'application/json; charset=utf-8',
        url : setKomentarBaru,
        data : JSON.stringify(komentar),
        success : function(result) {
            console.log("simpan notulensi ajax : "+result);
            window.location.href=mappingDetailNotulensi+idNotulensi;
        },
        error: function(e){
            console.log("ERROR: ", e);
        },
        done : function(e) {
            console.log("DONE");
        }
    });
    //kirim detail progresnya, jangan lupa masukkin id notulen
}

function setMsg(){
    console.log("set msg");
    var namaNotulensi = document.getElementById("namaNotulensi").value;
    var notulen = document.getElementById("namaNotulen").value;
    var amir = document.getElementById("namaAmir").value;
    var tanggal = document.getElementById("tanggalNotulensi").innerHTML;


    var index, len, msg = '';
    msg += '# '+namaNotulensi+" #";
    msg += '<br>('+tanggal+")";
    msg += '<br>Amir : '+notulen;
    msg += '<br>Notulen : '+amir;
    msg += '<br><br>Hasil Kegiatan Musyawarah';

    var contentProgress = document.getElementsByClassName("progresCopy");
    var contentKeputusan = document.getElementsByClassName("keputusanCopy");
    var contentCatatan = document.getElementsByClassName("catatanCopy");

    for (index = 0, len = contentProgress.length; index < len; ++index) {
        msg += '<br>'+(index+1)+'. laporan : '+contentProgress[index].innerHTML;
        msg += '<br><br>keputusan : '+contentKeputusan[index].innerHTML;
    }
    msg+='<br>catatan tambahan : '+contentCatatan[0].innerHTML;
    console.log('setmsg : \n'+msg);

    var $temp = $("<textarea>");
    var brRegex = /<br\s*[\/]?>/gi;
    $("body").append($temp);
    $temp.val(msg.replace(brRegex, "\r\n")).select();
    document.execCommand("copy");
    $temp.remove();

    window.location.href="whatsapp://send?text=";
}