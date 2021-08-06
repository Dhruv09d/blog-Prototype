function showPage(showdiv){
    //console.log(showdiv);
    var nameSection = document.getElementById('nameE');
    var aboutSection = document.getElementById('aboutYou');
    var password = document.getElementById('password');
    var avatar = document.getElementById('avatarUpdate');
    var deleteA = document.getElementById('delete_account');
    if (showdiv == '#nameE') {
      nameSection.style.display = 'block';
      document.getElementById('nameEbtn').style.background="#1A237E";

      aboutSection.style.display = 'none';
      document.getElementById('aboutYoubtn').style.background="#9cb2e2";

      password.style.display = 'none';
      document.getElementById('passwordbtn').style.background="#9cb2e2";

      avatar.style.display = 'none';
      document.getElementById('avatarupdatedbtn').style.background="#9cb2e2";

      deleteA.style.display = 'none';
      document.getElementById('deleteAccbtn').style.background="#ffcccc";

    } else if (showdiv == '#aboutYou') {
      nameSection.style.display = 'none';
      document.getElementById('nameEbtn').style.background=" #9cb2e2";

      aboutSection.style.display = 'block';
      document.getElementById('aboutYoubtn').style.background="#1A237E";

      password.style.display = 'none';
      document.getElementById('passwordbtn').style.background="#9cb2e2";

      avatar.style.display = 'none';
      document.getElementById('avatarupdatedbtn').style.background="#9cb2e2";

      deleteA.style.display = 'none';
      document.getElementById('deleteAccbtn').style.background="#ffcccc";

    } else if (showdiv == '#password') {
      nameSection.style.display = 'none';
      document.getElementById('nameEbtn').style.background="#9cb2e2";

      aboutSection.style.display = 'none';
      document.getElementById('aboutYoubtn').style.background="#9cb2e2";

      password.style.display = 'block';
      document.getElementById('passwordbtn').style.background="#1A237E";

      avatar.style.display = 'none';
      document.getElementById('avatarupdatedbtn').style.background="#9cb2e2";

      deleteA.style.display = 'none';
      document.getElementById('deleteAccbtn').style.background="#ffcccc";

    } else if (showdiv == '#avatarUpdate') {
      nameSection.style.display = 'none';
      document.getElementById('nameEbtn').style.background="#9cb2e2";

      aboutSection.style.display = 'none';
      document.getElementById('aboutYoubtn').style.background="#9cb2e2";

      password.style.display = 'none';
      document.getElementById('passwordbtn').style.background="#9cb2e2";

      avatar.style.display = 'block';
      document.getElementById('avatarupdatedbtn').style.background="#1A237E";

      deleteA.style.display = 'none';
      document.getElementById('deleteAccbtn').style.background="#ffcccc";
      
    } else if (showdiv == '#delete_account') {
      nameSection.style.display = 'none';
      document.getElementById('nameEbtn').style.background="#9cb2e2";

      aboutSection.style.display = 'none';
      document.getElementById('aboutYoubtn').style.background="#9cb2e2";

      password.style.display = 'none';
      document.getElementById('passwordbtn').style.background="#9cb2e2";

      avatar.style.display = 'none';
      document.getElementById('avatarupdatedbtn').style.background="#9cb2e2";

      deleteA.style.display = 'block';
      document.getElementById('deleteAccbtn').style.background="#e60000";
      
    } 
}

// show/hide delbtn
function show_delbtn() {
  console.log("Here to hide something!");
  document.getElementById("Cdelbtn").style.display = 'block';
  document.getElementById("delbtn").style.display = 'none';
}

function hide_delbtn() {
  console.log("Here to hide something!");
  document.getElementById("Cdelbtn").style.display = 'none';
  document.getElementById("delbtn").style.display = 'block';
}
// navbar toggle
function showmenu()
        {
            var x = document.getElementById('navigation');
            if (x.style.display == 'none') {
                x.style.display = 'block';
            } else {
                x.style.display = 'none';
            }
        }

//  password validation for first social login 
function checkPass() {
  var pass = document.getElementById('password').value;
  var cpass = document.getElementById('cpassword').value;
  if (pass === '' || pass === null) {
    document.getElementById('errpass').innerHTML = "";
    document.getElementById('errcpass').innerHTML = "";
    document.getElementById('errpass').innerHTML = "Password field is required";
  }
  if (cpass === '' || cpass === null) { 
    document.getElementById('errcpass').innerHTML = "";
    document.getElementById('errcpass').innerHTML = "Confirm Password field is required";
  }

  if ((pass !== '' || pass !== null) && (cpass !== '' || cpass !== null)) {
    if(pass !== cpass) {
      document.getElementById('errcpass').innerHTML = "";
      document.getElementById('errpass').innerHTML = "";
      document.getElementById('errpass').innerHTML = "Confirm Password field doesn't match";
    }
  }

}

// toggle blog menu button
function blogDropdown() {
  let id_blog = document.getElementById('blogDropdowns');
  if (id_blog.classList.contains("hidden")) {
    id_blog.classList.remove('hidden');
  } else {
    id_blog.classList.add('hidden');
  }
}