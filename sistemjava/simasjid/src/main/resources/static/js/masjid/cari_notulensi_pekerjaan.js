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

var getNotulensi = rest+"/notulensi/cariNotulensi";

function data() {
    // var tanggalRange = document.getElementById("tanggalRange").value;
    // console.log("halo there : "+tanggalRange);

    var data = [];
    var tanggal = document.getElementById("tanggalRange").value;
    var pekerjaan = document.getElementById("namaPekerjaan").value;
    var keyword = document.getElementById("keyword").value;
    console.log("tanggal"+tanggal);
    console.log("pekerjaan"+pekerjaan);
    console.log("keyword"+keyword);

    var objectCari = new Object();
    objectCari.tanggal = tanggal;
    objectCari.pekerjaan = pekerjaan;
    objectCari.keyword = keyword;
    data.push(objectCari);

    console.log("added");

    $.ajax({
        type : "POST",
        contentType : 'application/json; charset=utf-8',
        url : getNotulensi,
        data : JSON.stringify(data),
        success : function(result) {
            console.log("Result : "+result);
        },
        error: function(e){
            console.log("ERROR: ", e);
        },
        done : function(e) {
            console.log("DONE");
        }
    });
}