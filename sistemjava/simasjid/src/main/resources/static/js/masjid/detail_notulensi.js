var server = "http://localhost:8080"
var rest = server+"/rest";
var getPekerjaanAll = rest+"/pekerjaan/all";
var setPekerjaanNew = rest+"/pekerjaan/simpan";

var tempIdPekerjaan = 0;

var setNotulensi = rest+"/notulensi/simpan";
var setDetailProgres = rest+"/pekerjaan/simpanprogres";

var mappingDaftarNotulensi = server+"/notulensi/";

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