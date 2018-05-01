<div id="modalWhole" class="modal-box">
	<div id="modalContent" class="admin-block modal-height">
		<div class="container full-height">
			<div class="row admin-hor">
				<div id="modal-inner" class="admin-ver">
					<div id="mh" class="modal-head">
						<p onclick="editToggle()" class="close-btn">&times;</p>
						<h1>Edit Supplier</h1>
						<p class="subText" style="display: none" id="suggestor"></p>
						<div class="tab">      
							<a id="details">Details</a>
							<a id="reviews_btn">Reviews</a>
						</div>
					</div>

					<div id="mc" class="modal-content">
						<form id="supplierInfo">
							<div class="row">
								<div class="six columns">
									<label for="company_name">Company Name</label>
									<input class="u-full-width" type="text"  name="company_name" required>
									<input type="hidden">
								</div>

								<div class="six columns">
									<label for="business_name">Business Name</label>
									<input class="u-full-width" type="text"  name="business_name">
									<input type="hidden">
								</div>
							</div>

							<div class="row">
								<div class="twelve columns">
									<label for="address">address</label>
									<input class="u-full-width" type="text"  name="address">
									<input type="hidden">
								</div>
							</div>

							<div class="row">
								<div class="six columns">
									<label for="email">Email</label>
									<input class="u-full-width" placeholder="sdf@gmail.com" type="email" name="email">
									<input type="hidden">
								</div>
								<div class="six columns">
									<label for="contact_no">Contact Number</label>
									<input class="u-full-width" type="tel"  name="contact_no" required>
									<input type="hidden">
								</div>
							</div>

							<div class="row">
								<div class="six columns">
									<label for="category_id">Type of Business</label>
									<select class="u-full-width" name="category_id">
										@foreach($categories as $category)
										<option value="{{$category->id}}">{{$category->name}}</option>
										@endforeach
									</select>
									<input type="hidden">
								</div>
								<div class="six columns">
									<label for="contact_person">Contact Person</label>
									<input class="u-full-width" type="text"  name="contact_person">
									<input type="hidden">
								</div>
							</div>

							<div class="row">
								<div class="six columns">
									<label for="website">Website</label>
									<input class="u-full-width" type="text" name="website">
									<input type="hidden">
								</div>

								<div class="six columns">
									<label for="fbpage">Facebook Page</label>
									<input class="u-full-width" type = "text" name="fbpage">
									<input type="hidden">
								</div>
							</div>

							<div id="notes" class="row">
								<div class="twelve columns">
									<label for="note_to_admin">Notes for Administrator</label>
									<textarea class="u-full-width" name="note_to_admin"></textarea readonly >
										<input type="hidden">
									</div>
								</div>

								<a class="button" id="undo">reset</a>
								<a class="button button-primary u-pull-right" id="edit">
									save
									<input type="hidden" id="editID">
								</a>
							</form>

							<div id="review-screen">
								<form class="row">
									<label class="comment-name">Comment</label>

								    <fieldset class="rating">
									    <input type="radio" id="star5" name="rating" value="5" />
									    <label for="star5" title="Rocks!">5 stars</label>
									    <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
									    <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
									    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
									    <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
								    </fieldset>

								    <textarea placeholder="Share something about this supplier..." class="twelve columns"></textarea>

								    <div class="twelve columns">
								    	<button class="u-pull-right button-primary" type="submit">send</button>
								    </div>
								</form>

								<div>
									<
								</div>
								<div id="reviewContent">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>