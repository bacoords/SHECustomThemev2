<?php
/*
Template Name: Vimeo Template Page 
*/
?>
<?php 
    global $she_set_smooth_scroll_script;

    $she_set_smooth_scroll_script = true;

get_header(); 

?>
<link href="https://www.selfhelpenterprises.org/wp-content/plugins/jetpack/_inc/genericons/genericons/genericons.css" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script>

		var apiEndpoint = 'https://vimeo.com/api/v2/';
		var oEmbedEndpoint = 'https://vimeo.com/api/oembed.json';
		var oEmbedCallback = 'switchVideo';
		var videosCallback = 'setupGallery';
		var vimeoUsername = 'user1983551';

		// Get the user's videos
		$(document).ready(function() {
			$.getScript(apiEndpoint + vimeoUsername + '/videos.json?callback=' + videosCallback);
		});

		function getVideo(url) {
			$.getScript(oEmbedEndpoint + '?url=' + url + '&callback=' + oEmbedCallback);
		}

		function setupGallery(videos) {
            
			// Set the user's thumbnail and the page title
			//$('#stats').prepend('<img id="portrait" src="' + videos[0].user_portrait_medium + '" />');
			$('#stats h3').text(videos[0].title);
			$('#stats p').text(videos[0].description);
            $('#sharefb').attr('href', 'http://www.facebook.com/sharer/sharer.php?u=' + videos[0].url);
            $('#shareli').attr('href', 'http://www.linkedin.com/shareArticle?mini=true&url=' + videos[0].url);
           
			// Load the first video
			
           // getVideo(videos[0].url);

			// Add the videos to the gallery
            var firstvid = 1;
			var rowcounter = 0;
			var html = '';
			for (var i = 0; i < videos.length; i++) {
                if(videos[i].id=='109643681' ||
                   videos[i].id=='77087933' ||
                   videos[i].id=='89143647' ||
                   videos[i].id=='45455158' ||
                   videos[i].id=='48325316'
                   
                    ){
                    
                    } else {
                        if(firstvid==1){
                            getVideo(videos[i].url);
                            firstvid = 0;
                        }
                        if(rowcounter==0){
                            html+= '<div class="frame">';
                        }
                        rowcounter +=1;
                        html += '<div class="bit-4"><div class="box-padding vimeo-thumbs"><a href="' + videos[i].url + '"><img src="' + videos[i].thumbnail_medium + '"/>';
                        html += '<h6>' + videos[i].title + '</h6></a></div></div>';
                        if(rowcounter==4){
                            html+= '</div>';
                            var rowcounter=0;
                        }
                }
			}
			while (rowcounter<4){
				html += '<div class="bit-4"><BR></div>';
				rowcounter+=1;
			}
			if(rowcounter==4){
					html+= '</div>';
					rowcounter=0;
			}
			$('#thumbs section').append(html);

			// Switch to the video when a thumbnail is clicked
			$('#thumbs a').click(function(event) {
				event.preventDefault();
				getVideo(this.href);
				$('html, body').animate({
	                scrollTop: $( "#embed" ).offset().top
	            }, 1000, function(){ $(".menu-toggle-scroll").slideUp(300);
	        });
	           
				return false;
			});

		}

		function switchVideo(video) {
			$('#embed').html(unescape(video.html));
			$('#stats h3').text(unescape(video.title));
			$('#stats p').text(unescape(video.description));
            $('#sharefb').attr('href', 'http://www.facebook.com/sharer/sharer.php?u=http://vimeo.com/' + video.video_id);
            $('#shareli').attr('href', 'http://www.linkedin.com/shareArticle?mini=true&url=http://vimeo.com/' + video.video_id);
		}

	</script>

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>



    <section>
      <div class="frame">

        
        <div class="bit-1">
        	<BR><BR>
          <h1 class="uppercase text-center she-blue-text"><?php the_title(); ?></h1>
          	<BR><BR>
        </div>
	</div>






    <!-- Main Content -->    



	<article>
	
	
		<!-- Start Main VIdeo Row -->
		<div class="frame equalize-container">

			<div class="bit-2-of-3 equalize">
					<div id="wrapper">
						<div class="text-center ">
							
							
							
								<div id="embed" class="videoWrapper"></div>
		
						</div>
					</div>
			</div>
			<div class="bit-1-of-3 equalize">
				<div class="vimeo-description box-padding box-padding-vert">
					<div id="stats">
						<strong><h3></h3></strong>
						<BR><BR>
						<p></p>
						<BR><BR>
                        <h4>Share this Video</h4>
                        <a href="" id="sharefb" target="_blank"><span class="jetpack-facebook"></span></a><a href="" id="shareli" target="_blank"><span class="jetpack-linkedin"></span></a>
						<BR><BR>
					</div>
				</div>
			</div>
		</div>	
 <!-- End Main Video Row  -->
		<div class="frame">
			<div class="bit-1">
				<BR><BR><BR>
			</div>
		</div>
			

<!-- Start Thumbnail Row -->
			<div class="frame">
				<div class="bit-2-of-3">
					<div class="box-padding box-padding-vert text-center">
						
						<div id="thumbs">
							
							<section></section>
							
						</div>
					</div>
				</div>
				<div class="bit-1-of-3">
					<div class="box-padding-vert">
						<BR>
					</div>
					
				</div>
			</div>
			<div class="frame">
				<div class="bit-1">
					<BR><BR><BR><BR>
				</div>
			</div>
<!-- End Thumbnail Row -->
	


	</article>


				<?php endwhile; else: ?>
					<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
				<?php endif; ?>   
				
    <!-- End Main Content -->
<?php get_footer(); ?>