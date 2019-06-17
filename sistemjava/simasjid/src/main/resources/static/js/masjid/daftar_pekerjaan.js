var server = "http://localhost:8080"
var rest = server+"/rest";

var mappingDetailPekerjaan = server+"/pekerjaan/detail/";

var getPekerjaanAll = rest+"/pekerjaan/all";
console.log("setup set! at "+rest);

$.get(getPekerjaanAll, function(respond){
    console.log("respond : "+respond[0]);
    for (var i = 0; i < respond.length; i++) {
        console.log(i+". "+respond[i]['namaPekerjaan']);
        var setHtml = '<tr>\n' +
            '<td>'+respond[i]['namaPekerjaan']+'</td>\n' +
            // '<td>'+respond[i]['deskripsi']+'</td>\n' +
            '<td>Status Pekerjaan</td>\n' +
            '<td><a href="'+mappingDetailPekerjaan+respond[i]['id']+'"><button type="button" class="btn btn-info m-b-10 m-l-5">Lihat</button></a></td>\n' +
            '</tr>';
        // var setHtml = '<tr><td>a</td><td>b</td><td>c</td><td>d</td></tr>';
        $("#list-pekerjaan").append(setHtml);
    }
});

function hello() {

}
