@extends('admin.layout')
@section('content')

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Edit Map</h2>

        <form id="bldg_search_form">
	        <div class="input-group mb-3" style="width: 300px; position: relative; top: 8px">
	        		@CSRF
						  <input type="search" name="bldg_search" id="bldg_search" placeholder="Enter name of building" class="form-control">
						  <button type="submit" id="search-btn" class="input-group-text"><i class="fa fa-search"></i></button>
					</div>
				</form>
        
        <div class="text-info">
        	<button type="button" id="bldg_btn" class="btn btn-primary"><i class="fa-solid fa-map-location-dot"></i> Buildings</button>
        	<button type="button" id="poi_btn" class="btn btn-success"><i class="fa-solid fa-location-dot"></i> Points-of-Interests</button>
        	<button type="button" id="path_btn" class="btn btn-warning"><i class="fa-sharp fa-solid fa-road"></i> Pathways</button>
        </div>	

		    <!-- Map Placeholder -->
		  	<div id="map"></div>
		  
		</div>

		<!-- Modal asking for What to do with buildings -->
		<div class="modal fade" id="bldg_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Buildings</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body mb-3">
		      	<p>What do you wish to do?&#9;<a id="a_add_modal" href="#" style="font-size: 12px; text-decoration-line: none; margin-left: 30%;">*Add/Edit Building Tutorial</a></p>
	             <div class="text-center mt-3">
		        	<button type="button" id="add_bldg_btn" class="btn btn-success"><i class="fa-solid fa-plus"></i> Add Buildings</button>
		        	<button type="button" id="edit_bldg_btn" class="btn btn-primary"><i class="fa-solid fa-pencil"></i> Edit Building</button>
		        	<button type="button" id="delete_bldg_btn" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete Building</button>
		        </div>
		    </div>
		    </div>
		  </div>
		</div>

		<!-- Modal asking for What to do with POIs -->
		<div class="modal fade" id="poi_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Points-of-Interests</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body mb-3">
		      	<p>What do you wish to do?</p>
	             <div class="">
		        	<button type="button" id="add_poi_btn" class="btn btn-success"><i class="fa-solid fa-plus"></i> Add POI</button>
		        	<button type="button" id="edit_poi_btn" class="btn btn-primary"><i class="fa-solid fa-pencil"></i> Edit POI</button>
		        	<button type="button" id="delete_poi_btn" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete POI</button>
		        </div>
		      </form>
		    </div>
		    </div>
		  </div>
		</div>

		<!-- Modal asking for What to do with Paths -->
		<div class="modal fade" id="path_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Pathways</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body mb-3">
		      	<p>What do you wish to do?</p>
	             <div class="">
		        	<button type="button" id="add_path_btn" class="btn btn-success"><i class="fa-solid fa-plus"></i> Add Pathways</button>
		        	<button type="button" id="edit_path_btn" class="btn btn-primary"><i class="fa-solid fa-pencil"></i> Edit Pathways</button>
		        	<button type="button" id="delete_path_btn" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Delete Pathways</button>
		        </div>
		      </form>
		    </div>
		    </div>
		  </div>
		</div>

		<!-- Demo Modal -->
		<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Add/Edit Building Tutorial</h5>
		        <button type="button" class="add-modal-close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <p>1) Click on the map to reveal the point's corresponding coordinates.</p>
		        <img class="img-responsive" style="height: 90px; margin-bottom: 20px;" src="{{url('public\asset\img\legend_controls\coord1.png')}}">
		        <p>2) Copy the Longitude and Latitude from the pop up.</p>
		        <img class="img-responsive" style="height: 90px; margin-bottom: 20px;" src="{{url('public\asset\img\legend_controls\coord2.png')}}">
		        <p>3) Paste it on the corresponding point on the form.</p>
		        <img class="img-responsive" style="height: 90px; margin-bottom: 20px;" src="{{url('public\asset\img\legend_controls\coord3.png')}}">
		        <p>Refer to the diagram below for the corresponding points of the building.</p>
		        <img class="img-responsive w-100" src="{{url('public\asset\img\legend_controls\coord4.png')}}">
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary add-modal-close" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>

		<!-- Floating Form at the Right (Add Building)-->
		<div class="floating-form" id="add-bldg-form-floating" style="visibility: hidden;">
			<form class="form-control px-5 pt-3 floating-form overflow-scroll" style="width: 300px; height: 100%;" id="add-bldg-form">
		        @CSRF
		        	<div class="row mb-4">
		        		<div class="col-md-9">
				        	<h5>Add Building</h5>
				        </div>
				        <div class="col-md-3">	
				        	<button type="button" class="btn-close" aria-label="Close"></button>
				        </div>	
			        </div>	
		          <div class="row mb-2">
		            <div class="col-md-12">
		              <label for="bldg_code" class="form-label">Building Code</label>
		          </div>
		              <input type="text" class="form-control" id="bldg_code" name="bldg_code" required>
		          </div> 
		          <div class="row mb-2">
		            <div class="col-md-12">
		              <label for="bldg_name" class="form-label">Building Name</label>
		          </div>
		              <input type="text" class="form-control mb-3" id="bldg_name" name="bldg_name" required>
		          </div>

		          <div class="row mb-4">
		            <div class="col-md-12">
		              <label for="bldg_category" class="form-label">Building Category</label>
		          </div>
		              <div class="form-check">
						  <input class="form-check-input" type="radio" name="bldg_category" id="for_classes" value="for_classes" required>
						  <label class="form-check-label" for="for_classes">
						    For Classes
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="bldg_category" id="not_for_classes" value="not_for_classes" required>
						  <label class="form-check-label" for="not_for_classes">
						    Not For Classes
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="bldg_category" id="reference_bldg" value="reference_bldg" required>
						  <label class="form-check-label" for="reference_bldg">
						    Reference Building
						  </label>
						</div>
		          </div>

		          <div class="row">
		          	<h6 class="col-md-12">Coordinates</h6>  
		          </div>
		          <div class="row mb-2">
		            <div class="col-md-12">
		              <label for="bldg_center" class="form-label">Center point of Building</label>
		          </div>
		              <input type="text" class="form-control" id="bldg_center" name="bldg_center" required>
		          </div> 	
		          <div class="row mb-2">
		            <div class="col-md-12">
		              <label for="point_1" class="form-label">Point 1</label>
		          </div>
		              <input type="text" class="form-control" id="point_1" name="point_1" required>
		          </div>  
		          <div class="row mb-2">
		            <div class="col-md-12">
		              <label for="point_2" class="form-label">Point 2</label>
		          </div>
		              <input type="text" class="form-control" id="point_2" name="point_2" required>
		          </div> 
		          <div class="row mb-2">
		            <div class="col-md-12">
		              <label for="point_3" class="form-label">Point 3</label>
		          </div>
		              <input type="text" class="form-control" id="point_3" name="point_3" required>
		          </div> 
		          <div class="row mb-2">
		            <div class="col-md-12">
		              <label for="point_4" class="form-label">Point 4</label>
		          </div>
		              <input type="text" class="form-control mb-4" id="point_4" name="point_4" required>
		          </div>
		          <button type="submit" class="btn btn-primary" id="add-btn">Add Building</button>
		        </form>
		</div>

		<!-- Floating Form at the Right (Edit Building)-->
		<div class="floating-form" id="edit-bldg-form-floating" data-bs-keyboard="true" style="visibility: hidden;">
			<form class="form-control px-5 pt-3 floating-form overflow-scroll" style="width: 250px; height: 100%;" id="edit-bldg-form">
		        @CSRF
		        	<div class="row mb-4">
		        		<div class="col-md-9">
				        	<h5>Edit Building</h5>
				        </div>
				        <div class="col-md-3">	
				        	<button type="button" class="btn-close" aria-label="Close"></button>
				        </div>	
			        </div>
		          		<input type="text" class="form-control" id="bldg_id_edit" name="bldg_id_edit" hidden>	
		          <div class="row mb-2">
		            <div class="col-md-12">
		              <label for="bldg_code_edit" class="form-label">Building Code</label>
		          </div>
		              <input type="text" class="form-control" id="bldg_code_edit" name="bldg_code_edit" required>
		          </div> 
		          <div class="row mb-2">
		            <div class="col-md-12">
		              <label for="bldg_name_edit" class="form-label">Building Name</label>
		          </div>
		              <input type="text" class="form-control mb-3" id="bldg_name_edit" name="bldg_name_edit" required>
		          </div>

		          <div class="row mb-4">
		            <div class="col-md-12">
		              <label for="bldg_category_edit" class="form-label">Building Category</label>
		          </div>
		              <div class="form-check">
						  <input class="form-check-input" type="radio" name="bldg_category_edit" id="for_classes_edit" value="for_classes" checked="false" required>
						  <label class="form-check-label" for="for_classes_edit">
						    For Classes
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="bldg_category_edit" id="not_for_classes_edit" value="not_for_classes" checked="false" required>
						  <label class="form-check-label" for="not_for_classes_edit">
						    Not For Classes
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="bldg_category_edit" id="reference_bldg_edit" value="reference_bldg" checked="false" required>
						  <label class="form-check-label" for="reference_bldg_edit">
						    Reference Building
						  </label>
						</div>
		          </div>

		          <div class="row">
		          	<h6 class="col-md-12">Coordinates (Longitude, Latitude)</h6>  
		          </div>	
		          <div class="row mb-2">
		            <div class="col-md-12">
		              <label for="bldg_center_edit" class="form-label">Center point of Building</label>
		          </div>
		              <input type="text" class="form-control" id="bldg_center_edit" name="bldg_center_edit" required>
		          </div>
		          <div class="row mb-2">
		            <div class="col-md-12">
		              <label for="point_1_edit" class="form-label">Point 1</label>
		          </div>
		              <input type="text" class="form-control" id="point_1_edit" name="point_1_edit" required>
		          </div>  
		          <div class="row mb-2">
		            <div class="col-md-12">
		              <label for="point_2_edit" class="form-label">Point 2</label>
		          </div>
		              <input type="text" class="form-control" id="point_2_edit" name="point_2_edit" required>
		          </div> 
		          <div class="row mb-2">
		            <div class="col-md-12">
		              <label for="point_3_edit" class="form-label">Point 3</label>
		          </div>
		              <input type="text" class="form-control" id="point_3_edit" name="point_3_edit" required>
		          </div> 
		          <div class="row mb-2">
		            <div class="col-md-12">
		              <label for="point_4_edit" class="form-label">Point 4</label>
		          </div>
		              <input type="text" class="form-control mb-4" id="point_4_edit" name="point_4_edit" required>
		          </div> 

		          <button type="submit" class="btn btn-primary" id="edit-btn">Save Changes</button>
		        </form>
		</div>

		<!-- Edit modal asking for building code -->
		<div class="modal fade" id="edit_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Edit Building</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		        <form class="form-control" id="bldg_code_edit_form">
		        	@CSRF
		        		<div class="row mb-2">
		        			<div class="col-md-12">
			              <label for="bldg_code_edit" class="form-label">Select the building you wish to edit: </label> 
			            </div>
			          </div>

			          @foreach($building as $bldg)
			          	<div class="form-check">
									  <input class="form-check-input" type="radio" name="bldg_edit" id="{{$bldg->bldg_code}}" value="{{$bldg->bldg_code}}">
									  <label class="form-check-label" for="{{$bldg->bldg_code}}">
									    {{$bldg->bldg_name}}
									  </label>
									</div>
		            @endforeach                 
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-primary" id="submit_bldg_code">Submit</button>
		      </div>
		      </form>
		    </div>
		    </div>
		  </div>
		</div>

		<!-- Modal for removing building -->
		<div class="modal fade" id="delete_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Delete Building</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		        <form class="form-control" id="bldg_delete_form">
		        	@CSRF
		        		<div class="row mb-2">
		        			<div class="col-md-12">
			              <label for="bldg_delete" class="form-label">Select the building you wish to remove: <br>
			              	<strong>Warning: Once deleted it can't be restored.</strong></label> 
			            </div>
			          </div>

			          @foreach($building as $bldg)
			          	<div class="form-check">
									  <input class="form-check-input" type="radio" name="bldg_delete" id="{{$bldg->bldg_name}}" value="{{$bldg->bldg_id}}">
									  <label class="form-check-label" for="{{$bldg->bldg_name}}">
									    {{$bldg->bldg_name}}
									  </label>
									</div>
		            @endforeach                 
		      <div class="modal-footer">
		        <button type="button" class="btn btn-danger" id="submit_delete_bldg"><i class="fa fa-trash"></i> Delete Building</button>
		      </div>
		      </form>
		    </div>
		    </div>
		  </div>
		</div>

		<!-- Modal for confirmation in removing building -->
		<div class="modal fade" id="confirm_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Delete Building</h5>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		      	<div class="text-center">
			        <p>Are you sure you want to remove the building you selected?</p>
			        <br>
			        <button id="confirm-btn" class="btn btn-danger">Yes</button>
			        <button id="cancel-btn" class="btn btn-primary">Cancel</button>
			      </div>  
		    </div>
		    </div>
		  </div>
		</div>

		<!-- Floating Form at the Right (Add POI)-->
        <div class="floating-form" id="add-poi-form-floating" style="visibility: hidden;">
              <form id="add-poi-form" class="form-control px-5 pt-3 floating-form overflow-scroll" style="width: 300px; height: 100%;">
                @CSRF
                    <div class="row mb-4">
                          <div class="col-md-9">
                                <h5>Add POI</h5>
                            </div>
                            <div class="col-md-3">      
                                <button type="button" class="btn-close" aria-label="Close"></button>
                            </div>    
                      </div>    
                  <div class="row mb-2">
                    <div class="col-md-12">
                      <label for="poi_name" class="form-label">Point-of-Interest Name</label>
                  </div>
                      <input type="text" class="form-control mb-3" id="poi_name" name="poi_name" required>
                  </div> 
                  <div class="row">
                    <div class="col-md-12">
                      <label for="point_1_poi" class="form-label">Coordinates</label>
                    </div>
                    <input type="text" class="form-control" id="point_1_poi" name="point_1_poi" required>  
                  </div>  
                  <button type="submit" class="btn btn-primary mt-3" id="add-poi-btn">Add Point-of-Interest</button>
                </form>
        </div>

        <!-- Floating Form at the Right (Edit POI)-->
        <div class="floating-form" id="edit-poi-form-floating" style="visibility: hidden;">
              <form id="edit-poi-form" class="form-control px-5 pt-3 floating-form overflow-scroll" style="width: 300px; height: 100%;">
                @CSRF
                    <div class="row mb-4">
                      <div class="col-md-9">
                          <h5>Edit Points-of-Interest</h5>
                      </div>
                      <div class="col-md-3">      
                          <button type="button" class="btn-close" aria-label="Close"></button>
                      </div>    
                    </div> 
                      <input type="text" class="form-control mb-3" id="poi_id_edit" name="poi_id_edit" hidden>   
                    
                    <div class="row mb-2">
                      <div class="col-md-12">
                        <label for="poi_name_edit" class="form-label">Point-of-Interest Name</label>
                      </div>
                      <input type="text" class="form-control mb-3" id="poi_name_edit" name="poi_name_edit" required>
                    </div> 
                  <div class="row">
                    <div class="col-md-12">
                      <label for="point_1_poi_edit" class="form-label">Coordinates</label>
                    </div>
                    <input type="text" class="form-control" id="point_1_poi_edit" name="point_1_poi_edit" required>  
                  </div>  


                  <button type="submit" class="btn btn-primary mt-3" id="edit-poi-btn">Edit POI</button>
                </form>
        </div>

        <!-- Edit modal asking for POI code -->
        <div class="modal fade" id="edit_poi_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Point-of-Interest</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="form-control" id="poi_code_edit_form">
                    @CSRF
                          <div class="row mb-2">
                                <div class="col-md-12">
                            <label for="poi_code_edit" class="form-label">Select the point-of-interest you wish to edit: </label> 
                          </div>
                        </div>

                        @foreach($poi as $_poi)
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="poi_code_edit" id="{{$_poi->poi_name}}" value="{{$_poi->poi_name}}">
                            <label class="form-check-label" for="{{$_poi->poi_name}}">
                              {{$_poi->poi_name}}
                            </label>
                          </div>
                    @endforeach                 
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="submit_poi_code">Submit</button>
              </div>
              </form>
            </div>
            </div>
          </div>
        </div>

        <!-- Modal for removing POI -->
        <div class="modal fade" id="delete_poi_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Delete Point-of-Interest</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="form-control" id="poi_delete_form">
                    @CSRF
                    <div class="row mb-2">
                          <div class="col-md-12">
                      <label for="poi_delete" class="form-label">Select the Point-of-Interest you wish to remove: <br>
                          <strong>Warning: Once deleted it can't be restored.</strong></label> 
                    </div>
                  </div>

                  @foreach($poi as $_poi)
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="poi_delete" id="{{$_poi->poi_name}}" value="{{$_poi->poi_name}}">
                      <label class="form-check-label" for="poi_delete">
                        {{$_poi->poi_name}}
                      </label>
                    </div>
                    @endforeach                 
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="submit_delete_poi"><i class="fa fa-trash"></i> Delete Point-of-Interest</button>
              </div>
              </form>
            </div>
            </div>
          </div>
        </div>

        <!-- Modal for confirmation in removing POI -->
        <div class="modal fade" id="confirm_modal_poi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Delete Point-of-Interest</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                    <div class="text-center">
                      <p>Are you sure you want to remove the Point-of-Interest you selected?</p>
                      <br>
                      <button id="confirm-btn-poi" class="btn btn-danger">Yes</button>
                      <button id="cancel-btn-poi" class="btn btn-primary">Cancel</button>
                    </div>  
            </div>
            </div>
          </div>
        </div>

        <!-- Floating Form at the Right (Add Path)-->
        <div class="floating-form" id="add-path-form-floating" style="visibility: hidden;">
              <form id="add-path-form" class="form-control px-5 pt-3 floating-form overflow-scroll" style="width: 300px; height: 100%;">
                @CSRF
                    <div class="row mb-4">
                          <div class="col-md-9">
                                <h5>Add Pathway</h5>
                            </div>
                            <div class="col-md-3">      
                                <button type="button" class="btn-close" aria-label="Close"></button>
                            </div>    
                      </div>    
                  <div class="row mb-2">
                    <div class="col-md-12">
                      <label for="pth_code" class="form-label">Pathway Name</label>
                  </div>
                      <input type="text" class="form-control mb-3" id="pth_code" name="pth_code" required>
                  </div> 
                  <div class="row">
                    <h6 class="col-md-12">Coordinates</h6>  
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-12">
                      <label for="point_1_pth" class="form-label">Point 1</label>
                  </div>
                      <input type="text" class="form-control" id="point_1_pth" name="point_1_pth" required>
                  </div>  
                  <div class="row mb-2">
                    <div class="col-md-12">
                      <label for="point_2_pth" class="form-label">Point 2</label>
                  </div>
                      <input type="text" class="form-control" id="point_2_pth" name="point_2_pth" required>
                  </div> 

                  <button type="submit" class="btn btn-primary" id="add-path-btn">Add Path</button>
                </form>
        </div>

        <!-- Floating Form at the Right (Edit Path)-->
        <div class="floating-form" id="edit-path-form-floating" style="visibility: hidden;">
              <form id="edit-path-form" class="form-control px-5 pt-3 floating-form overflow-scroll" style="width: 300px; height: 100%;">
                @CSRF
                    <div class="row mb-4">
                      <div class="col-md-9">
                          <h5>Edit Pathway</h5>
                      </div>
                      <div class="col-md-3">      
                          <button type="button" class="btn-close" aria-label="Close"></button>
                      </div>    
                    </div> 
                      <input type="text" class="form-control mb-3" id="pth_id_edit" name="pth_id_edit" hidden>   
                  <div class="row mb-2">
                    <div class="col-md-12">
                      <label for="pth_code_edit" class="form-label">Pathway Name</label>
                  </div>
                      <input type="text" class="form-control mb-3" id="pth_code_edit" name="pth_code_edit" required>
                  </div> 
                  <div class="row">
                    <h6 class="col-md-12">Coordinates</h6>  
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-12">
                      <label for="point_1_pth_edit" class="form-label">Point 1</label>
                  </div>
                      <input type="text" class="form-control" id="point_1_pth_edit" name="point_1_pth_edit" required>
                  </div>  
                  <div class="row mb-2">
                    <div class="col-md-12">
                      <label for="point_2_pth_edit" class="form-label">Point 2</label>
                  </div>
                      <input type="text" class="form-control" id="point_2_pth_edit" name="point_2_pth_edit" required>
                  </div> 

                  <button type="submit" class="btn btn-primary" id="edit-path-btn">Edit Path</button>
                </form>
        </div>

        <!-- Edit modal asking for path code -->
        <div class="modal fade" id="edit_path_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Edit Pathway</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="form-control" id="path_code_edit_form">
                    @CSRF
                          <div class="row mb-2">
                                <div class="col-md-12">
                            <label for="path_code_edit" class="form-label">Select the pathway you wish to edit: </label> 
                          </div>
                        </div>

                        @foreach($paths as $path)
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="path_code_edit" id="{{$path->pth_code}}" value="{{$path->pth_code}}">
                            <label class="form-check-label" for="{{$path->pth_code}}">
                              {{$path->pth_code}}
                            </label>
                          </div>
                    @endforeach                 
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="submit_path_code">Submit</button>
              </div>
              </form>
            </div>
            </div>
          </div>
        </div>

        <!-- Modal for removing pathway -->
        <div class="modal fade" id="delete_path_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Delete Pathway</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form class="form-control" id="path_delete_form">
                    @CSRF
                    <div class="row mb-2">
                          <div class="col-md-12">
                      <label for="path_delete" class="form-label">Select the pathway you wish to remove: <br>
                          <strong>Warning: Once deleted it can't be restored.</strong></label> 
                    </div>
                  </div>

                  @foreach($paths as $path)
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="path_delete" id="{{$path->pth_id}}" value="{{$path->pth_code}}">
                      <label class="form-check-label" for="path_delete">
                        {{$path->pth_code}}
                      </label>
                    </div>
                    @endforeach                 
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="submit_delete_path"><i class="fa fa-trash"></i> Delete Pathway</button>
              </div>
              </form>
            </div>
            </div>
          </div>
        </div>

        <!-- Modal for confirmation in removing building -->
        <div class="modal fade" id="confirm_modal_path" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Delete Pathway</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                    <div class="text-center">
                      <p>Are you sure you want to remove the pathway you selected?</p>
                      <br>
                      <button id="confirm-btn-path" class="btn btn-danger">Yes</button>
                      <button id="cancel-btn-path" class="btn btn-primary">Cancel</button>
                    </div>  
            </div>
            </div>
          </div>
        </div>
