{/* <script type="text/javascript" language="JavaScript"> */}
        function getInfo() {
          var email = document.getElementById("email").value;
          var pass = document.getElementById("password").value;
          var usr = {
            kunalkirimkar:"kunal@123",
            demouser:"demouser@123"
          };
          if(usr[email]==pass){
                    window.location.href= "home.php";
                    return
          }
          else{
                alert("invalid username or password, please try again.");
          }
        }
    {/* </script> */}