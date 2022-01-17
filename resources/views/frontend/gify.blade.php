<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />

    <title>GIF AJAX</title>

    <style>
      img {
        max-height: 300px;
        width: 100%;
        object-fit: contain;
      }
    </style>
  </head>
  <body>
    <div class="container mt-3">
      <h2>GIF Generation</h2>
      <small>by Muhammad Ahmed (FA19-BCS-041)</small><br /><br />
      <label for="search">Enter the gif name</label>
      <input type="text" id="search" class="search form-control w-50" />
      <button type="button" id="btn" class="btn btn-primary mb-3 mt-3">
        Search
      </button>
      <button type="button" id="btn-del" class="btn btn-danger mb-3 mt-3">
        Remove GIFs
      </button>

      <div class="gallery">
        <div class="row"></div>
      </div>
    </div>

    <script
      src="https://code.jquery.com/jquery-3.6.0.js"
      integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
      crossorigin="anonymous"
    ></script>

    <script>
      $(document).ready(function () {
        $('#btn').click(function () {
          if ($('#search').val()) {
            getGif($('#search').val());
          }
        });

        $('#btn-del').click(function () {
          $('.row').html('');
        });
      });

      function getGif(searchTerm) {
        console.log('searchTerm is: ', searchTerm);
        $.ajax({
          url:
            'http://api.giphy.com/v1/gifs/search?q=' +
            searchTerm +
            '&api_key=dc6zaTOxFJmzC',
          type: 'GET',
          success: function (response) {
            var gifUri =
              'https://media.giphy.com/media/' +
              response.data[0].id +
              '/giphy.gif';

            console.log();

            var gifImage =
              '<div class="col-md-3 mx-2 my-2"><img src="' +
              gifUri +
              '"/></div>';
            $('.row').append(gifImage);
          },
          error: function (e) {
            alert('Some Error Occured!');
          },
        });
      }
    </script>
  </body>
</html>
