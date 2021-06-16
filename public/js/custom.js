function showPage(showdiv){
    //console.log(showdiv);
    var nameSection = document.getElementById('nameE');
    var aboutSection = document.getElementById('aboutYou');
    var password = document.getElementById('password');
    var avatar = document.getElementById('avatarUpdate');
    if (showdiv == '#nameE') {
      nameSection.style.display = 'block';
      document.getElementById('nameEbtn').style.background="#1A237E";

      aboutSection.style.display = 'none';
      document.getElementById('aboutYoubtn').style.background="#9cb2e2";

      password.style.display = 'none';
      document.getElementById('passwordbtn').style.background="#9cb2e2";

      avatar.style.display = 'none';
      document.getElementById('avatarupdatedbtn').style.background="#9cb2e2";

    } else if (showdiv == '#aboutYou') {
      nameSection.style.display = 'none';
      document.getElementById('nameEbtn').style.background=" #9cb2e2";

      aboutSection.style.display = 'block';
      document.getElementById('aboutYoubtn').style.background="#1A237E";

      password.style.display = 'none';
      document.getElementById('passwordbtn').style.background="#9cb2e2";

      avatar.style.display = 'none';
      document.getElementById('avatarupdatedbtn').style.background="#9cb2e2";

    } else if (showdiv == '#password') {
      nameSection.style.display = 'none';
      document.getElementById('nameEbtn').style.background="#9cb2e2";

      aboutSection.style.display = 'none';
      document.getElementById('aboutYoubtn').style.background="#9cb2e2";

      password.style.display = 'block';
      document.getElementById('passwordbtn').style.background="#1A237E";

      avatar.style.display = 'none';
      document.getElementById('avatarupdatedbtn').style.background="#9cb2e2";

    } else if (showdiv == '#avatarUpdate') {
      nameSection.style.display = 'none';
      document.getElementById('nameEbtn').style.background="#9cb2e2";

      aboutSection.style.display = 'none';
      document.getElementById('aboutYoubtn').style.background="#9cb2e2";

      password.style.display = 'none';
      document.getElementById('passwordbtn').style.background="#9cb2e2";

      avatar.style.display = 'block';
      document.getElementById('avatarupdatedbtn').style.background="#1A237E";
      
    }
       
}