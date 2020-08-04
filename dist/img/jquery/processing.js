$(document).ready(function(){
  $("#submit").click(function(){
    //to display progrdss bar
    $("loading").show();
    var position = $("#position").val();
    var email = $("#email").val();
    var pwd = $("#pwd").val();
    // Transfer Form Information to different Page without page refresh
    $.post("build/login.php", {
      position: position,
      email: email,
      pwd:pwd
    }, function(status) {
      $("#loading").hide(); //to hide progress background
      alert(status);
    });
  });
});