</main>

<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

<!-- Include jQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<!-- Autocomplete Search -->
<script type="text/javascript">
    // Convert the PHP array to a JSON string
    var building_names_json = @json($building);
    var poi_names_json = @json($poi);

    $("#bldg_search").autocomplete({
        source: function(request, response) {
            var term = request.term.toLowerCase();
            var results = [];

            var poi_names = poi_names_json.map(function(poi) {
                return poi.poi_name;
            });


            // Filter and combine results from multiple sources
            $.each(building_names_json, function(index, building) {
                // Ensure that the properties exist and are not null or undefined
                var buildingName = (building.bldg_name || "").toLowerCase();
                var buildingServices = (building.bldg_services || "").toLowerCase();
                var buildingRooms = (building.bldg_rooms || "").toLowerCase();


                // Check if the term matches in any of the sources
                if (buildingName.includes(term) || buildingServices.includes(term) || buildingRooms.includes(term)) {
                    results.push(building.bldg_name);
                }
            });

            $.each(poi_names, function(index, poiName) {
                if (poiName.toLowerCase().includes(term)) {
                    results.push(poiName);
                }
            });

            response(results);
        },
        maxResults: 10, // Set the maximum number of results to display
        minLength: 1 // Specify the minimum length to trigger autocomplete
    });
