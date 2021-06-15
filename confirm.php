<button id="btn" onclick="myFunction()" style="display: none;">Confirmation</button>

    <script>
      window.onload = function(){
        document.getElementById('btn').click();
      }

      function myFunction() {
        resp = confirm("You are about to Delete Patient's all Data");
        if(resp == true){
          window.location.href = "delete.php?resp=true";
        }
        else{
          window.location.href = "delete.php?resp=false"; 
        }
      }
    </script>