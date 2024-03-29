@extends('layouts.app')

@section('content')

<div class="w-full relative my-0 shadow-2xl rounded overflow-hidden">
    <div class="top h-64 w-full bg-blue-600 overflow-hidden relative" >
      <img src="https://images.unsplash.com/photo-1503264116251-35a269479413?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80" alt="" class="bg w-full h-full object-cover object-center absolute z-0">
      <div class="flex flex-col justify-center items-center relative h-full bg-black bg-opacity-50 text-white">
        <img src="{{ asset('/defaultAvatar/avatar-1299805_640.png')}}" class="h-28 w-28 object-cover rounded-full">
        <h1 class="text-2xl font-semibold mb-2">{{ $loggedin_user->name}}</h1>
        <h4 class="text-sm font-semibold">Joined Since '{{date('y', strtotime($loggedin_user->updated_at))}}</h4>
      </div>
    </div>
    <div class="grid grid-cols-12 bg-white ">
      
      <div class="col-span-12 w-full px-3 py-6 justify-center flex space-x-4 border-b border-solid md:space-x-0 md:space-y-4 md:flex-col md:col-span-2 md:justify-start ">
  
        <a href="#" class="text-sm p-2 bg-indigo-900 text-white text-center rounded font-bold" >Profile</a>
        
        <!--
        <a href="#" class="text-sm p-2 bg-indigo-200 text-center text-white rounded font-semibold hover:bg-indigo-700 hover:text-gray-200"  id="aboutYoubtn" onclick="showPage('#aboutYou')">About</a>
  
        <a href="#" class="text-sm p-2 bg-indigo-200 text-center text-white rounded font-semibold hover:bg-indigo-700 hover:text-gray-200"  id="passwordbtn" onclick="showPage('#password')">Password</a>
      -->
      </div>
      <div  class="col-span-12 md:border-solid md:border-l md:border-black md:border-opacity-25 h-full pb-12 md:col-span-10">
        <div class="px-4 pt-4">
          
          <!-- About -->
          <form action="{{ route('profile.store', Auth::user()->id) }}" class="flex flex-col space-y-8" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="form_name" value="createAboutSection">
            <div >
              <div>
                <h3 class="text-2xl font-semibold pb-1 mb-1">More About Me</h3>
                <hr>
              </div>
    
              <div class="form-item w-full mt-3">
                <label class="text-xl ">Biography</label>
                <textarea name="biography" cols="30" rows="10" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 mt-2 mb-4 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " ></textarea>
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
              @error('image')
                <div class="py-3 px-5 mb-4 bg-red-100 text-red-900 text-sm rounded-md border border-red-200 flex items-center justify-between" role="alert">
                <span>{{ $errors->first('image') }}</span>
                <button class="w-4" type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            @enderror
              <div class="form-item mt-2 bg-gray-lighter pt-10">
                <p class="mb-10 text-green-400">Recommended size 220x220</p>
                <label class="w-44 flex flex-col items-center px-1 py-2 bg-white-rounded-lg
                shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                    <span class="mt-1 text-base leading-normal">
                        Select a file
                    </span>
                    <input type="file" name="image" class="hidden"
                    onchange="document.getElementById('prevImg').src = window.URL.createObjectURL(this.files[0]); document.getElementById('prevImg').style.display = 'block';">
                </label>
            </div>
            <img id="prevImg" src="#" alt="your image" width="220" style="display:none;">
              <button type="submit" name="submit" class="w-3/5 mx-auto uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">Create</button>
            </div>
          </form>
        </div>
      </div>
  
  
    </div>
  </div>
 
@endsection

