
<form method="post" class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>work with database</legend>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="selectbasic"></label>
  <div class="controls">
    <select id="selectbasic" name="baseSelect" class="input-xlarge">
      <option selected>Select an action:</option>
      <option value="copyBase">copy the data base in a document</option>
      <option value="addBase">ADD record in the database</option>
      <option value="delBase">clean database</option>
    </select>
  </div>
</div>

<!-- Button -->
<div class="control-group">
  <label class="control-label" for="baseAction"></label>
  <div class="controls">
      <input type="submit" name="baseOk" class="btn btn-primary" >
  </div>
</div>

</fieldset>
</form>