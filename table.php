<?php include('bloks/Head.html');
include('bloks/Menu.html'); ?>
    <!-- <div id="legend">
    </div> -->
    <!-- <div id="graphDynamic">
    </div>
    <div id="legend">
    </div> -->

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
              Температура:
            </td>
            <td>
              <select id="my_select" name="sort" size="1">
               <option value="1">Вся</option>
               <option value="2">Очень низкая</option>
               <option value="3">Низкая</option>
               <option value="4">Нормальная</option>
               <option value="5">Повышенная</option>
               <option value="6">Высокая</option>
               <option value="7">Очень высокая</option>
              </select>

              <!-- <option
               <?php if (isset($_POST['sort']) and $_POST['sort'] == 1): ?>selected="selected"<?php endif; ?>
              value="1">Вся</option>
              <option
               <?php if (isset($_POST['sort']) and $_POST['sort'] == 2): ?>selected="selected"<?php endif; ?>
              value="2">Очень низкая</option>
              <option
               <?php if (isset($_POST['sort']) and $_POST['sort'] == 3): ?>selected="selected"<?php endif; ?>
              value="3">Низкая</option>
              <option
               <?php if (isset($_POST['sort']) and $_POST['sort'] == 4): ?>selected="selected"<?php endif; ?>
              value="4">Нормальная</option>
              <option
               <?php if (isset($_POST['sort']) and $_POST['sort'] == 5): ?>selected="selected"<?php endif; ?>
              value="5">Повышенная</option>
              <option
               <?php if (isset($_POST['sort']) and $_POST['sort'] == 6): ?>selected="selected"<?php endif; ?>
              value="6">Высокая</option>
              <option
               <?php if (isset($_POST['sort']) and $_POST['sort'] == 7): ?>selected="selected"<?php endif; ?>
              value="7">Очень высокая</option>
             </select> -->
              <input type = "button" name = "sub" value = "Отобразить" >
            </td>
          </tr>
        </form><br>
      </table><br>
    </div>
    <div id="graphDynamic">
    </div>
    <div id="legend">
    </div>
    <div id="dataTable">

    </div>
<!-- <?php include('scr_table.php'); ?> -->


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.flot.js"></script>
    <script type="text/javascript" src="js/table.js"></script>
<?php include('bloks/Footer.html'); ?>
