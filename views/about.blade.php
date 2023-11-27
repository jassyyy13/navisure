@extends('layout_index')
@section('contents')

<!-- HTML for medium screens -->
<div id="medium-screen-content">
    <div style="position: relative; top:50px;" class="p-5">

    	<img src="https://navisure.online/public/asset/img/poi_img/1696481672.png" style="width: 80%;" class="d-block w-100 img-responsive mb-3" alt="...">
	        <h5>About NaViSUre</h5>
	        <p>NaViSUre is your reliable companion for navigating the campus of Nueva Vizcaya State University - Bayombong Campus. Whether you're a student, faculty member, staff, or visitor, our user-friendly map system is designed to enhance your experience on our vibrant campus.</p>

      <img src="https://navisure.online/public/asset/img/bldg_img/1696483684.png" style="width: 80%;" class="d-block w-100 img-responsive mb-3" alt="...">
        <h5>Our Mission</h5>
        <p>At NVSU, we understand the importance of efficient navigation within our campus. That's why we've developed the NVSU Interactive Map System, a tool dedicated to making your journey around our university as smooth as possible. Our mission is to provide you with a comprehensive and interactive map that makes your visit at NVSU convenient.</p>

	<div class="mb-5">
		<h3>Key Features</h3>
			<ul>
				<li><strong>Interactive Campus Map: </strong>Our map system offers a detailed view of the NVSU campus, including buildings, facilities, and points of interest. You can easily locate classrooms, offices, cafeterias, and more.</li>
				<li><strong>Search Functionality: </strong>Looking for a specific location? Use our search feature to quickly find the building or area you need.</li>
				<li><strong>Building Descriptions: </strong>Get to know each building on campus with informative descriptions that highlight their unique features and purposes.</li>
				<li><strong>User-Friendly Navigation: </strong>Whether you're a first-time visitor or a seasoned student, our user-friendly interface ensures that you can find your way around campus with ease.</li>
			</ul>
	</div>		

		<div class="mb-3">
			<h3>Feedback and Support</h3>
			<p>Your experience with our map system matters to us. If you encounter any issues, have suggestions for improvement, or simply want to share your feedback, please don't hesitate to reach out. We value your input and are committed to making our map system even better.
			</p>
			<p>For support and inquiries, please contact our team at <a href="mailto:jemadayag@gmail.com">jemadayag@gmail.com</a>.</p>
		</div>
	</div>	
</div>

<!-- HTML for large screens -->
<div id="large-screen-content">
    <div style="position: relative; top:50px;" class="p-5">

		<div id="about_carousel" class="carousel slide mb-3">
		  <div class="carousel-indicators">
		    <button type="button" data-bs-target="#about_carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
		    <button type="button" data-bs-target="#about_carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
		  </div>
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="https://navisure.online/public/asset/img/poi_img/1696481672.png" style="width: 80%;" class="d-block w-100 img-responsive" alt="...">
		      <div class="carousel-caption d-none d-md-block bg-dark px-5">
		        <h5>About NaViSUre</h5>
		        <p>NaViSUre is your reliable companion for navigating the campus of Nueva Vizcaya State University - Bayombong Campus. Whether you're a student, faculty member, staff, or visitor, our user-friendly map system is designed to enhance your experience on our vibrant campus.</p>
		      </div>
		    </div>
		    <div class="carousel-item">
		      <img src="https://navisure.online/public/asset/img/bldg_img/1696483684.png" style="width: 80%;" class="d-block w-100 img-responsive" alt="...">
		      <div class="carousel-caption d-none d-md-block bg-dark px-5">
		        <h5>Our Mission</h5>
		        <p>At NVSU, we understand the importance of efficient navigation within our campus. That's why we've developed the NVSU Interactive Map System, a tool dedicated to making your journey around our university as smooth as possible. Our mission is to provide you with a comprehensive and interactive map that makes your visit at NVSU convenient.</p>
		      </div>
		    </div>
		  </div>
		  <button class="carousel-control-prev" type="button" data-bs-target="#about_carousel" data-bs-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Previous</span>
		  </button>
		  <button class="carousel-control-next" type="button" data-bs-target="#about_carousel" data-bs-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="visually-hidden">Next</span>
		  </button>
		</div>

			<div class="mb-5 bg-light p-5 rounded-lg m-3">
			<div class="mb-5">
				<h3>Key Features</h3>
					<ul>
						<li><strong>Interactive Campus Map: </strong>Our map system offers a detailed view of the NVSU campus, including buildings, facilities, and points of interest. You can easily locate classrooms, offices, cafeterias, and more.</li>
						<li><strong>Search Functionality: </strong>Looking for a specific location? Use our search feature to quickly find the building or area you need.</li>
						<li><strong>Building Descriptions: </strong>Get to know each building on campus with informative descriptions that highlight their unique features and purposes.</li>
						<li><strong>User-Friendly Navigation: </strong>Whether you're a first-time visitor or a seasoned student, our user-friendly interface ensures that you can find your way around campus with ease.</li>
					</ul>
			</div>		

			<div class="mb-3">
				<h3>Feedback and Support</h3>
				<p>Your experience with our map system matters to us. If you encounter any issues, have suggestions for improvement, or simply want to share your feedback, please don't hesitate to reach out. We value your input and are committed to making our map system even better.
				</p>
				<p>For support and inquiries, please contact our team at <a href="mailto:jemadayag@gmail.com">jemadayag@gmail.com</a>.</p>
			</div>
		</div>	
	</div>
</div>

<script type="text/javascript">
	// Function to determine screen size and load content accordingly
function loadContentBasedOnScreenSize() {
    const mediumScreenContent = document.getElementById("medium-screen-content");
    const largeScreenContent = document.getElementById("large-screen-content");

    if (window.innerWidth <= 768) {
        // Display content for small screens
        mediumScreenContent.style.display = "block";
        largeScreenContent.style.display = "none";
    } else {
        // Display content for large screens
        mediumScreenContent.style.display = "none";
        largeScreenContent.style.display = "block";
    }
}

// Initial loading of content based on screen size
loadContentBasedOnScreenSize();

// Add an event listener to detect screen size changes (e.g., when the user resizes the window)
window.addEventListener("resize", loadContentBasedOnScreenSize);

</script>
	
	

@endsection