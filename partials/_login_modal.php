<div id="login-modal" class="modal">
  
  <form class="modal-content animate" action="/store/handlers/login_handle.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('login-modal').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="/store/img/icon/img_avatar2.png" alt="Avatar" class="avatar" >
    </div>

    <div class="modal-container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label for="usertype"><b>Plese select your user type</b></label><br>
      <input type="radio" id="user" name="usertype" value="user" checked>
      <label for="user">USER</label>&emsp;
      <input type="radio" id="admin" name="usertype" value="admin">
      <label for="admin">ADMIN</label><br>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="modal-container" style="background-color:#f1f1f1">
    
      <button type="button" onclick="document.getElementById('login-modal').style.display='none';document.getElementById('id01').style.display='block' " class="cancelbtn">Don't have an account? Signup here</button>
      <button type="button" onclick="document.getElementById('login-modal').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