</script>

<!-- Show Modals asking for input -->
<script type="text/javascript">
	$('#a_add_modal').click(function () {
		$('#add_modal').modal('show');
	}); 
	$('#bldg_btn').click(function () {
		$('#bldg_modal').modal('show');
	});
	$('#poi_btn').click(function () {
		$('#poi_modal').modal('show');
	});
	$('#path_btn').click(function () {
		$('#path_modal').modal('show');
	}); 
</script>

<!-- Show/Hide Add Building Form -->
<script type="text/javascript">
	$('#add_bldg_btn').click(function() {
    $('#add-bldg-form-floating').css('visibility', 'visible');
    $('#edit-bldg-form-floating').css('visibility', 'hidden');
    $('#bldg_modal').modal('hide');
});
</script>

<!-- Show or Hide Edit Modal -->
<script type="text/javascript">
	$('#edit_bldg_btn').click(function () {
		$('#add-bldg-form-floating').css('visibility', 'hidden');
		$('#edit-bldg-form-floating').css('visibility', 'hidden');
		$('#edit_modal').modal('show');
		$('#bldg_modal').modal('hide');
	})
</script>

<!-- Show or Hide Delete Modal -->
<script type="text/javascript">
	$('#delete_bldg_btn').click(function () {
		$('#add-bldg-form-floating').css('visibility', 'hidden');
		$('#edit-bldg-form-floating').css('visibility', 'hidden');
		$('#delete_modal').modal('show');
		$('#bldg_modal').modal('hide');
	})
