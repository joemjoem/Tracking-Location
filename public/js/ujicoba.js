// <!-- uji coba javascript -->
setInterval(function() {
  $.getJSON("http://localhost:8080/realtime/statusUser", function(data) {
      $.each(data, function(i, dat) {
        // $("#coba").load("http://localhost:8080/page/realTime");
        // $(coba).load("halo");
        // console.log(data[0]['nama']);
        $('.tbody').load('http://localhost:8080/realtime/statusUser'
        );
      });
    })
  }, 1000);