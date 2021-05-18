@extends('layouts.app')

@section('content')
<script>
  function showPage(showdiv){
    console.log(showdiv);
    var nameSection = document.getElementById('nameE');
    var aboutSection = document.getElementById('aboutYou');
    var password = document.getElementById('password');
    if (showdiv == '#nameE') {
      nameSection.style.display = 'block';
      document.getElementById('nameEbtn').style.background="#1A237E";

      aboutSection.style.display = 'none';
      document.getElementById('aboutYoubtn').style.background="#9cb2e2";

      password.style.display = 'none';
      document.getElementById('passwordbtn').style.background="#9cb2e2";

    } else if (showdiv == '#aboutYou') {
      nameSection.style.display = 'none';
      document.getElementById('nameEbtn').style.background=" #9cb2e2";

      aboutSection.style.display = 'block';
      document.getElementById('aboutYoubtn').style.background="#1A237E";

      password.style.display = 'none';
      document.getElementById('passwordbtn').style.background="#9cb2e2";

    } else if (showdiv == '#password') {
      nameSection.style.display = 'none';
      document.getElementById('nameEbtn').style.background="#9cb2e2";

      aboutSection.style.display = 'none';
      document.getElementById('aboutYoubtn').style.background="#9cb2e2";

      password.style.display = 'block';
      document.getElementById('passwordbtn').style.background="#1A237E";
    }
       
}

  </script>
<div class="w-full relative my-0 shadow-2xl rounded overflow-hidden">
    <div class="top h-64 w-full bg-blue-600 overflow-hidden relative" >
      <img src="https://images.unsplash.com/photo-1503264116251-35a269479413?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" alt="" class="bg w-full h-full object-cover object-center absolute z-0">
      <div class="flex flex-col justify-center items-center relative h-full bg-black bg-opacity-50 text-white">
        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" class="h-28 w-28 object-cover rounded-full">
        <h1 class="text-2xl font-semibold">{{ $loggedin_user->name}}</h1>
        <h4 class="text-sm font-semibold">Joined Since '{{date('y', strtotime($loggedin_user->updated_at))}}</h4>
      </div>
    </div>
    <div class="grid grid-cols-12 bg-white ">
  
      <div class="col-span-12 w-full px-3 py-6 justify-center flex space-x-4 border-b border-solid md:space-x-0 md:space-y-4 md:flex-col md:col-span-2 md:justify-start ">
  
        <a href="#" class="text-sm p-2 bg-indigo-900 text-white text-center rounded font-bold" id="nameEbtn" onclick="showPage('#nameE')">Profile</a>
  
        <a href="#" class="text-sm p-2 bg-indigo-200 text-center text-white rounded font-semibold hover:bg-indigo-700 hover:text-gray-200"  id="aboutYoubtn" onclick="showPage('#aboutYou')">About</a>
  
        <a href="#" class="text-sm p-2 bg-indigo-200 text-center text-white rounded font-semibold hover:bg-indigo-700 hover:text-gray-200"  id="passwordbtn" onclick="showPage('#password')">Password</a>
  
      </div>
  
      <div id="profileCreate" class="col-span-12 md:border-solid md:border-l md:border-black md:border-opacity-25 h-full pb-12 md:col-span-10">
        <div class="px-4 pt-4">
          <!-- Name -->
          <div id="nameE" style="display:block;">
            <form action="{{ route('profile.update', Auth::user()->id) }}" class="flex flex-col space-y-8" method="POST">
              @csrf
              @method('PUT')
              <input type="hidden" name="form_name" value="user_table_update">
            <div>
              <h3 class="text-4xl font-semibold pb-2 mb-4">Profile</h3>
              <hr>
            </div>
  
            <div class="form-item mt-3">
              <label class="text-xl ">Full Name</label>
              <input type="text" name="user_name" value="{{ $loggedin_user->name}}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mt-1 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200" >
            </div>

            <div class="form-item mt-3">
              <label class="text-xl w-full">Email</label>
              <input type="text" name="email" value="{{ $loggedin_user->email}}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mt-1 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " >
            </div>
            <button  type="submit" name="submit" class="w-3/5 mx-auto uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">Save</button>
          </div>
        </form>
          <!-- About -->
          <form action="{{ route('profile.store', Auth::user()->id) }}" class="flex flex-col space-y-8" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="form_name" value="createAboutSection">
            <div id="aboutYou" style="display:none;">
              <div>
                <h3 class="text-2xl font-semibold pb-1 mb-1">More About Me</h3>
                <hr>
              </div>
    
              <div class="form-item w-full mt-3">
                <label class="text-xl ">Biography</label>
                <textarea name="bio" cols="30" rows="10" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 mt-2 mb-4 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " ></textarea>
              </div>
            
              <div>
                <h3 class="text-2xl font-semibold pb-1 mt-3">My Social Media</h3>
                <hr>
              </div>
    
              <div class="form-item mt-3">
                <label class="text-xl">Instagram</label>
                <input name="instagram" type="text" placeholder="https://instagram.com/" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mt-1 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " >
              </div>
              <div class="form-item mt-3">
                <label class="text-xl  ">Facebook</label>
                <input type="text" name="facebook" placeholder="https://facebook.com/" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mt-1 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " >
              </div>
              <div class="form-item mt-3">
                <label class="text-xl ">Twitter</label>
                <input type="text" name="twitter" placeholder="https://twitter.com/" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mt-1  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200  " >
              </div>
              <div class="form-item mt-2 bg-gray-lighter pt-10">
                <label class="w-44 flex flex-col items-center px-1 py-2 bg-white-rounded-lg
                shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                    <span class="mt-1 text-base leading-normal">
                        Select a file
                    </span>
                    <input type="file" name="image" class="hidden">
                </label>
            </div>
              <button type="submit" name="submit" class="w-3/5 mx-auto uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">Create</button>
            </div>
          </form>
          <!-- password -->
          <form action="" class="flex flex-col space-y-8" method="POST">
            @csrf
            @method('PUT')
          <div id="password" style="display:none;">
            <div>
              <h3 class="text-2xl font-semibold pb-1 mb-3">Change Password</h3>
              <hr>
            </div>

            <div class="form-item  mt-4">
              <label class="text-xl">Current Password</label>
              <input type="text" placeholder="" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mt-1 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " >
            </div>
            <div class="form-item mt-3">
              <label class="text-xl  ">New Password</label>
              <input type="text" placeholder="" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mt-1 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " >
            </div>
            <div class="form-item mt-3">
              <label class="text-xl ">Re-type New Password</label>
              <input type="text" placeholder="" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mt-1  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200  " >
            </div>
            <button type="submit" class="w-3/5 mx-auto uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl"> Create
            </button>
          </div>
          </form>
          <!--</form>-->
        </div>
      </div>
  
  
    </div>
  </div>
 
@endsection