</script>

<!-- Hide Forms -->
<script type="text/javascript">
	$('.add-modal-close').click(function () {
		$('#add_modal').modal('hide');
	});
	$('.btn-close').click(function() {
    $('#add-bldg-form-floating').css('visibility', 'hidden');
    $('#edit-bldg-form-floating').css('visibility', 'hidden');
});
</script>

<!-- AJAX for Submitting Building Code to Edit Building -->
<script type="text/javascript">
	
</script>

<!-- AJAX for Submitting Building Code to Delete Building -->
<script type="text/javascript">
	$('#submit_delete_bldg').on('click', function (e) {
		e.preventDefault();
		$('#confirm_modal').modal('show');
		$('#delete_modal').modal('hide');
	});

	$('#cancel-btn').on('click', function(e) {
		e.preventDefault();
		$('#confirm_modal').modal('hide');
		$('#delete_modal').modal('show');
	});	

	$('#confirm-btn').on('click', function(e) {
			e.preventDefault();
			$('#confirm_modal').modal('hide');
			$('#delete_modal').modal('hide');

		$.ajax({
			url: "delete-bldg",
			method: "POST",
			data: $('#bldg_delete_form').serialize(),
			beforeSend: function() {
				$('#submit_delete_bldg').attr('disabled', true);
			},
			success: function (data) {
				if (data == 1) {
            Swal.fire(
              'Success!',
              'Building successfully removed.',
              'success'
              );
            window.location.reload();
          } else {
            Swal.fire(
              'Oops!',
              'Error in removing building. Please try again.',
              'error'
              );

            $('#delete_modal').modal('show');
          }

          $('#submit_delete_bldg').attr('disabled', false);
			}
		});
	});
