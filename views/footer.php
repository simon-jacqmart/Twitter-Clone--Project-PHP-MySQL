

<footer class="footer">
    <div class="container">
        <p>footer</p>
    </div>
</footer>

<!-- Note that JQUERY SLIM and ajax are not compatible-->

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalTitle">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger"id="loginAlert"></div>
        <form>
            <input type="hidden" id="loginActive" name="loginActive" value="1">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email address">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <a id="toggleLogin" href="#">Sign up </a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="LoginSignupButton">Login</button>
      </div>
    </div>
  </div>
</div>


<script>
  $("#toggleLogin").click(function(){
    if($("#loginActive").val() =="1") {

      $("#loginActive").val("0");
      $("#loginModalTitle").html("Sign Up");
      $("#LoginSignupButton").html("Sign Up");
      $("#toggleLogin").html("Login");

      

    } else {

      $("#loginActive").val("1");
      $("#loginModalTitle").html("Login");
      $("#LoginSignupButton").html("Login");
      $("#toggleLogin").html("Sign up");


    }
    
  });

  $("#LoginSignupButton").click(function(){
      
      
    $.ajax({
        type:"POST",
        url:"http://simontraining777-com.stackstaging.com/13_twitter/action.php?action=loginSignup",
        data: "email=" + $("#email").val() + "&password="+$("#password").val() + "&loginActive=" + $("#loginActive").val(),

        success: function(result) {
          if (result == "1") {

            window.location.assign("http://simontraining777-com.stackstaging.com/13_twitter/");
          } else {

            $("#loginAlert").html(result).show();
          }
        }
        

    })

  });

  $(".toggleFollow").click(function(){

    var id = $(this).attr("data-userId");
  

    $.ajax({
        type:"POST",
        url:"http://simontraining777-com.stackstaging.com/13_twitter/action.php?action=toggleFollow",
        data: "userId=" + id,

        success: function(result) {

          if (result == "1") {

            $("a[data-userId='" + id + "']").html("Follow");


          } else if (result =="2") {

            $("a[data-userId='" + id + "']").html("Unfollow");
          
          }
        
        }
        

    })


  })

  $("#postTweetButton").click(function() {


    $.ajax({
        type:"POST",
        url:"http://simontraining777-com.stackstaging.com/13_twitter/action.php?action=postTweet",
        data: "tweetContent=" + $("#tweetContent").val(),

        success: function(result) {

            

              if(result == "1") {

                  $("#tweetSuccess").show();
                  $("#tweetFail").hide();

              } else if (result != "") {

                  $("#tweetFail").html(result).show();
                  $("#tweetSuccess").hide();
              }
           
        
        }
        

    })



  }) 


</script>
</body>
</html>