<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Your page title here :)</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" type="text/css" href="css/general.css">
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="stylesheet" type="text/css" href="css/skeleton.css">
  <link rel="stylesheet" type="text/css" href="css/admin.css">
  <link rel="stylesheet" type="text/css" href="css/component.css" />
  <link rel="stylesheet" type="text/css" href="css/gridadmin.css" />
  <link rel="stylesheet" type="text/css" href="css/tableStyle.css">

  <!-- JS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script src="js/classie.js"></script>
  <script src="js/general.js"></script>
  <script src="js/table.js"></script>
  <script src="js/suggestBox.js"></script>

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>
  <!-- Side Bar
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <nav class="cbp-spmenu cbp-spmenu-vertical admin-menu minimize" style="background-color:black" id="cbp-spmenu-s1">
    <h1 class="title">Blue</h1>
    <div>
      <img class="menu padding-cons" src="images/ic_assignment_white_36px.svg">
    </div>

    <div>
      <img class="menu padding-cons" src="images/ic_menu_white_36px.svg">
    </div>

    <div>
      <img class="menu padding-cons" src="images/ic_library_add_white_36px.svg">
    </div>
  </nav>

  <!-- Top Nav
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
      <div class="topnav fix" >
        <div class="filterButton services" style="float:right">
          <div class ="dropdown">
          <img class="dropbtn menu" onlick="DropDownAccount(this)" src ="images/ic_account_circle_white_36px.svg">

            <div class="dropdown-content">
              <a href="#">Logout</a>
            </div>
        </div>
      </div>
      </div>

  <!-- Main Thing
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div class="admin-block"id="adminBlock">
  <div class = "container" style="margin-top:56px">
    <div class ="row">
      <div>
        <h4 class ="suggestion">Directory</h4>
          <table class= " table twelve columns company shadow-z-1">
            <thead>
              <tr>
                <th> <input type = "checkbox" id="checkall"></th>
                <th>Company Name</th>
                <th>Suggestor Name</th>
                <th>Date Submitted</th>
                <th>Status</th>
                <th> Edit </th>
                <th> Delete</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="checkbox" class="checkthis" id="checkthis" /></td>
                <td>Padre Pio</td>
                <td>ABC EFG</td>
                <td>06/12/2017</td>
                <td>Viewed</td>
                <td><img id="myBtn" src= "images/ic_mode_edit_black_24px.svg"></td>
                <td><img id="btnAlert"src = "images/ic_delete_black_24px.svg"> </td>
              </tr>
              <tr>
                <td><input type="checkbox" class="checkthis" id ="checkthis" /></td>
                <td>hey</td>
                <td>now</td>
                <td>hey</td>
                <td>now</td>
                <td><img id="myBtn2" src= "images/ic_mode_edit_black_24px.svg"></td>
                <td><img src = "images/ic_delete_black_24px.svg"> </td>
              </tr>
              <tr>
                <td><input type="checkbox" class="checkthis" /></td>
                <td>hey</td>
                <td>now</td>
                <td>hey</td>
                <td>now</td>
                <td><img id="myBtn3" src= "images/ic_mode_edit_black_24px.svg"></td>
                <td><img src = "images/ic_delete_black_24px.svg"> </td>
              </tr>
              <tr>
                <td><input type="checkbox" class="checkthis" /></td>
                <td>hey</td>
                <td>now</td>
                <td>hey</td>
                <td>now</td>
                <td><img id="myBtn4" src= "images/ic_mode_edit_black_24px.svg"></td>
                <td><img src = "images/ic_delete_black_24px.svg"> </td>
              </tr>
              <tr>
                <td><input type="checkbox" class="checkthis" /></td>
                <td>hey</td>
                <td>now</td>
                <td>hey</td>
                <td>now</td>
                <td><img id="myBtn5" src= "images/ic_mode_edit_black_24px.svg"></td>
                <td><img src = "images/ic_delete_black_24px.svg"> </td>
              </tr>
              <tr>
                <td><input type="checkbox" class="checkthis" /></td>
                <td>hey</td>
                <td>now</td>
                <td>hey</td>
                <td>now</td>
                <td><img id="myBtn6" src= "images/ic_mode_edit_black_24px.svg"></td>
                <td><img src = "images/ic_delete_black_24px.svg"> </td>
              </tr>
              <tr>
                <td><input type="checkbox" class="checkthis" /></td>
                <td>hey</td>
                <td>now</td>
                <td>hey</td>
                <td>now</td>
                <td><img id="myBtn7" src= "images/ic_mode_edit_black_24px.svg"></td>
                <td><img src = "images/ic_delete_black_24px.svg"> </td>
              </tr>
              <tr>
                <td><input type="checkbox" class="checkthis" /></td>
                <td>hey</td>
                <td>now</td>
                <td>hey</td>
                <td>now</td>
                <td><img id="myBtn" src= "images/ic_mode_edit_black_24px.svg"></td>
                <td><img src = "images/ic_delete_black_24px.svg"> </td>
              </tr>
              <tr>
                <td><input type="checkbox" class="checkthis" /></td>
                <td>hey</td>
                <td>now</td>
                <td>hey</td>
                <td>now</td>
                <td><img id="myBtn" src= "images/ic_mode_edit_black_24px.svg"></td>
                <td><img src = "images/ic_delete_black_24px.svg"> </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- The Modal -->
      <div id="myModal" class="modal-box">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3> Edit Company Information </h3>
            <form>
                <div class="row">
                  <div class="six columns">
                    <label for="CompanyName">Company Name</label>
                    <input class="u-full-width" type="text"  id="CompanyName">
                  </div>

                  <div class="six columns">
                    <label for="BusinessName">Business Name</label>
                    <input class="u-full-width" type="text"  id="BusinessName">
                  </div>
                </div>
                <div class="row">
                  <div class="six columns">
                    <label for="BusinessType">Type of Business</label>
                    <select class="u-full-width" id="BusinessType">
                      <option value="Venue">Venue</option>
                      <option value="LogisticalEquipment">Logistical Equipment</option>
                      <option value="PrintingShirts">Printing & Shirts</option>
                      <option value="Tents">Tents</option>
                      <option value="CateringServices">Catering Services</option>
                      <option value="Transportation">Transportation</option>
                      <option value="AVEquiptment">AV Equiptment</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                  <div class="six columns">
                    <label for="Contact Person">Contact Person</label>
                    <input class="u-full-width" type="text"  id="contactPerson">
                  </div>
                </div>

                <div class="row">
                  <div class="six columns">
                    <label for="Website">Website</label>
                    <input class="u-full-width" type="text" id="website">
                  </div>

                  <div class="six columns">
                    <label for="Facebook">Facebook Page</label>
                    <input class="u-full-width" type = "text" id="Facebook">
                  </div>
                </div>

                <div class="row">
                  <div class="six columns">
                    <label for="Website">Website</label>
                    <input class="u-full-width" type="text" id="website">
                  </div>

                  <div class="six columns">
                    <label for="Facebook">Facebook Page</label>
                    <input class="u-full-width" type = "text" id="Facebook">
                  </div>
                </div>

                <div class="row">
                  <div class="twelve columns">
                    <label for="Companydescription">Description</label>
                    <textarea class="u-full-width" id="Companydescription"></textarea>
                  </div>
                </div>
                <input class="button-primary submit" type="submit" value="Submit">
                </div>
            </form>
        </div>
  <!--
        <div id="myDelete" class="modal-box"style="display:block">

        Modal content
          <div class="modal-content-alert" >
          <span class="close">&times;</span>
              <h5>Delete This Entry</h5>
              <div class ="alert row"  >
                <img src= "images/ic_warning_white_36px.svg" style="margin-top:10px">
                <h6 style="display:inline-block; margin-left:10px;">Are you sure you want to delete this record?</h6>
              </div>
            </div>
          </div> -->

      </div>
      <div class="center">
        <div class="pagination">
          <a href="#">&laquo;</a>
          <a href="#">1</a>
          <a class="active" href="#">2</a>
          <a href="#">3</a>
          <a href="#">4</a>
          <a href="#">5</a>
          <a href="#">6</a>
          <a href="#">&raquo;</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <script>
    /*
      var menuLeft = document.getElementById( 'cbp-spmenu-s1' )
      var adminMove = document.getElementById( 'adminBlock' )
      var showingT1 = document.getElementById( 'text1' )
      var showingT2 = document.getElementById( 'text2' )
      var showingT3 = document.getElementById( 'text3' )
      var showingTitle1 = document.getElementById( 'title1' )


      function menuToggle(x) {
        classie.toggle( x, 'active' );
        classie.toggle( menuLeft, 'minimize' );
        classie.toggle(adminMove, 'moveAdminBlock');
        classie.toggle(showingT1,'removeText');
        classie.toggle(showingT2,'removeText');
        classie.toggle(showingT3,'removeText');
        showingTitle1.innerHTML = "BP";
      };
      */

      var modal = document.getElementById('myModal');
      var btn = document.getElementById("myBtn");
      var btn2 = document.getElementById("myBtn2");
      var btn3 = document.getElementById("myBtn3");
      var btn4 = document.getElementById("myBtn4");
      var span = document.getElementsByClassName("close")[0];
      btn.onclick = function() {
        modal.style.display = "block";
      }
      btn2.onclick = function() {
        modal.style.display = "block";
      }
      btn3.onclick = function() {
        modal.style.display = "block";
      }
      btn4.onclick = function() {
        modal.style.display = "block";
      }
      span.onclick = function() {
        modal.style.display = "none";
      }
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }

      var popAlert = document.getElementById("myDelete");
      var alertBtn = document.getElementById("btnAlert");

      alertBtn.onclick = function() {
        modal.style.display = "block";
      }

      window.onclick = function(event) {
          if (event.target == popAlert) {
              modal.style.display = "none";
          }
      }


      function DropDownAccount(){
        var x = document.getElementById("Demo");
          if (x.className.indexOf("w3-show") == -1) {
              x.className += " w3-show";
          } else {
        x.className = x.className.replace(" w3-show", "");
    }

      }

      function CheckedAll(x){
        var mainCheckBox = document.getElementsByID('checkall');
        var babyCheckBoxes = document.getElementsByID('checkthis');
     if (x.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
      }
    </script>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
</body>
</html>
