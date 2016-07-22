var main = function() {
  "use strict";
  $.get(document.location.pathname.slice(0, document.location.pathname.lastIndexOf(
    "/")) + "/datasrc.php", null, function(data) {
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
        min: 0
      },
      series: {
        lines: {
          show: true,
          lineWidth: 2
        }
      }
    };
    $.plot($("#graph"), graphData, options);
  });
};
$(document).ready(main);
