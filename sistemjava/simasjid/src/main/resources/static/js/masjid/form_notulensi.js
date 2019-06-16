var server = "http://localhost:8080"
var rest = server+"/rest";
var getPekerjaanAll = rest+"/pekerjaan/all";
var setPekerjaanNew = rest+"/pekerjaan/simpan";

var tempIdPekerjaan = 0;

var setNotulensi = rest+"/notulensi/simpan";
var setDetailProgres = rest+"/pekerjaan/simpanprogres";

var mappingDaftarNotulensi = server+"/notulensi/";

//Autoload
getPekerjaanList();

function copyToClipboard(element) {
    var $temp = $("<textarea>");
    var brRegex = /<br\s*[\/]?>/gi;
    $("body").append($temp);
    $temp.val($(element).html().replace(brRegex, "\r\n")).select();
    document.execCommand("copy");
    $temp.remove();
}

$( "#FailCopy" ).click(function() {
    alert("Berhasil dicopy!");
});

function myFunction() {
    var brRegex = /<br\s*[\/]?>/gi;
    var copyText = document.getElementById("pwd_spn");
    var textArea = document.createElement("textarea");
    textArea.value = copyText.textContent;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand("Copy");
    textArea.remove();
}

function tambahPekerjaanBaru() {
    var myObject = new Object();
    if(document.getElementById("namaProgress").value != "" && document.getElementById("deskripsiProgress").value != "" &&
        document.getElementById("namaPenanggungJawab").value != ""){
        myObject.namaPekerjaan = document.getElementById("namaProgress").value;
        myObject.deskripsi = document.getElementById("deskripsiProgress").value;
        myObject.anggota = document.getElementById("namaPenanggungJawab").value;
        myObject.idStatus = "0";
        myObject.aktif = 1;
        var data = JSON.stringify(myObject);
        console.log("data : "+data);

        $.ajax({
            type : "POST",
            contentType : 'application/json; charset=utf-8',
            url : setPekerjaanNew,
            data : JSON.stringify(myObject),
            success : function(result) {
                console.log("SUCCESS: ", result);
                getPekerjaanList();
                $("#profile2").removeClass("active");
                $("#tabTambah").removeClass("active");
                $("#home2").addClass("active");
                $("#tabPekerjaan").addClass("active");

                document.getElementById("namaProgress").value = "";
                document.getElementById("deskripsiProgress").value = "";
                document.getElementById("namaPenanggungJawab").value = "";
            },
            error: function(e){
                console.log("ERROR: ", e);
            },
            done : function(e) {
                console.log("DONE");
            }
        });
    } else {
        console.log("data kosong");
    }
}

function getPekerjaanList() {
    $("#optionProgress").empty();
    $('#optionProgress').append($('<option/>', {
        value: "",
        text : "Pilih Laporan"
    }));
    $.get(getPekerjaanAll, function(respond){
        for (var i = 0; i < respond.length; i++) {
            // console.log(i+". "+respond[i]['namaPekerjaan']);
            $('#optionProgress').append($('<option/>', {
                value: respond[i]['id'],
                text : respond[i]['namaPekerjaan']
            }));
        }
    });
}

function tambahProgres(){
    if(document.getElementById("optionProgress").value == ""){
        var namaProgress = document.getElementById("namaProgress").value;
        document.getElementById("namaProgress").value = "";
        tambahCard(namaProgress,0);

    } else {
        var data = document.getElementById("optionProgress");
        var idPekerjaan = data.value;
        var namaProgres = data.options[data.selectedIndex].text;
        console.log(idPekerjaan);
        tambahCard(namaProgres,idPekerjaan);
        document.getElementById("namaProgress").value = "";
        document.getElementById("optionProgress").value = "";
    }
}

