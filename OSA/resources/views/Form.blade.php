<form  method = "post">
    <div>
      <h1>{{$title}}</h1>
    </div>
    {{ csrf_field()}}
    <div class="row">
      <div class="six columns">
        <label for="CompanyName">Company Name</label>
        <input class="u-full-width" type="text"  id="CompanyName" name="CompanyName" required>
      </div>

      <div class="six columns">
        <label for="BusinessName">Business Name</label>
        <input class="u-full-width" type="text"  id="BusinessName" name="BusinessName">
      </div>
    </div>

    <div class="row">
      <div class="twelve columns">
        <label for="Address">Address</label>
        <input class="u-full-width" type="text"  id="Address" name="Address">
      </div>
    </div>

    <div class="row">
      <div class="six columns">
        <label for="CompanyEmail">Email</label>
        <input class="u-full-width" placeholder="sdf@gmail.com" type="email" id="website" name = "email"required>
      </div>
      <div class="six columns">
        <label for="Celno">Contact Number</label>
        <input class="u-full-width" type="tel"  id="Celno" name="Celno"required>
      </div>
    </div>

    <div class="row">
      <div class="six columns">
        <label for="BusinessType">Type of Business</label>
        <select class="u-full-width" id="BusinessType" name="BusinessType">
          @foreach($categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="six columns">
        <label for="Contact Person">Contact Person</label>
        <input class="u-full-width" type="text"  id="Contact Person" name = "ContactPerson">
      </div>
    </div>

    <div class="row">
      <div class="six columns">
        <label for="Website">Website</label>
        <input class="u-full-width" type="text" id="website" name= "website">
      </div>

      <div class="six columns">
        <label for="Facebook">Facebook Page</label>
        <input class="u-full-width" type = "text" id="Facebook" name="Facebook">
      </div>
    </div>

    @if (!empty($view))
      <div class="row">
        <div class="twelve columns">
          <label for="Notes">Notes for Administrator</label>
          <textarea class="u-full-width" id="Notes"></textarea>
        </div>
      </div>
    @endif
    <div class="row">
      <button class="button" type="reset">clear</button>
      <input class="button-primary submit-float" type="submit" value="Submit">
    </div>
      
</form>