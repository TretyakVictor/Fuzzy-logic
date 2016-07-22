var main = function() {
  "use strict";
  var $form = $(this),
    $term = $form.find('select[name="sort"]');

  $('input[name="sub"]').on("click", function(event) {
    // console.log("klic");
    $('#legend').fadeOut(600);
    $('#dataTable').fadeOut(600, function () {
      $.post(document.location.pathname.slice(0, document.location.pathname.lastIndexOf(
        "/")) + "/scr_table.php", {
        sort: $term.val()
      }, function(data) {
        $('#dataTable').empty().html(data).fadeIn(1000);
      });
    });

    $('#graphDynamic').fadeOut(600, function () {
      // $('#legend').hide();
      $.post(document.location.pathname.slice(0, document.location.pathname.lastIndexOf(
        "/")) + "/sqr_tableData.php", {
        flag: $term.val()
      }, function(data) {
        var graphData = eval("(" + data + ")");
        var options = {
          legend: {
            show: true,
            noColumns: 5,
            container: $("#legend")
          },
          grid: {
            backgroundColor: {
              colors: ["#363636", "#282828"]
            }
          },
          yaxis: {
            max: 1,
            min: 0,
            tickSize: 0.1
          },
          xaxis: {
            tickSize: 1
          },
          series: {
            lines: {
              show: true,
              lineWidth: 2
            }
          }
        };
        $('#graphDynamic').fadeIn(1000);
        $('#legend').fadeIn(1000);
        $.plot($("#graphDynamic"), graphData, options);
      });
    });
  });
  // $('input[name="sub"]').trigger("click");
};
$(document).ready(main);
