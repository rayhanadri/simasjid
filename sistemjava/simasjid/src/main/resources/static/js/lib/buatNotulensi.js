function halo() {
    console.log("halo");
}

var tempIdPekerjaan = 0;

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

function tambahProgres(){
    if(document.getElementById("optionProgress").value == ""){
        var namaProgress = document.getElementById("namaProgress").value;
        document.getElementById("namaProgress").value = "";
        tambahCard(namaProgress,0);

    } else {
        var data = document.getElementById("optionProgress");
        var idProgres = data.value;
        var namaProgres = data.options[data.selectedIndex].text;
        console.log(idProgres);
        tambahCard(namaProgres,idProgres);
        document.getElementById("namaProgress").value = "";
        document.getElementById("optionProgress").value = "";
    }
}

function tambahCard(namaProgress,idProgress){
    var sethtml = '<br><div class="card" style=""><div class="card-body"><h5 class="card-title">'+namaProgress+'</h5><input type="text" id="idProgress[]" name="idProgress[]" value='+idProgress+' hidden><input type="text" id="namaProgress[]" name="namaProgress[]" value="'+namaProgress+'" hidden><textarea id="progres[]" name="progres[]" onchange="tambahKeterangan('+tempIdPekerjaan+', 0)" class="form-control progres" aria-label="With textarea"></textarea><br><p class="text-danger" style="float:left">hapus</p><p onclick="resetKeterangan('+tempIdPekerjaan+',0)" style="float:right" class="text-warning col-sx-6">Reset</p></div></div>'
    $("#kolomProgres").append(sethtml);
    autosize(document.getElementsByClassName('progres'+tempIdPekerjaan));
    var sethtml = '<br><div class="card" style=""><div class="card-body"><h5 class="card-title">'+namaProgress+'</h5><p id="kontendariprogres'+tempIdPekerjaan+'" class="kontendariprogres'+tempIdPekerjaan+'"></p><textarea id="masukkan[]" name="masukkan[]"  onchange="tambahKeterangan('+tempIdPekerjaan+', 1)" class="form-control masukkan" aria-label="With textarea"></textarea><br><p onclick="resetKeterangan('+tempIdPekerjaan+',1)" style="float:right" class="text-warning col-sx-6">Reset</p></div></div>'
    $("#kolomMasukkan").append(sethtml);
    autosize(document.getElementsByClassName('kontendariprogres'+tempIdPekerjaan));
    var sethtml = '<br><div class="card" style=""><div class="card-body"><h5 class="card-title">'+namaProgress+'</h5><p id="kontendarimasukkan'+tempIdPekerjaan+'" class="kontendarimasukkan'+tempIdPekerjaan+'"></p><textarea id="keputusan[]" name="keputusan[]" onchange="tambahKeterangan('+tempIdPekerjaan+', 2)" class="form-control keputusan" aria-label="With textarea"></textarea><br><p onclick="resetKeterangan('+tempIdPekerjaan+',2)" style="float:right" class="text-warning col-sx-6">Reset</p></div></div>'
    $("#kolomKeputusan").append(sethtml);
    autosize(document.getElementsByClassName('kontendarimasukkan'+tempIdPekerjaan));

    var sethtml = '<div class="bd-callout bd-callout-warning"><h3 id="conveying-meaning-to-assistive-technologies">'+namaProgress+'</h3><p id="hasilkontendariprogres'+tempIdPekerjaan+'" class="hasilkontendariprogres'+tempIdPekerjaan+'"></p><h6 id="conveying-meaning-to-assistive-technologies">Keputusan </h6><p id="hasilkontendarimasukkan'+tempIdPekerjaan+'" class="hasilkontendarimasukkan'+tempIdPekerjaan+'"></p></div>';
    $("#hasil").append(sethtml);
    ++tempIdPekerjaan;
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

function resetKeterangan(nilai, keputusan){
    if(keputusan == 0) {
        document.getElementsByClassName("progres"+nilai).value = "";
    } else if(keputusan == 1){
        document.getElementsByClassName("masukkan"+nilai).value = "";
    } else {
        document.getElementsByClassName("keputusan"+nilai).value = "";
    }
    tambahKeterangan(nilai,keputusan);
}
