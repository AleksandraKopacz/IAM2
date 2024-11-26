<?php
if (!isset($_SESSION))
  session_start();
include $conf->root_path . '/view/header.php';
?>

<style>
  .red {
    color: red !important;
  }
</style>

<div class="container">
  <div class="col-lg-10 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1">

    <div class="row">
      <!-- Blog Post Content Column -->
      <div class="col-lg-8">
        <!-- Blog Post -->
        <!-- Title -->
        <h1>Blog Post Title</h1>

        <hr>
        <!-- Date/Time -->
        <p>
          <span class="glyphicon glyphicon-time"></span>
          Posted on August 24, 2013 at 9:00 PM
        </p>
        <hr>
        <!-- Preview Image -->
        <img class="img-responsive" src="http://placehold.it/900x300" alt="">
        <hr>
        <!-- Post Content -->
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error
          quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus
          inventore?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste
          ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.
        </p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius
          illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!
        </p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat
          totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam
          tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui,
          necessitatibus, est!</p>
        <hr>
        <!-- Blog Comments -->
        <!-- Comments Form -->
        <div>
          <h4>Napisz komentarz:</h4>
          <form id="form">
            <div class="form-group">
              <label>Wiadomość</label>
              <textarea id="msg" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label>Autor</label>
              <input type="text" placeholder="Podaj swoje imię lub pseudonim" id="nick" class="form-control">
            </div>
            <div class="alert alert-danger" id="msg_brak" role="alert"><strong>Błąd!</strong> Nie wypełniono wszystkich
              pól.</div>
            <button id="btn" type="submit" class="btn btn-primary">Wyślij</button>
          </form>
        </div>
        <hr>
        <!-- Posted Comments -->
        <!-- Comment -->
        <div id="comm">

          <div class="media" id="0">
            <a class="pull-left" href="#0">
              <img class="media-object" src='https://www.shareicon.net/data/256x256/2016/07/05/791221_man_512x512.png' width='64' height='64' alt="">
            </a>
            <div class="media-body">
              <h4 class="media-heading">
                Test

                <small>01 stycznia 2015</small> <button onclick="deleteComm(0)" class="btn btn-danger">Usuń</button>
              </h4>

              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras
              purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
              fringilla. Donec lacinia congue felis in faucibus.

            </div>
          </div>
        </div>



      </div>



    </div>
  </div>

</div>
</div>

<script>

  function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
  }
  function isPhone(phone) {
    var regex = /\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/;
    return regex.test(phone);
  }

  function deleteComm(toDel) {
    $("#" + toDel).addClass("red").fadeOut('slow', function () {
      $("this").remove();
    });
  }

  $(document).ready(function () {

    var d = new Date();
    var day = d.getDate();
    var month = d.getMonth()
    var year = d.getFullYear()
    var hours = d.getHours();
    var minutes = d.getMinutes();
    var seconds = d.getSeconds();

    $('.alert').hide();

    $("#form").submit(function (event) {
      event.preventDefault();
      if ($("#nick").val() === "" || $("#msg").val() === "") {
        $('.alert').slideDown("fast");
      } else {
        $('.alert').slideUp("fast");
        var date = $.convertDate(year + '-' + month + '-' + day);
        var username = $("#nick").val();
        var msg = $("#msg").val();
        var id = (Date.now() * Math.floor(Math.random() * 100) + 1)

        var newComm = "<div class='media' id='" + id + "'><a class='pull-left' href='#"+id+"'><img class='media-object' src='https://www.shareicon.net/data/256x256/2016/07/05/791221_man_512x512.png' width='64' height='64' alt=''></a><div class='media-body'><h4 class='media-heading'>" +
          username
          + " " +
          "<small>" +
          date
          + "</small> <button id='delete' type='button' class='btn btn-danger' onclick='deleteComm(" + id + ")'>Usuń</button></h4 >" +
          msg
          + "</div ></div > "
        $('#comm').prepend(
          $(newComm).hide().fadeIn('slow')
        );
      }
    });
  });

  jQuery.extend({
    convertDate: function (mysqlDate) {
      var stringParts = mysqlDate.split("-");
      var output = '';
      $.each(stringParts, function (key, line) {
        var month = ['stycznia', 'lutego', 'marca', 'kwietnia', 'maja', 'czerwca', 'lipca', 'sierpnia', 'września', 'października', 'listopada', 'grudnia'];
        if (stringParts[2].length > 1 && stringParts[2].charAt(0) == 0) {
          if (stringParts[2] < 10) {
            output = stringParts[2] + ' ' + month[stringParts[1]] + ' ' + stringParts[0];
          }
          else {
            output = stringParts[2] + ' ' + month[stringParts[1]] + ' ' + stringParts[0];
          }
        }
        else if (stringParts[2] < 10) {
          var day = '0' + stringParts[2];
          output = day + ' ' + month[stringParts[1]] + ' ' + stringParts[0];
        }
        else {
          var day = stringParts[2];
          output = day + ' ' + month[stringParts[1]] + ' ' + stringParts[0];
        }

      });
      return output;
    }
  });
</script>