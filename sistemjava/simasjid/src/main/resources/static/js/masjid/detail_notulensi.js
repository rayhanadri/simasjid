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
    var contentHadirin = document.getElementsByClassName("namaHadirin");

    msg += '*'+namaNotulensi+"*";
    msg += '<br>#('+tanggal+")";
    msg += '<br>#Amir : '+amir;
    msg += '<br>#Notulen : '+notulen;
    msg += '<br>#Peserta :';
    for (index = 0, len = contentHadirin.length; index < len; ++index) {
        msg += '<br>- '+contentHadirin[index].innerHTML;

    }

    var contentProgress = document.getElementsByClassName("progresCopy");
    var contentMasukkan = document.getElementsByClassName("masukkanCopy");
    var contentKeputusan = document.getElementsByClassName("keputusanCopy");
    var contentCatatan = document.getElementsByClassName("catatanCopy");
    msg += '<br><br>*laporan*';
    for (index = 0, len = contentProgress.length; index < len; ++index) {
        msg += '<br>- '+contentProgress[index].innerHTML;
    }
    msg += '<br><br>*usulan*';
    for (index = 0, len = contentProgress.length; index < len; ++index) {
        msg += '<br>- '+contentMasukkan[index].innerHTML;
    }
    msg += '<br><br>*pembahasan*';
    for (index = 0, len = contentProgress.length; index < len; ++index) {
        msg += '<br>- '+contentKeputusan[index].innerHTML;
    }

    msg+='<br><br>catatan tambahan : '+contentCatatan[0].innerHTML;
    console.log('setmsg : \n'+msg);

    var $temp = $("<textarea>");
    var brRegex = /<br\s*[\/]?>/gi;
    $("body").append($temp);
    $temp.val(msg.replace(brRegex, "\r\n")).select();
    document.execCommand("copy");
    $temp.remove();

    window.location.href="whatsapp://send?text=";
}