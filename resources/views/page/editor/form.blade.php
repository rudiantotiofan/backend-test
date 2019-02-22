<div class="form-group col-xs-6">
  <label>First Name</label>
  <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" value="{{ (!empty($editor)? $editor->first_name : '' ) }}">
</div>
<div class="form-group col-xs-6">
  <label>Last Name</label>
  <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" value="{{ (!empty($editor)? $editor->last_name : '' ) }}">
</div>
<div class="form-group col-xs-12">
  <label>Email</label>
  <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{ (!empty($editor)? $editor->email : '' ) }}">
</div>
<!-- <div class="form-group col-xs-12">
  <label>Username</label>
  <input type="text" class="form-control" name="username" placeholder="Enter Username" value="{{ (!empty($editor)? $editor->username : '' ) }}">
</div> -->
<div class="form-group col-xs-12">
  <label>About</label>
  <textarea class="form-control" rows="10" name="about" placeholder="Enter About">{{ (!empty($editor)? $editor->about : '' ) }}</textarea>
</div>
<div class="checkbox col-xs-12">
  <label>
    <input type="checkbox" name="is_active" {{ (!empty($editor) ? (($editor->is_active==1) ? 'checked' : '') : '' ) }}> Is Active
  </label>
</div>

<div class="form-group col-xs-12">
  <label>*default password = 12345678</label>
</div>