</script>

<!-- AJAX for Adding Building -->
<script type="text/javascript">
    // login script for admin account
    $('#add-bldg-form').on('submit', function(e) {
      e.preventDefault();

      bldg_code = $('#bldg_code').val();
      bldg_name = $('#bldg_name').val();
      point1 = $('#point_1').val();
      point2 = $('#point_2').val();
      point3 = $('#point_3').val();
      point4 = $('#point_4').val();
      point_center = $('#bldg_center').val();
	  spl_point1 = point1.split(", ");
	  spl_point2 = point2.split(", ");
	  spl_point3 = point3.split(", ");
	  spl_point4 = point4.split(", ");
	  spl_point_center = point_center.split(", ");

	  //Checks if both lang lat input is a float else it will generate an error
      if(!(isNaN(parseFloat(spl_point1[0]))) && !(isNaN(parseFloat(spl_point1[1]))) && !(isNaN(parseFloat(spl_point2[0]))) && !(isNaN(parseFloat(spl_point2[1]))) && !(isNaN(parseFloat(spl_point3[0]))) && !(isNaN(parseFloat(spl_point3[1]))) && !(isNaN(parseFloat(spl_point4[0]))) && !(isNaN(parseFloat(spl_point4[1]))) && !(isNaN(parseFloat(spl_point_center[0]))) && !(isNaN(parseFloat(spl_point_center[1])))){

      	//splits the value of lng lat, to validate if it is inbounds
      	  spl_lng1 = spl_point1[0].split(".");
		  spl_lat1 = spl_point1[1].split(".");
		  spl_lng2 = spl_point2[0].split(".");
		  spl_lat2 = spl_point2[1].split(".");
		  spl_lng3 = spl_point3[0].split(".");
		  spl_lat3 = spl_point3[1].split(".");
		  spl_lng4 = spl_point4[0].split(".");
		  spl_lat4 = spl_point4[1].split(".");
		  spl_lng_center = spl_point_center[0].split(".");
		  spl_lat_center = spl_point_center[1].split(".");

      	//Checks if lng and lat inputs are inside bounds then updates the coordinates
      	if((( spl_lng1[0] == 121 && spl_lng1[1].length >= 12) && (spl_lat1[0] == 16 && spl_lat1[1].length >= 12) ) && (( spl_lng2[0] == 121 && spl_lng2[1].length >= 12) && (spl_lat2[0] == 16 && spl_lat2[1].length >= 12) ) && (( spl_lng3[0] == 121 && spl_lng3[1].length >= 12) && (spl_lat3[0] == 16 && spl_lat3[1].length >= 12) ) && (( spl_lng4[0] == 121 && spl_lng4[1].length >= 12) && (spl_lat4[0] == 16 && spl_lat4[1].length >= 12) ) && (( spl_lng_center[0] == 121 && spl_lng_center[1].length >= 12) && (spl_lat_center[0] == 16 && spl_lat_center[1].length >= 12) )){

			var specialCharacters = ["!", "@", "#", "$", "-", "%", "^", "*", "+", "=", "'", "/", "<", ",", ">", "?"];
			var containsSpecialCharacters = false;

			for (var i = 0; i < specialCharacters.length; i++) {
			  if (bldg_code.includes(specialCharacters[i]) || bldg_name.includes(specialCharacters[i])) {
			  	containsSpecialCharacters = true;
			  	break;
			  } 
			}

			if (containsSpecialCharacters) {
				  Swal.fire(
	              'Oops!',
	              'The building code or building name contains special characters. Please remove any special characters.',
	              'warning'
	              );
				} else{
					$.ajax({
			        url: "add-bldg",
			        method: "POST",
			        data: $('#add-bldg-form').serialize(),
			        beforeSend: function() {
			          $('#add-btn').attr('disabled', true);
			        },
			        success: function(data) {
			        	if (data == 2) {
			            Swal.fire(
			              'Oops!',
			              'Building already exists.',
			              'warning'
			              );
			            $('#add-bldg-form')[0].reset();
			          }
			          else if (data == 1) {
			            Swal.fire(
			              'Success!',
			              'Building successfully added.',
			              'success'
			              );
			            window.location.reload();
			          } else {
			            Swal.fire(
			              'Oops!',
			              'An error occured, please try again.',
			              'error'
			              );

			            $('#add-bldg-form')[0].reset();
			          }

			          $('#add-btn').attr('disabled', false);
			        }
			      });
				}

      	} else {
      		Swal.fire(
              'Oops!',
              'The coordinates you entered is out of bounds.',
              'warning'
              );
      }

  	} else {
      	Swal.fire(
              'Oops!',
              'The coordinates you entered generated an error. <br>Please double check the coordinates you entered.',
              'warning'
              );
  		}
    });

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
</script>

