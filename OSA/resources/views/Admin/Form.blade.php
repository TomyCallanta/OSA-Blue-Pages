<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content">
        <h3 class="center">New Supplier Details</h3>
        <form>
          <div class= "row">
            <div class = "input-field col s12 l6">
              <input value ="" id="CompanyName" type="text" class="validate" name="CompanyName">
              <label for="CompanyName">Company Name</label>
            </div>
            <div class = "input-field col s12 l6">
              <input value ="" id="BusinessName" name="BusinessName" type="text" class="validate">
              <label for="BusinessName">Business Name</label>
            </div>
          </div>
          <div class ="row">
            <div class = "input-field col s12">
              <input value ="" id="Address" name="Address" type="text" class="validate">
              <label for="Address">Address</label>
            </div>
          </div>
          <div class= "row">
            <div class = "input-field col s12 l6">
              <select name="BusinessType">
                <option value ="" disabled selected> Choose Business Type</option>
                @foreach($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
              </select>
              <label>Business Type</label>
            </div>
            <div class = "input-field col s12 l6">
              <input value ="" id="Contact Person" name="ContactPerson" type="text" class="validate">
              <label for="Contact Person">Contact Person</label>
            </div>
          </div>
          <div class= "row">
            <div class = "input-field col s12 l6">
              <input value ="" id="ContactNumber" name="ContactNumber" type="text" class="validate">
              <label for="ContactNumber">Contact Number</label>
            </div>
            <div class = "input-field col s12 l6">
              <input value =""id="Email" type="email" class="validate">
              <label for="Email">Email</label>
            </div>
          </div>
          <div class= "row">
            <div class = "input-field col s12 l6">
              <input value ="" id="facebook" name="Facebook" type="text" class="validate">
              <label for="facebook">Facebook URL</label>
            </div>
            <div class = "input-field col s12 l6">
              <input value ="" id="Website" name="Website" type="text" class="validate">
              <label for="Website">Website</label>
            </div>
          </div>
          <div class ="row">
            <div class = "col s12">
              <div class="chips">
                <input name="Specialty"> </input>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col s12">
              <button class="btn grey" type="reset">cancel</button>
              <button class="btn" type="submit">submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
