$(document).ready(function(){
  $('.parallax').parallax();
  $('.modal').modal();
  $(".sidenav").sidenav();
  $(".dropdown-trigger").dropdown();

  $("#user_dropdown").dropdown({
    'coverTrigger':false
  });

  $('.sort_choice').click(function(){
     filter = parseInt($(this).attr('id').split('_').pop());
     $("input[name='sort']").val(filter);
     $('#sort_button').html($(this).html() + "<i class='right material-icons'>arrow_drop_down</i>");
  });

  $('#submit-comment').click(function(){
    comment_content = $("#comment-field").val();
    rating = parseInt($('#rating-Comment').val());
    if(comment_content != "" & rating > 0){
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      })

      $.post('/comment', $('#user_comment').serialize(), function(data){
        $("#comment-field").val('');
        $("input[name='sort']").val(0);
        for(i = 1; i <= 5; i++){
          $('#' + i).html('star_border');
        }

        $("#no_comments").remove();

        $("#supplier_rate").html(parseInt(data.newRate).toString());

        $("#comment-container").after(
          "<div class='ui comments'><div class='comment'><a class='avatar'><img src='"
          + data.avatar + "'></a><div class='content'><a class='author'>"
          + data.name + "</a><div class='metadata'><div class='date'>"
          + (data.system_date.date).split(" ")[0] + "</div><div class='blue-text lighten-1 rating'>"
          + rating + "<i class='blue-text lighten-1 commentStar material-icons'>star</i></div></div><div class='comment-text text'>"
          + comment_content + "</div></div></div></div>"
          );

      }, 'json');
    }
  });

  $('#load_more').click(function(){
    supplier_id = $("#supplier_id").val();
    next_page = $('#next_page').html(); 
    url = '/moreReviews/' + supplier_id + "?page=" + next_page; 
    $.get(url, function(data){
      for(i=0; i<data.reviews.data.length; i++){
        $("#review_section").append(
          "<div class='ui comments'><div class='comment'><a class='avatar'><img src='"
          + data.avatars[i] + "'></a><div class='content'><a class='author'>"
          + data.users[i] + "</a><div class='metadata'><div class='date'>"
          + (data.reviews.data[i].created_at).split(" ")[0] + "</div><div class='blue-text lighten-1 rating'>"
          + data.reviews.data[i].rating + "<i class='blue-text lighten-1 commentStar material-icons'>star</i></div></div><div class='comment-text text'>"
          + data.reviews.data[i].review_content + "</div></div></div></div>"
          );
      }

      if(data.reviews.current_page < data.reviews.last_page){
        $('#next_page').html(data.reviews.current_page + 1);
      }else{
        $('#load_more_holder').remove();
      }
    });
  });

  $('#comment-field').click(function(){
    $('#comment-buttons').show();
  });

  $('#cancel-comment').click(function(){
    $('#comment-buttons').hide();
    $('#comment-field').val("");
  });

  $('.starSmall').hover(
    function(){
      var cur = parseInt($(this).attr('id'));
      for(i = 1; i <= 5; i++){
          if(i <= cur){
            $('#' + i).html('star');
          }else{
            $('#' + i).html('star_border');
          }
        }
    },
    function(){
      var cur = parseInt($('#rating-Comment').val());
      for(i = 1; i <= 5; i++){
          if(i <= cur){
            $('#' + i).html('star');
          }else{
            $('#' + i).html('star_border');
          }
        }
    });

    $('.starSmall').click(function(){
      $('#comment-buttons').show();
      var cur = parseInt($(this).attr('id'));
      $('#rating-Comment').val(cur);
      for(i = 1; i <= 5; i++){
          if(i <= cur){
            $('#' + i).html('star');
          }else{
            $('#' + i).html('star_border');
          }
        }
    });

   $('.modal').modal();

});
