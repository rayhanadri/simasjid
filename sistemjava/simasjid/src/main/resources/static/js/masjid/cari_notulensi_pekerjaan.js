$( function() {
    var dateFormat = "mm/dd/yy",
        from = $( "#from" )
            .datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 3
            })
            .on( "change", function() {
                to.datepicker( "option", "minDate", getDate( this ) );
            }),
        to = $( "#to" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 3
        })
            .on( "change", function() {
                from.datepicker( "option", "maxDate", getDate( this ) );
            });

    function getDate( element ) {
        var date;
        try {
            date = $.datepicker.parseDate( dateFormat, element.value );
        } catch( error ) {
            date = null;
        }

        return date;
    }
} );

var server = "http://localhost:8080"
var rest = server+"/rest";

var getNotulensi = rest+"/notulensi/cari/";
var mappingDetailNotulensi = server+"/notulensi/detail/";

function cari() {
    // var tanggalRange = document.getElementById("tanggalRange").value;
    // console.log("halo there : "+tanggalRange);

    var data = "";
    var tanggal = document.getElementById("tanggalRange").value;
    var pekerjaan = document.getElementById("namaPekerjaan").value;
    var keyword = document.getElementById("keyword").value;
    console.log("tanggal"+tanggal);
    console.log("pekerjaan"+pekerjaan);
    console.log("keyword"+keyword);

    // 18/11/2019 - 11/11/2009
    var replacedSpace = tanggal.split(' ').join('');
    var replacedfinal = replacedSpace.split('/').join('_');

    if(tanggal.length > 0){
        tanggal = replacedfinal;
    } else {
        tanggal = "-";
    }

    if (pekerjaan == ""){
       pekerjaan = "-"
    }

    if (keyword.length == 0){
        keyword = "-"
    }

    data = tanggal+"/"+pekerjaan+"/"+keyword;
    console.log("link : "+getNotulensi+data);
    $.ajax({
        type : "GET",
        contentType : 'application/json; charset=utf-8',
        url : getNotulensi+data,
        success : function(result) {
            console.log("result : "+result);
            $("#list-notulensi").empty();
            for (var i = 0; i < result.length; i++) {
                var idNotulensi = result[i]['id'];
                var keyword = result[i]['keyword'];
                if (keyword == null){
                    keyword = "-";
                }
                var setHtml = '<tr>\n' +
                    '<td>'+result[i]['convertedDate']+'</td>\n' +
                    '<td>'+result[i]['namaMusyawarah']+'</td>\n' +
                    '<td>'+keyword+'</td>\n' +
                    '<td>\n'+
                    '<a href="'+mappingDetailNotulensi+idNotulensi+'" class="btn btn-info btn-block">Lihat</a>\n' +
                    '</td>\n' +
                    '</tr>'
                $("#list-notulensi").append(setHtml);
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