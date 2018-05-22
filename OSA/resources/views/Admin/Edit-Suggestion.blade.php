<div id="edit-modal" class="modal size-modal modal-fixed-footer">
  <div class="modal-content">
    <div>
      <h4 class = "center">Edit Form</h4>
    </div>
        <form>
          <div class= "row">
            <div class = "input-field col s12 l6">
              <input value ="" id="CompanyName" type="text" class="validate">
              <label for="CompanyName">Company Name</label>
            </div>
            <div class = "input-field col s12 l6">
              <input value =""id="BusinessName" type="text" class="validate">
              <label for="BusinessName">Business Name</label>
            </div>
          </div>
          <div class ="row">
            <div class = "input-field col s12">
              <input value ="" id="Address" type="text" class="validate">
              <label for="Address">Address</label>
            </div>
          </div>
          <div class= "row">
            <div class = "input-field col s12 l6">
              <select>
                <option value ="" disabled selected> Choose Business Type</option>
                @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
              </select>
              <label>Business Type</label>
            </div>
            <div class = "input-field col s12 l6">
              <input value ="" id="Contact Person" type="text" class="validate">
              <label for="Contact Person">Contact Person</label>
            </div>
          </div>
          <div class= "row">
            <div class = "input-field col s12 l6">
              <input value ="" id="ContactNumber" type="text" class="validate">
              <label for="ContactNumber">Contact Number</label>
            </div>
            <div class = "input-field col s12 l6">
              <input value =""id="Email" type="email" class="validate">
              <label for="Email">Email</label>
            </div>
          </div>
          <div class= "row">
            <div class = "input-field col s12 l6">
              <input value ="" id="facebook" type="text" class="validate">
              <label for="Contact Person">Facebook URL</label>
            </div>
            <div class = "input-field col s12 l6">
              <input value =""id="Website" type="text" class="validate">
              <label for="Website">Website</label>
            </div>
          </div>
          <div class ="row">
            <div class = "col s12">
              <div class="chips">
                <input> </input>
              </div>
            </div>
          </div>
        </form>
    </div>
  <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-light grey lighten-1 btn">cancel</a>
      <a class ="modal-action modal-close waves-effect waves-light btn">update</a>
  </div>
</div>
