 <form action="{{ route($action) }}" method="POST" id="login_form">
     @csrf
     {{-- Email --}}
     <div class="mb-3">
         <label for="email" class="form-label">Email</label>
         <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
         @error('email')
             <div class="return-error">{{ $message }}</div>
         @enderror
     </div>
     {{-- password --}}
     <div class="mb-3">
         <label for="password" class="form-label">Password</label>
         <input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
         @error('password')
             <div class="return-error"></div>
         @enderror
     </div>
     <div class="mt-3 form-end">
         <button type="submit" class="btn form-submit-btn mb-2">
             Login
         </button>
         <a href="{{ url($register) }}">Register?</a>
         <a href="{{url($forgot)}}">Forgot password?</a>
     </div>

 </form>
