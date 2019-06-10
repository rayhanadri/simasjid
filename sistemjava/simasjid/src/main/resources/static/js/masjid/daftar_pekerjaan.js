var serverController = "http://localhost:8080/pekerjaan/";
var serverRest = "http://localhost:8080/rest/";
console.log("setup set! at "+serverRest);

$.get(serverRest+"pekerjaan/all", function(respond){
    console.log("respond : "+respond[0]);
    for (var i = 0; i < respond.length; i++) {
        console.log(i+". "+respond[i]['namaPekerjaan']);
        var setHtml = '<tr>\n' +
            '<td>'+respond[i]['namaPekerjaan']+'</td>\n' +
            '<td>'+respond[i]['deskripsi']+'</td>\n' +
            '<td>Status Pekerjaan</td>\n' +
            '<td><a href="'+serverController+'detail/'+respond[i]['id']+'"><button type="button" class="btn btn-info m-b-10 m-l-5">Lihat</button></a></td>\n' +
            '</tr>';
        // var setHtml = '<tr><td>a</td><td>b</td><td>c</td><td>d</td></tr>';
        $("#list-pekerjaan").append(setHtml);
    }
});

function hello() {

}
