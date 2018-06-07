<div id="edit-modal" class="modal size-modal modal-fixed-footer">
  <div class="modal-content">
    <div>
      <h4 class = "center">Edit Form</h4>
    </div>
        <form id ="modal-suggestion">
          <div class="row">
            <div class = "input-field col s12">
              <label>
                <input id="verified" type="checkbox" name="verified">
                <span>OSA Verified</span>
              </label>
            </div>
          </div>

          <div class= "row">
            <div class = "input-field col s12">
              <input name="company_name" id="company_name" type="text" class="validate">
              <label for="company_name">Company Name</label>
            </div>
          </div>

          <div class="row">
            <div class = "input-field col s12">
              <input name="bussiness_name" id="bussiness_name" type="text" class="validate">
              <label for="bussiness_name">Business Name</label>
            </div>
          </div>

          <div class ="row">
            <div class = "input-field col s12">
              <input name="address" id="address" type="text" class="validate">
              <label for="address">Address</label>
            </div>
          </div>
          <div class= "row">
            <div class = "input-field col s12">
              <select name="category_id" id="category_id">
                <option value ="" disabled selected> Choose Business Type</option>
                @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
              </select>
              <label>Business Type</label>
            </div>
          </div>
          <div class= "row">
            <div class = "input-field col s12 l12">
              <input name="contact_person" id="contact_person" type="text" class="validate">
              <label for="contact_person">Contact Person</label>
            </div>
          </div>
          <div class= "row">
            <div class = "input-field col s12 l6">
              <input name="contact_no" id="contact_no" type="text" class="validate">
              <label for="contact_no">Contact Number</label>
            </div>
            <div class = "input-field col s12 l6">
              <input name="email" id="email" type="email" class="validate">
              <label for="email">Email</label>
            </div>
          </div>
          <div class= "row">
            <div class = "input-field col s12 l6">
              <input name="fbpage" id="fbpage" type="text" class="validate">
              <label for="fbpage">Facebook URL</label>
            </div>
            <div class = "input-field col s12 l6">
              <input name="website" id="website" type="text" class="validate">
              <label for="website">Website</label>
            </div>
          </div>

          <div class="row">
            <div class = "col s12">
              <div class="chips" id="tags">
                <input> </input>
              </div>
            </div>
          </div>

          <div class="note-to-admin row">
            <div class="input-field col s12">
              <textarea class="materialize-textarea" name="note_to_admin" id="note_to_admin"></textarea>
              <label for="note_to_admin">Note to Admin</label>
            </div>
          </div>
        </form>
    </div>
  <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-light grey lighten-1 btn">cancel</a>
      <a class ="modal-action modal-close waves-effect waves-light btn blue lighten-1">update</a>
  </div>
</div>