function tambahCard(namaProgress,idPekerjaan){
    var sethtml = '<div class="card cardprogres'+tempIdPekerjaan+'" style=""><div class="card-body"><h5 class="card-title">'+namaProgress+'</h5><input type="text" id="idPekerjaan[]" class="idPekerjaan" name="idPekerjaan[]" value='+idPekerjaan+' hidden><input type="text" id="namaProgress[]" name="namaProgress[]" value="'+namaProgress+'" hidden><textarea id="progres[]" name="progres[]" onkeyup="tambahKeterangan('+tempIdPekerjaan+', 0)" class="form-control progres" aria-label="With textarea"></textarea><br><p class="text-danger" onclick="hapusProgres('+tempIdPekerjaan+')" style="float:left">hapus</p><p onclick="resetKeterangan('+tempIdPekerjaan+',0)" style="float:right" class="text-warning col-sx-6">Reset</p></div></div>'
    $("#kolomProgres").append(sethtml);
    autosize(document.getElementsByClassName('progres'+tempIdPekerjaan));
    var sethtml = '<div class="card cardprogres'+tempIdPekerjaan+'" style=""><div class="card-body"><h5 class="card-title">'+namaProgress+'</h5><p id="kontendariprogres'+tempIdPekerjaan+'" class="kontendariprogres'+tempIdPekerjaan+'"></p><textarea id="masukkan[]" name="masukkan[]"  onkeyup="tambahKeterangan('+tempIdPekerjaan+', 1)" class="form-control masukkan" aria-label="With textarea"></textarea><br><p onclick="resetKeterangan('+tempIdPekerjaan+',1)" style="float:right" class="text-warning col-sx-6">Reset</p></div></div>'
    $("#kolomMasukkan").append(sethtml);
    autosize(document.getElementsByClassName('kontendariprogres'+tempIdPekerjaan));
    var sethtml = '<div class="card cardprogres'+tempIdPekerjaan+'" style=""><div class="card-body"><h5 class="card-title">'+namaProgress+'</h5><p id="kontendarimasukkan'+tempIdPekerjaan+'" class="kontendarimasukkan'+tempIdPekerjaan+'"></p><textarea id="keputusan[]" name="keputusan[]" onkeyup="tambahKeterangan('+tempIdPekerjaan+', 2)" class="form-control keputusan" aria-label="With textarea"></textarea><br><p onclick="resetKeterangan('+tempIdPekerjaan+',2)" style="float:right" class="text-warning col-sx-6">Reset</p></div></div>'
    $("#kolomKeputusan").append(sethtml);
    autosize(document.getElementsByClassName('kontendarimasukkan'+tempIdPekerjaan));

    var sethtml = '<div class="bd-callout bd-callout-warning cardprogres'+tempIdPekerjaan+'"><h3 id="conveying-meaning-to-assistive-technologies">'+namaProgress+'</h3><p id="hasilkontendariprogres'+tempIdPekerjaan+'" class="hasilkontendariprogres'+tempIdPekerjaan+'"></p><h6 id="conveying-meaning-to-assistive-technologies">Keputusan </h6><p id="hasilkontendarimasukkan'+tempIdPekerjaan+'" class="hasilkontendarimasukkan'+tempIdPekerjaan+'"></p></div>';
    $("#hasil").append(sethtml);
    ++tempIdPekerjaan;
}

function tambahInfo(){
    $("#cttn").remove();
    var dataCttn = document.getElementById("catatanTbmhn").value;
    var sethtml = '<div id="cttn" class="bd-callout bd-callout-warning"><h3 id="conveying-meaning-to-assistive-technologies"></h3><h6 id="conveying-meaning-to-assistive-technologies">Catatan Tambahan</h6><p>'+dataCttn+'</p></div>';
    $("#hasil").append(sethtml);
}

function tambahKeterangan(nilai, keputusan){
    console.log('id : '+ nilai + '. keputusan -> '+ keputusan);
    if(keputusan == 0) {
        var contentProgress = document.getElementsByClassName("progres");
        console.log(contentProgress[nilai].value);
        var sethtml = ''+contentProgress[nilai].value;

        $(".kontendariprogres"+nilai).empty();
        $(".kontendariprogres"+nilai).append(sethtml);
        $(".hasilkontendariprogres"+nilai).empty();
        $(".hasilkontendariprogres"+nilai).append(sethtml);
    } else if(keputusan == 1){
        var contentProgress1 = document.getElementsByClassName("progres");
        console.log(contentProgress1[nilai].value);
        var contentProgress2 = document.getElementsByClassName("masukkan");
        var sethtml = '<i class="fa fa-comment-o" aria-hidden="true"></i> : '+contentProgress1[nilai].value+'<br><i class="fa fa-comments-o" aria-hidden="true"></i> : '+contentProgress2[nilai].value;

        $(".kontendarimasukkan"+nilai).empty();
        $(".kontendarimasukkan"+nilai).append(sethtml);
        $(".hasilkontendariprogres"+nilai).empty();
        $(".hasilkontendariprogres"+nilai).append(sethtml);
    } else {
        var contentKeputusan = document.getElementsByClassName("keputusan");
        console.log(contentKeputusan[nilai].value);
        var sethtml = ''+contentKeputusan[nilai].value;
        $(".hasilkontendarimasukkan"+nilai).empty();
        $(".hasilkontendarimasukkan"+nilai).append(sethtml);
    }
    setMsg();
}

