

<?php $__env->startSection('content'); ?>

<div class="w-full relative my-0 shadow-2xl rounded overflow-hidden">
    <div class="top h-64 w-full bg-blue-600 overflow-hidden relative" >
      <img src="https://cdn.pixabay.com/photo/2016/11/06/05/36/lake-1802337_960_720.jpg" alt="" class="bg w-full h-full object-cover object-center absolute z-0">
      <div class="flex flex-col justify-center items-center relative h-full bg-black bg-opacity-50 text-white">
        <img src="<?php echo e(asset('/avatar/' . $about_info->avatar_path)); ?>" class="h-28 w-28 object-cover rounded-full">
        <h1 class="text-2xl font-semibold mb-1"><?php echo e($loggedin_user->name); ?></h1>
        <h4 class="text-sm font-semibold mt-1">Joined Since '<?php echo e(date('y', strtotime($loggedin_user->updated_at))); ?></h4>
      </div>
    </div>

    
    <?php if($errors->any()): ?>
      <div class="py-3 px-5 mb-4 bg-red-100 text-red-900 text-sm rounded-md border border-red-200 flex items-center justify-between" role="alert">
        <span>No action performed. PLease got to the previous tab to check for error.</span>
        <button class="w-4" type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
      </div>
    <?php endif; ?>

    <?php if(session()->has('message')): ?>
    <?php switch(session()->get('message')['msgType']):
        case ('success'): ?>
            <div class="py-3 px-5 mb-4 bg-green-100 text-green-900 text-sm rounded-md border border-green-200 flex items-center justify-between" role="alert">
              <span><?php echo e(session()->get('message')['msg']); ?></span>
              <button class="w-4" type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
                  </svg>
              </button>
            </div>
            <?php break; ?>

        <?php case ('warning'): ?>
            <div class="py-3 px-5 mb-4 bg-yellow-100 text-yellow-900 text-sm rounded-md border border-yellow-200 flex items-center justify-between" role="alert">
              <span><?php echo e(session()->get('message')['msg']); ?></span>
              <button class="w-4" type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
                  </svg>
              </button>
            </div>
            <?php break; ?>
        
        <?php case ('danger'): ?>
        <div class="py-3 px-5 mb-4 bg-red-100 text-red-900 text-sm rounded-md border border-red-200 flex items-center justify-between" role="alert">
              <span><?php echo e(session()->get('message')['msg']); ?></span>
              <button class="w-4" type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
                  </svg>
              </button>
            </div>
            <?php break; ?>
        <?php default: ?>
          <div class="py-3 px-5 mb-4 bg-gray-300 text-gray-900 rounded-md text-sm border border-gray-400 flex items-center justify-between" role="alert">
            <span><?php echo e(session()->get('message')['msg']); ?></span>
            <button class="w-4" type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    <?php endswitch; ?>
    <?php endif; ?>

    <div class="grid grid-cols-12 bg-white ">
  
      <div class="col-span-12 w-full px-3 py-6 justify-center flex space-x-4 border-b border-solid md:space-x-0 md:space-y-4 md:flex-col md:col-span-2 md:justify-start ">
  
        <a href="#" class="text-sm p-2 bg-indigo-900 text-white text-center rounded font-bold" id="nameEbtn" onclick="showPage('#nameE')">Profile</a>
  
        <a href="#" class="text-sm p-2 bg-indigo-200 text-center text-white rounded font-semibold hover:bg-indigo-700 hover:text-gray-200"  id="aboutYoubtn" onclick="showPage('#aboutYou')">About</a>
  
        <a href="#" class="text-sm p-2 bg-indigo-200 text-center text-white rounded font-semibold hover:bg-indigo-700 hover:text-gray-200"  id="passwordbtn" onclick="showPage('#password')">Password</a>

        <a href="#" class="text-sm p-2 bg-indigo-200 text-center text-white rounded font-semibold hover:bg-indigo-700 hover:text-gray-200"  id="avatarupdatedbtn" onclick="showPage('#avatarUpdate')">Avatar</a>
        
        <a href="#" class="text-sm p-2 bg-red-200 text-center text-white rounded font-semibold hover:bg-red-600 hover:text-gray-200"  id="deleteAccbtn" onclick="showPage('#delete_account')">Delete Account</a>
  
      </div>
  
      <div id="profileCreate" class="col-span-12 md:border-solid md:border-l md:border-black md:border-opacity-25 h-full pb-12 md:col-span-10">
        <div class="px-4 pt-4">
          <!-- Name -->
          <div id="nameE" style="display:block;">
            <form action="<?php echo e(route('profile.update', Auth::user()->id)); ?>" class="flex flex-col space-y-8" method="POST">
              <?php echo csrf_field(); ?>
              <?php echo method_field('PUT'); ?>
              <input type="hidden" name="form_name" value="user_table_update">
            <div>
              <h3 class="text-4xl font-semibold pb-2 mb-4">Profile</h3>
              <hr>
            </div>
  
            <div class="form-item mt-3">
              <label class="text-xl ">Full Name</label>
              <input type="text" name="user_name" value="<?php echo e($loggedin_user->name); ?>" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mt-1 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200" >
            </div>

            <div class="form-item mt-3">
              <label class="text-xl w-full">Email</label>
              <input type="text" name="email" value="<?php echo e($loggedin_user->email); ?>" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mt-1 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " >
            </div>
            <button  type="submit" name="submit" class="w-3/5 mx-auto uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">Save</button>
            </form>
          </div>
        
          <!-- About -->
         
            <div id="aboutYou" style="display:none;">
                <form action="<?php echo e(route('profile.update', Auth::user()->id)); ?>" class="flex flex-col space-y-8" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <input type="hidden" name="form_name" value="createAboutSection">
              <div>
                <h3 class="text-2xl font-semibold pb-1 mb-1">More About Me</h3>
                <hr>
              </div>
    
              <div class="form-item w-full mt-3">
                <label class="text-xl ">Biography</label>
                <textarea name="biography" cols="30" rows="10" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 mt-2 mb-4 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " ><?php echo e($about_info->biography); ?></textarea>
              </div>
            
              <div>
                <h3 class="text-2xl font-semibold pb-1 mt-3">My Social Media</h3>
                <hr>
              </div>
    
              <div class="form-item mt-3">
                <label class="text-xl">Instagram</label>
                <input name="instagram" type="text" placeholder="https://instagram.com/" value="<?php echo e($about_info->instagram); ?>" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mt-1 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " >
              </div>
              <div class="form-item mt-3">
                <label class="text-xl  ">Facebook</label>
                <input type="text" name="facebook" placeholder="https://facebook.com/" value="<?php echo e($about_info->facebook); ?>" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mt-1 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " >
              </div>
              <div class="form-item mt-3">
                <label class="text-xl ">Twitter</label>
                <input type="text" name="twitter" placeholder="https://twitter.com/" value="<?php echo e($about_info->twitter); ?>" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mt-1  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200  " >
              </div>
              <button type="submit" name="submit" class="w-3/5 mx-auto uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">Save</button>
            </form>
            </div>
          <!-- Change Avatar -->
          
          <div id="avatarUpdate" style="display:none;">
            <form action="<?php echo e(route('profile.update', Auth::user()->id)); ?>" class="flex flex-col space-y-8" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <input type="hidden" name="form_name" value="changeAvatar">
            <div>
              <h3 class="text-2xl font-semibold pb-1 mb-3">Update Avatar</h3>
              <hr>
            </div>
            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="py-3 px-5 mb-4 bg-red-100 text-red-900 text-sm rounded-md border border-red-200 flex items-center justify-between" role="alert">
              <span><?php echo e($errors->first('image')); ?></span>
              <button class="w-4" type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
                  </svg>
              </button>
            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <div class="form-item mt-2 bg-gray-lighter pt-10">
              <p class="mb-10 text-green-400">Recommended size 220x220</p>
              <label class="w-44 flex flex-col items-center px-1 py-2 bg-white-rounded-lg
              shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
                  <span class="mt-1 text-base leading-normal">
                      Select a file
                  </span>
                  <input type="file" name="image" class="hidden"
                  onchange="document.getElementById('prevImg').src = window.URL.createObjectURL(this.files[0]);">
              </label>
            </div>
            <img id="prevImg" src="<?php echo e(asset('/avatar/'. $about_info->avatar_path)); ?>" alt="your image" width="220" >
            <button type="submit" class="w-3/5 mx-auto uppercase mt-15 bg-blue-500 hover:bg-blue-700 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl"> Save
            </button>
            </form>
          

            <!-- Remove avatar -->
          
            
            <form action="<?php echo e(route('profile.update', Auth::user()->id)); ?>" class="flex flex-col space-y-8" method="POST" >
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <input type="hidden" name="form_name" value="removeAvatar" >
            <button type="submit" class="w-3/5 mx-auto uppercase mt-15 bg-red-500 hover:bg-red-700 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl"> Remove Avatar
            </button>
            </form>
          
          </div>
          <!-- password -->
          
          <div id="password" style="display:none;">
            <form action="<?php echo e(route('profile.update', Auth::user()->id)); ?>" class="flex flex-col space-y-8" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <input type="hidden" name="form_name" value="changePassword">
            <div>
              <h3 class="text-2xl font-semibold pb-1 mb-3">Change Password</h3>
              <hr>
            </div>
            <?php $__errorArgs = ['currentPass'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="py-3 px-5 mb-4 bg-red-100 text-red-900 text-sm rounded-md border border-red-200 flex items-center justify-between" role="alert">
              <span><?php echo e($errors->first('currentPass')); ?></span>
              <button class="w-4" type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
                  </svg>
              </button>
            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <div class="form-item  mt-4">
              <label class="text-xl">Current Password</label>
              <input type="password" placeholder=""  name="currentPass" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mt-1 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " >
            </div>
            <?php $__errorArgs = ['newPass'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="py-3 px-5 mb-4 bg-red-100 text-red-900 text-sm rounded-md border border-red-200 flex items-center justify-between" role="alert">
              <span><?php echo e($errors->first('newPass')); ?></span>
              <button class="w-4" type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
                  </svg>
              </button>
            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <div class="form-item mt-3">
              <label class="text-xl  ">New Password</label>
              <input type="password" placeholder="" name="newPass" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mt-1 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " >
            </div>
            <?php $__errorArgs = ['confNewPass'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="py-3 px-5 mb-4 bg-red-100 text-red-900 text-sm rounded-md border border-red-200 flex items-center justify-between" role="alert">
              <span><?php echo e($errors->first('confNewPass')); ?></span>
              <button class="w-4" type="button" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.remove();">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
                  </svg>
              </button>
            </div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <div class="form-item mt-3">
              <label class="text-xl ">Re-type New Password</label>
              <input type="password" placeholder="" name="confNewPass" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mt-1  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200  " >
            </div>
            <div class="text-blue-400 font-bold">
              <a href="<?php echo e(route('password.request')); ?>">Forgot Your Password?</a>
            </div>
            
            <button type="submit" class="w-3/5 mx-auto uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl"> Save
            </button>
            </form>
          </div>

          <!-- Delete Account -->
          <div id="delete_account" style="display:none;">
            <div>
              <h3 class="text-4xl font-semibold pb-2 mb-4">Delete Account</h3>
              <hr>
              <ul>
                <li>
                  <p class="text-xl">Your all date will be removed permanently.</p>
                </li>
                <li>
                  <p class="text-xl ">You will not be able to recover data, once deleted.</p>
                </li>
              </ul>
              
              
            </div>
            <h3 class="text-red-500 text-2xl mt-10 ">Do you really want to delete your account?</h3>
            <button  id="delbtn" class="w-1/5  uppercase mt-15 bg-gray-600 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl" onclick="show_delbtn()">Delete?</button>
            <div id="Cdelbtn" style="display:none">
              <button class="w-1/5  uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl" onclick="hide_delbtn()">Cancel?</button>
              <form action="<?php echo e(route('deleteUser', Auth::user()->id)); ?>" class="flex flex-col space-y-8 inline" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <input type="hidden" name="form_name" value="delete_account">
              <button  type="submit" name="submit" class="w-1/5  uppercase bg-red-700 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">Confirm</button>
            </form>
            </div>
            
            
          </div>
          <!--</form>-->
        </div>
      </div>
  
  
    </div>
  </div>
 
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\blogprototype\resources\views/profiles/profile_update.blade.php ENDPATH**/ ?>