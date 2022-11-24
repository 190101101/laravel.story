<div class="form-group">
    <label>password</label>
    <input type="text" name="password" class="form-control" placeholder="password" value="{{old('password')}}">
</div>

<div class="form-group">
    <label>confirm password</label>
    <input type="text" name="password_confirmation" class="form-control" placeholder="confirm password" value="{{old('confirm_password')}}">
</div>

<?php 


$validator = Validator::make($request->all(), [
    'password' => 'confirmed',
])->validate();
