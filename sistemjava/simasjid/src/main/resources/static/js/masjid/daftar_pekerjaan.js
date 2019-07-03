var server = "http://localhost:8080"
var rest = server+"/rest";

var mappingDetailPekerjaan = server+"/pekerjaan/detail/";

var getPekerjaanAll = rest+"/pekerjaan/all";
console.log("setup set! at "+rest);

/*$.get(getPekerjaanAll, function(respond){
    /!*<span th:if="${statusPekerjaan} == 0" class="btn link m-b-10 m-l-5" style="color:#9e1317" >Pekerjaan Belum Diverifikasi Ketua Takmir</span>
                            <span th:if="${statusPekerjaan} == 1" class="btn link m-b-10 m-l-5" style="color:#0d71bb" >Pekerjaan Sedang berjalan</span>
                            <span th:if="${statusPekerjaan} == 2" class="btn link m-b-10 m-l-5" style="color:#1A531B" >Pekerjaan Selesai</span>*!/
    console.log("respond : "+respond[0]);
    $("#list-pekerjaan").empty();
    var status0 = '<span class="btn link m-b-10 m-l-5" style="color:#9e1317" >Pekerjaan Belum Diverifikasi</span>';
    var status1 = '<span class="btn link m-b-10 m-l-5" style="color:#0d71bb" >Pekerjaan Sedang berjalan</span>';
    var status2 = '<span class="btn link m-b-10 m-l-5" style="color:#1A531B" >Pekerjaan Selesai</span>';
    for (var i = 0; i < respond.length; i++) {
        console.log(i+". "+respond[i]['namaPekerjaan']);
        var setHtml = '<tr>\n' +
            '<td>'+respond[i]['namaPekerjaan']+'</td>\n' +
            // '<td>'+respond[i]['deskripsi']+'</td>\n' +
            '<td>\n';
        if (respond[i]['idStatus'] == 0)    {
            setHtml+=status0;
        } else if(respond[i]['idStatus'] == 1){
            setHtml+=status1;
        } else {
            setHtml+=status2;
        }
        setHtml +=
            '</td><td><a href="'+mappingDetailPekerjaan+respond[i]['id']+'"><button type="button" class="btn btn-info m-b-10 m-l-5">Lihat</button></a></td>\n' +
            '</tr>';
        // var setHtml = '<tr><td>a</td><td>b</td><td>c</td><td>d</td></tr>';
        $("#list-pekerjaan").append(setHtml);
    }
});*/

function hello() {

}