<!-- AJAX for Editing Building -->
<script type="text/javascript">
    $('#edit-bldg-form').on('submit', function(e) {
      e.preventDefault();

      point1 = $('#point_1_edit').val();
      point2 = $('#point_2_edit').val();
      point3 = $('#point_3_edit').val();
      point4 = $('#point_4_edit').val();
      point_center = $('#bldg_center_edit').val();
	  spl_point1 = point1.split(", ");
	  spl_point2 = point2.split(", ");
	  spl_point3 = point3.split(", ");
	  spl_point4 = point4.split(", ");
	  spl_point_center = point_center.split(", ");

	  //Checks if both lang lat input is a float else it will generate an error
      if(!(isNaN(parseFloat(spl_point1[0]))) && !(isNaN(parseFloat(spl_point1[1]))) && !(isNaN(parseFloat(spl_point2[0]))) && !(isNaN(parseFloat(spl_point2[1]))) && !(isNaN(parseFloat(spl_point3[0]))) && !(isNaN(parseFloat(spl_point3[1]))) && !(isNaN(parseFloat(spl_point4[0]))) && !(isNaN(parseFloat(spl_point4[1]))) && !(isNaN(parseFloat(spl_point_center[0]))) && !(isNaN(parseFloat(spl_point_center[1])))){

      	//splits the value of lng lat, to validate if it is inbounds
      	  spl_lng1 = spl_point1[0].split(".");
		  spl_lat1 = spl_point1[1].split(".");
		  spl_lng2 = spl_point2[0].split(".");
		  spl_lat2 = spl_point2[1].split(".");
		  spl_lng3 = spl_point3[0].split(".");
		  spl_lat3 = spl_point3[1].split(".");
		  spl_lng4 = spl_point4[0].split(".");
		  spl_lat4 = spl_point4[1].split(".");
		  spl_lng_center = spl_point_center[0].split(".");
		  spl_lat_center = spl_point_center[1].split(".");

      	//Checks if lng and lat inputs are inside bounds then updates the coordinates
      	if((( spl_lng1[0] == 121 && spl_lng1[1].length >= 12) && (spl_lat1[0] == 16 && spl_lat1[1].length >= 12) ) && (( spl_lng2[0] == 121 && spl_lng2[1].length >= 12) && (spl_lat2[0] == 16 && spl_lat2[1].length >= 12) ) && (( spl_lng3[0] == 121 && spl_lng3[1].length >= 12) && (spl_lat3[0] == 16 && spl_lat3[1].length >= 12) ) && (( spl_lng4[0] == 121 && spl_lng4[1].length >= 12) && (spl_lat4[0] == 16 && spl_lat4[1].length >= 12) ) && (( spl_lng_center[0] == 121 && spl_lng_center[1].length >= 12) && (spl_lat_center[0] == 16 && spl_lat_center[1].length >= 12) )){
      			
      	$.ajax({
        url: "edit-bldg",
        method: "POST",
        data: $('#edit-bldg-form').serialize(),
        beforeSend: function() {
          $('#edit-btn').attr('disabled', true);
        },
        success: function(data) {
          if (data == 1) {
            Swal.fire(
              'Success!',
              'Changes successfully changed.',
              'success'
              );
            window.location.reload();
          } else {
            Swal.fire(
              'Oops!',
              'An error occured, please try again.',
              'error'
              );
            	$('#edit_modal').modal('show');
				      $('#edit-bldg-form-floating').css('visibility', 'hidden');
          }

          $('#edit-btn').attr('disabled', false);
        }
      });
      } else {
      		Swal.fire(
              'Oops!',
              'The coordinates you entered is out of bounds.',
              'warning'
              );
      }

  	} else {
      	Swal.fire(
              'Oops!',
              'The coordinates you entered generated an error. <br>Please double check the coordinates you entered.',
              'warning'
              );
  		} 
    });

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
</script>

<!-- POIs -->
<!-- Show Add POI Form -->
<script type="text/javascript">
      $('#add_poi_btn').click(function() {
    $('#edit-poi-form-floating').css('visibility', 'hidden');
    $('#add-poi-form-floating').css('visibility', 'visible');
    $('#poi_modal').modal('hide');
});
</script>

<!-- Show Edit POI Form -->
<script type="text/javascript">
    $('#edit_poi_btn').click(function() {
    $('#add-poi-form-floating').css('visibility', 'hidden');
    $('#edit-poi-form-floating').css('visibility', 'hidden');
    $('#edit_poi_modal').modal('show');
    $('#poi_modal').modal('hide');
});
</script> 

<!-- Show Delete POI Form -->
<script type="text/javascript">
    $('#delete_poi_btn').click(function() {
    $('#add-poi-form-floating').css('visibility', 'hidden');
    $('#edit-poi-form-floating').css('visibility', 'hidden');
    $('#delete_poi_modal').modal('show');
});
</script>

<!-- Hide Forms -->
<script type="text/javascript">
      $('.btn-close').click(function() {
    $('#add-poi-form-floating').css('visibility', 'hidden');
    $('#edit-poi-form-floating').css('visibility', 'hidden');
});
</script>

