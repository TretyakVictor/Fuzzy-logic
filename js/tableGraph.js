var main = function() {
  "use strict";
  // var $form = $(this),
  //   $choseSl = $form.find('select[name="choseSl"]'),
  //   $closeSl = $form.find('select[name="closeSl"]'),
  //   $val = $form.find('input[name="val"]');
  var choseSl = $("#choseSelect"),
    closeSl = $('#closeSelect'),
    val = $('input[name="val"]');
  $('input[name="sub"]').on("click", function(event) {
    // console.log("choseSl "+choseSl.val());
    // console.log("closeSl "+closeSl.val());
    // console.log("val "+val.val());
    $('#legend').fadeOut(600);
    $('#dataTable').fadeOut(600, function () {
      $.post(document.location.pathname.slice(0, document.location.pathname.lastIndexOf(
        "/")) + "/scr_tableGraph.php", {
        chose: choseSl.val(),
        close: closeSl.val(),
        val: val.val()
      }, function(data) {
        $('#dataTable').empty().html(data).fadeIn(1000);
      });
    });

    $('#graphDynamic').fadeOut(600, function () {
      $.post(document.location.pathname.slice(0, document.location.pathname.lastIndexOf(
        "/")) + "/sqr_tableDataGraph.php", {
        chose: choseSl.val(),
        close: closeSl.val(),
        val: val.val(),
        label: $('#closeSelect option:selected').text()
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
          series: {
            lines: {
              show: true
            },
            points: {
              show: true
            }
          },
          yaxis: {
            max: 1.02,
            min: 0,
            tickSize: 0.1
          },
          xaxis: {
            tickSize: 0.1
          }
        };
        $('#graphDynamic').fadeIn(1000);
        $('#legend').fadeIn(1000);
        $.plot($("#graphDynamic"), graphData, options);
      });
    });
  });

  // console.log($term.val());
  // $("#choseSelect [value='" + $choseSl.val() + "']").attr("selected", "selected");

  // $('input[name="sub"]').trigger("click");
  // $('#graphDynamic').hide();
};
$(document).ready(main);