function getName(text){
    var str = text;
    var res = str.split("%");
    return res[1];
}

function setMsg(){
    var notulen = "";
    var amir = "";
    notulen = $("#namaNotulen").children(":selected").attr("id");
    amir = $("#namaAmir").children(":selected").attr("id");
    // var notulen = getName(document.getElementById("namaNotulen").value);
    // var amir = getName(document.getElementById("namaAmir").value);
    // var hadirin = getName(document.getElementById("namaHadirin").value);

    var index, len, msg = '';
    msg += 'Musyawarah Masjid 06 Apr 2019';
    msg += '<br>Amir : '+notulen;
    msg += '<br>Notulen : '+amir;
    msg += '<br><br>Hasil Kegiatan Musyawarah';

    var contentProgress = document.getElementsByClassName("progres");
    var contentMasukkan = document.getElementsByClassName("masukkan");
    var contentKeputusan = document.getElementsByClassName("keputusan");

    for (index = 0, len = contentProgress.length; index < len; ++index) {
        msg += '<br>'+(index+1)+'. laporan : '+contentProgress[index].value;
        msg += '<br>masukkan : '+contentMasukkan[index].value;
        msg += '<br>keputusan : '+contentKeputusan[index].value;
        console.log('setmsg : '+msg);
    }
    $("#error-details").empty();
    $("#error-details").append(msg);

}

function resetKeterangan(idPekerjaan, keputusan){
    var contentProgress = document.getElementsByClassName("progres");
    var contentMasukkan = document.getElementsByClassName("masukkan");
    var contentKeputusan = document.getElementsByClassName("keputusan");
    if(keputusan == 0) {
        contentProgress[idPekerjaan].value = "";
    } else if(keputusan == 1){
        contentMasukkan[idPekerjaan].value = "";
    } else {
        contentKeputusan[idPekerjaan].value = "";
    }
    tambahKeterangan(idPekerjaan,keputusan);
}

function hapusProgres(idPekerjaan) {
    console.log("tes hapus "+idPekerjaan);
    $(".cardprogres"+idPekerjaan).hide();

    // $(".cardprogres"+idPekerjaan).addClass("hidden");
    var contentProgress = document.getElementsByClassName("progres");
    var contentMasukkan = document.getElementsByClassName("masukkan");
    var contentKeputusan = document.getElementsByClassName("keputusan");
    contentProgress[idPekerjaan].value = "";
    contentMasukkan[idPekerjaan].value = "";
    contentKeputusan[idPekerjaan].value = "";
}

function simpanNotulensi() {
    //kirim notulennya, ambil id notulen
    var namaMusyawarah = document.getElementById("namaMusyawarah");
    var notulen = document.getElementById("namaNotulen");
    var amir = document.getElementById("namaAmir");
    var catatan = document.getElementById("catatanTbmhn");

    var notulensi = new Object();
    notulensi.namaMusyawarah = namaMusyawarah.value;
    notulensi.idAmir = amir.value;
    notulensi.idNotulen = notulen.value;
    notulensi.catatan = catatan.value;
    notulensi.idStatus = 0;
    $.ajax({
        type : "POST",
        contentType : 'application/json; charset=utf-8',
        url : setNotulensi,
        data : JSON.stringify(notulensi),
        success : function(result) {
            console.log("simpan notulensi ajax : "+result);
            simpanProgres(result);
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

function simpanProgres(idNotulensi) {
    var data = [];
    var idPekerjaan = document.getElementsByClassName("idPekerjaan");
    var contentProgress = document.getElementsByClassName("progres");
    var contentMasukkan = document.getElementsByClassName("masukkan");
    var contentKeputusan = document.getElementsByClassName("keputusan");

    for (index = 0, len = contentProgress.length; index < len; ++index) {
        if(contentProgress[index].value != ""){
            var detailProgres = new Object();
            detailProgres.keterangan = contentProgress[index].value;
            detailProgres.keputusan = contentKeputusan[index].value;
            detailProgres.pekerjaan = idPekerjaan[index].value;
            detailProgres.notulensi = idNotulensi;
            data.push(detailProgres);
            console.log("added : "+detailProgres);
        }
    }
    console.log("data : "+data);
    $.ajax({
        type : "POST",
        contentType : 'application/json; charset=utf-8',
        url : setDetailProgres,
        data : JSON.stringify(data),
        success : function(result) {
            console.log("simpan progres ajax : "+result);
            window.location.href=mappingDaftarNotulensi+idNotulensi;
        },
        error: function(e){
            console.log("ERROR: ", e);
        },
        done : function(e) {
            console.log("DONE");
        }
    });


}