<!-- AJAX for Adding POI -->
<script type="text/javascript">
    // login script for admin account
    $('#add-poi-form').on('submit', function(e) {
      e.preventDefault();

      point1 = $('#point_1_poi').val();
	  spl_point1 = point1.split(", ");

	  //Checks if both lang lat input is a float else it will generate an error
      if(!(isNaN(parseFloat(spl_point1[0]))) && !(isNaN(parseFloat(spl_point1[1])))){

      	//splits the value of lng lat, to validate if it is inbounds
      	  spl_lng1 = spl_point1[0].split(".");
		  spl_lat1 = spl_point1[1].split(".");

      	//Checks if lng and lat inputs are inside bounds then updates the coordinates
      	if((spl_lng1[0] == 121 && spl_lng1[1].length >= 12) && (spl_lat1[0] == 16 && spl_lat1[1].length >= 12)){

      	$.ajax({
        url: "add-poi",
        method: "POST",
        data: $('#add-poi-form').serialize(),
        beforeSend: function() {
          $('#add-poi-btn').attr('disabled', true);
        },
        success: function(data) {
            if (data == 2) {
            Swal.fire(
              'Oops!',
              'Point-of-Interest already exists.',
              'warning'
              );
            $('#add-poi-form')[0].reset();
          }
          else if (data == 1) {
            Swal.fire(
              'Success!',
              'Point-of-Interest successfully added.',
              'success'
              );
            window.location.reload();
          } else {
            Swal.fire(
              'Oops!',
              'An error occured, please try again.',
              'error'
              );

            $('#add-poi-form')[0].reset();
          }

          $('#add-btn').attr('disabled', false);
        }
      });

      	} else {
      		Swal.fire(
              'Oops!',
              'The coordinates you entered is out of bounds.',
              'warning'
              );
      }

  	} else {
      	Swal.fire(
              'Oops!',
              'The coordinates you entered generated an error. <br>Please double check the coordinates you entered.',
              'warning'
              );
  		}
    });

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
</script>

<!-- AJAX for Editing Point-of-Interest -->
<script type="text/javascript">
    $('#edit-poi-form').on('submit', function(e) {
      e.preventDefault();

      point1 = $('#point_1_poi_edit').val();
	  spl_point1 = point1.split(", ");

	  //Checks if both lang lat input is a float else it will generate an error
      if(!(isNaN(parseFloat(spl_point1[0]))) && !(isNaN(parseFloat(spl_point1[1])))){

      	//splits the value of lng lat, to validate if it is inbounds
      	  spl_lng1 = spl_point1[0].split(".");
		  spl_lat1 = spl_point1[1].split(".");

      	//Checks if lng and lat inputs are inside bounds then updates the coordinates
      	if((spl_lng1[0] == 121 && spl_lng1[1].length >= 12) && (spl_lat1[0] == 16 && spl_lat1[1].length >= 12)){

      	$.ajax({
        url: "edit-poi",
        method: "POST",
        data: $('#edit-poi-form').serialize(),
        beforeSend: function() {
          $('#edit-poi-btn').attr('disabled', true);
        },
        success: function(data) {
            if (data == 1) {
            Swal.fire(
              'Success!',
              'Changes successfully saved.',
              'success'
              );
            window.location.reload();
          } else {
            Swal.fire(
              'Oops!',
              'An error occured, please try again.',
              'error'
              );

            $('#edit-poi-form')[0].reset();
          }

          $('#edit-poi-btn').attr('disabled', false);
        }
      });

      	} else {
      		Swal.fire(
              'Oops!',
              'The coordinates you entered is out of bounds.',
              'warning'
              );
      }

  	} else {
      	Swal.fire(
              'Oops!',
              'The coordinates you entered generated an error. <br>Please double check the coordinates you entered.',
              'warning'
              );
  		}
    });

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
</script>

<!-- AJAX for Submitting Building Code to Delete POI -->
<script type="text/javascript">
      $('#submit_delete_poi').on('click', function (e) {
            e.preventDefault();
            $('#confirm_modal_poi').modal('show');
            $('#delete_poi_modal').modal('hide');
      });

      $('#cancel-btn-poi').on('click', function(e) {
            e.preventDefault();
            $('#confirm_modal_poi').modal('hide');
            $('#delete_poi_modal').modal('show');
      });   

      $('#confirm-btn-poi').on('click', function(e) {
                  e.preventDefault();
                  $('#confirm_modal_poi').modal('hide');
                  $('#delete_poi_modal').modal('hide');

            $.ajax({
                  url: "delete-poi",
                  method: "POST",
                  data: $('#poi_delete_form').serialize(),
                  beforeSend: function() {
                        $('#submit_delete_poi').attr('disabled', true);
                  },
                  success: function (data) {
                        if (data == 1) {
            Swal.fire(
              'Success!',
              'Point-of-Interest successfully removed.',
              'success'
              );
            window.location.reload();
          } else {
            Swal.fire(
              'Oops!',
              'Error in removing Point-of-Interest. Please try again.',
              'error'
              );

            $('#delete_poi_modal').modal('show');
          }

          $('#submit_delete_poi').attr('disabled', false);
                  }
            });
      });

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
</script> 

<!-- Paths -->
<!-- Show Add Path Form -->
<script type="text/javascript">
      $('#add_path_btn').click(function() {
    $('#edit-path-form-floating').css('visibility', 'hidden');
    $('#add-path-form-floating').css('visibility', 'visible');
    $('#path_modal').modal('hide');
});
</script>

<!-- Show Edit Path Form -->
<script type="text/javascript">
    $('#edit_path_btn').click(function() {
    $('#add-path-form-floating').css('visibility', 'hidden');
    $('#edit-path-form-floating').css('visibility', 'hidden');
    $('#edit_path_modal').modal('show');
    $('#path_modal').modal('hide');
});
</script> 

<!-- Show Edit Path Form -->
<script type="text/javascript">
    $('#delete_path_btn').click(function() {
    $('#add-path-form-floating').css('visibility', 'hidden');
    $('#edit-path-form-floating').css('visibility', 'hidden');
    $('#delete_path_modal').modal('show');
});
</script>

