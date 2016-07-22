<?php include('bloks/Head.html');
include('bloks/Menu.html'); ?>

    <div id="contentForm">
      <form id="my_select" method="" action="">
        <table>
          <thead>
            <tr>
              <th width="110px"></th>
              <th></th>
            </tr>
          </thead>
          <tr>
            <td>
              Отобрать:
            </td>
            <td>
              <select id="choseSelect" name="choseSl" size="1">
               <option value="1">Температура</option>
               <option value="2">Дата</option>
              </select>
              <select id="closeSelect" name="closeSl" size="1">
               <option value="1">Близко</option>
               <option value="2">Очень близко</option>
               <option value="3">Отдаленно</option>
              </select>
              к
              <input type="text" name="val">
              <input type = "button" name = "sub" value = "Выбрать" >
            </td>
          </tr>
        </form><br>
      </table>
    </div>

    <div id="dataTable">
    </div>

    <div id="graphDynamic">
    </div>

    <div id="legend">
    </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.flot.js"></script>
    <script type="text/javascript" src="js/tableGraph.js"></script>
<?php include('bloks/Footer.html'); ?>