<!-- Hide Forms -->
<script type="text/javascript">
      $('.btn-close').click(function() {
    $('#add-path-form-floating').css('visibility', 'hidden');
    $('#edit-path-form-floating').css('visibility', 'hidden');
});
</script>

<!-- AJAX for Adding Pathway -->
<script type="text/javascript">
    // login script for admin account
    $('#add-path-form').on('submit', function(e) {
      e.preventDefault();

      point1 = $('#point_1_pth').val();
      point2 = $('#point_2_pth').val();
	  spl_point1 = point1.split(", ");
	  spl_point2 = point2.split(", ");
	  
	  //Checks if both lang lat input is a float else it will generate an error
      if(!(isNaN(parseFloat(spl_point1[0]))) && !(isNaN(parseFloat(spl_point1[1]))) && !(isNaN(parseFloat(spl_point2[0]))) && !(isNaN(parseFloat(spl_point2[1])))){

      	//splits the value of lng lat, to validate if it is inbounds
      	  spl_lng1 = spl_point1[0].split(".");
		  spl_lat1 = spl_point1[1].split(".");
		  spl_lng2 = spl_point2[0].split(".");
		  spl_lat2 = spl_point2[1].split(".");

      	//Checks if lng and lat inputs are inside bounds then updates the coordinates
      	if((( spl_lng1[0] == 121 && spl_lng1[1].length >= 12) && (spl_lat1[0] == 16 && spl_lat1[1].length >= 12) ) && (( spl_lng2[0] == 121 && spl_lng2[1].length >= 12) && (spl_lat2[0] == 16 && spl_lat2[1].length >= 12) )){

      	$.ajax({
        url: "add-path",
        method: "POST",
        data: $('#add-path-form').serialize(),
        beforeSend: function() {
          $('#add-path-btn').attr('disabled', true);
        },
        success: function(data) {
            if (data == 2) {
            Swal.fire(
              'Oops!',
              'Pathway already exists.',
              'warning'
              );
            $('#add-path-form')[0].reset();
          }
          else if (data == 1) {
            Swal.fire(
              'Success!',
              'Pathway successfully added.',
              'success'
              );
            window.location.reload();
          } else {
            Swal.fire(
              'Oops!',
              'An error occured, please try again.',
              'error'
              );

            $('#add-path-form')[0].reset();
          }

          $('#add-btn').attr('disabled', false);
        }
      });

      	} else {
      		Swal.fire(
              'Oops!',
              'The coordinates you entered is out of bounds.',
              'warning'
              );
      }

  	} else {
      	Swal.fire(
              'Oops!',
              'The coordinates you entered generated an error. <br>Please double check the coordinates you entered.',
              'warning'
              );
  		}
    });

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
</script>


<!-- AJAX for Editing Pathway -->
<script type="text/javascript">
    // login script for admin account
    $('#edit-path-form').on('submit', function(e) {
      e.preventDefault();

      point1 = $('#point_1_pth_edit').val();
      point2 = $('#point_2_pth_edit').val();
	  spl_point1 = point1.split(", ");
	  spl_point2 = point2.split(", ");
	  
	  //Checks if both lang lat input is a float else it will generate an error
      if(!(isNaN(parseFloat(spl_point1[0]))) && !(isNaN(parseFloat(spl_point1[1]))) && !(isNaN(parseFloat(spl_point2[0]))) && !(isNaN(parseFloat(spl_point2[1])))){

      	//splits the value of lng lat, to validate if it is inbounds
      	  spl_lng1 = spl_point1[0].split(".");
		  spl_lat1 = spl_point1[1].split(".");
		  spl_lng2 = spl_point2[0].split(".");
		  spl_lat2 = spl_point2[1].split(".");

      	//Checks if lng and lat inputs are inside bounds then updates the coordinates
      	if((( spl_lng1[0] == 121 && spl_lng1[1].length >= 12) && (spl_lat1[0] == 16 && spl_lat1[1].length >= 12) ) && (( spl_lng2[0] == 121 && spl_lng2[1].length >= 12) && (spl_lat2[0] == 16 && spl_lat2[1].length >= 12) )){

	      $.ajax({
        url: "edit-path",
        method: "POST",
        data: $('#edit-path-form').serialize(),
        beforeSend: function() {
          $('#edit-path-btn').attr('disabled', true);
        },
        success: function(data) {
            if (data == 1) {
            Swal.fire(
              'Success!',
              'Changes successfully saved.',
              'success'
              );
            window.location.reload();
          } else {
            Swal.fire(
              'Oops!',
              'An error occured, please try again.',
              'error'
              );

            $('#edit-path-form')[0].reset();
          }

          $('#edit-path-btn').attr('disabled', false);
        }
      });

      	} else {
      		Swal.fire(
              'Oops!',
              'The coordinates you entered is out of bounds.',
              'warning'
              );
      }} else {
      	Swal.fire(
              'Oops!',
              'The coordinates you entered generated an error. <br>Please double check the coordinates you entered.',
              'warning'
              );
  		}

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
  });
</script>

<!-- AJAX for Submitting Building Code to Delete Pathway -->
<script type="text/javascript">
      $('#submit_delete_path').on('click', function (e) {
            e.preventDefault();
            $('#confirm_modal_path').modal('show');
            $('#delete_path_modal').modal('hide');
      });

      $('#cancel-btn-path').on('click', function(e) {
            e.preventDefault();
            $('#confirm_modal_path').modal('hide');
            $('#delete_path_modal').modal('show');
      });   

      $('#confirm-btn-path').on('click', function(e) {
                  e.preventDefault();
                  $('#confirm_modal_path').modal('hide');
                  $('#delete_path_modal').modal('hide');

            $.ajax({
                  url: "delete-path",
                  method: "POST",
                  data: $('#path_delete_form').serialize(),
                  beforeSend: function() {
                        $('#submit_delete_path').attr('disabled', true);
                  },
                  success: function (data) {
                        if (data == 1) {
            Swal.fire(
              'Success!',
              'Pathway successfully removed.',
              'success'
              );
            window.location.reload();
          } else {
            Swal.fire(
              'Oops!',
              'Error in removing pathway. Please try again.',
              'error'
              );

            $('#delete_path_modal').modal('show');
          }

          $('#submit_delete_path').attr('disabled', false);
                  }
            });
      });

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
</script>  

@endsection