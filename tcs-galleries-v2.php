<?php 
// 
// Custom Galleries Code by Three Cords Studio, v2
// 
//
if( is_singular( 'she_property' ) ){
	$entries = get_post_meta( get_the_id(),'_she_property_image_gallery', FALSE );
	if ($entries){
	  	// Start container Div
		echo "<div id='tcs-gallery-" . $counter . "' class='tcs-gallery'>";
		//echo "<div class='tcs-gallery-row-case tcs-gallery-row-case-".$thisrow."'>";
		$imgcounter = 0; 

		  foreach ( $entries[0] as $key => $value) {
                if($rowcounter == 0){
                    echo "<div class='tcs-gallery-row-case tcs-gallery-row-case-".$thisrow."'>";
                }
			  	$imgcounter++;
			  	$rowcounter++;
                
		  		$attachment_meta = get_post($key);
		  		$smallerurl = wp_get_attachment_image_src($key,'gallery-image', true);
		  		// if(isset($attachment_meta->post_excerpt)) {
		  		// 	$caption = $attachment_meta->post_excerpt;
		  		// }
		  		echo "<div class='tcs-gallery-img-wrapper'>";
		  		echo "<div style='background:url(" . $smallerurl[0] . ") no-repeat center; background-size:cover;' class='tcs-gallery-img tcs-gallery-row-".$thisrow." tcs-gallery-item-" . $imgcounter . "'>";
		  		echo "<div class='tcs-gallery-inner'>";
			    echo "<a href='".$value ."' class='venobox tcs-gallery-link' data-gall='myGallery".$counter."' title='".$attachment_meta->post_excerpt."'>";
			    echo "</a>";
			    echo "</div>";

			    if($attachment_meta->post_excerpt !== ''){
				    echo "<div class='tcs-gallery-caption'>";
				    echo "<h3 class='uppercase'><strong>";
				    echo $attachment_meta->post_excerpt;
				    echo "</strong></h3>";
				    echo "</div>";
			    }
			    echo "</div>"; //End Img
			    echo "</div>"; //End Wrapper
			    // echo '<li><a href="'.$value.'" class="cboxModal" rel="lightbox[postID]">';
			    // echo '<img src="'.$value.'">';
			    // echo '</a></li>'; 
			    $endofrow = 0;
			    if($rowcounter == 9){
			    	$thisrow++;
			    	$rowcounter = 0;
			    	$endofrow = 1;
			    	echo "</div><!--End ROW-->";
			    	
			    }
			  }
			if($endofrow==0){
				echo "</div><!--End ROW-->";
			}	
			echo "</div>";
							 
			// echo "<div class='frame'>
			// 		<div class='bit-1'>
			// 			<br><BR><BR>
			// 		</div>
			// 	</div>";
			$thisrow++;
			$rowcounter = 0;
	}

} else {
	
              $mykey_values =  get_post_meta($post->ID, '_she_page_page_gallery', FALSE );
                // Start container Div
                echo "<div id='tcs-gallery-" . $counter . "' class='tcs-gallery'>";
                echo "<div class='tcs-gallery-row-case tcs-gallery-row-case-".$thisrow."'>";
                $imgcounter = 0; 

                  foreach ( $mykey_values[0] as $key => $value) {
                        $imgcounter++;
                        $rowcounter++;
                        $attachment_meta = get_post($key);
                        $smallerurl = wp_get_attachment_image_src($key,'gallery-image', true);
                        // if(isset($attachment_meta->post_excerpt)) {
                        // 	$caption = $attachment_meta->post_excerpt;
                        // }
                        echo "<div class='tcs-gallery-img-wrapper'>";
                        echo "<div style='background:url(" . $smallerurl[0] . ") no-repeat center; background-size:cover;' class='tcs-gallery-img tcs-gallery-row-".$thisrow." tcs-gallery-item-" . $imgcounter . "'>";
                        echo "<div class='tcs-gallery-inner'>";
                        echo "<a href='".$value ."' class='venobox tcs-gallery-link' data-gall='myGallery".$counter."' title='".$attachment_meta->post_excerpt."'>";
                        echo "</a>";
                        echo "</div>";

                        if($attachment_meta->post_excerpt !== ''){
                            echo "<div class='tcs-gallery-caption'>";
                            echo "<h3 class='uppercase'><strong>";
                            echo $attachment_meta->post_excerpt;
                            echo "</strong></h3>";
                            echo "</div>";
                        }
                        echo "</div>"; //End Img
                        echo "</div>"; //End Wrapper
                        // echo '<li><a href="'.$value.'" class="cboxModal" rel="lightbox[postID]">';
                        // echo '<img src="'.$value.'">';
                        // echo '</a></li>'; 
                        $endofrow = 0;
                        if($rowcounter == 9){
                            $thisrow++;
                            $rowcounter = 0;
                            $endofrow = 1;
                            echo "</div><!--End ROW-->";
                            echo "<div class='tcs-gallery-row-case tcs-gallery-row-case-".$thisrow."'>";
                        }
                      }
                    if($endofrow==0){
                        echo "</div><!--End ROW-->";
                    }	
                    echo "</div>";

                    echo "<div class='frame'>
                            <div class='bit-1'>
                                <br><BR><BR>
                            </div>
                        </div>";
                    $thisrow++;
                    $rowcounter = 0;

//	$entries = get_post_meta( get_the_id(), '_she_page_' . 'repeat_group', true );
//	$counter = 0;
//	$rowcounter = 0;
//	$thisrow = 1;
//
//	foreach ( (array) $entries as $key => $entry ) {
//		$counter++;
//	 	$title = '';
//	    //
//	    if ( isset( $entry['title'] ) )
//	        $title = esc_html( $entry['title'] );
//
//	    // Show Title
//	    echo '<h2 class="text-left she-blue-text">'.$title.'</h2>';
//	    echo '<br><BR><BR>';
//
//	    // Get Image Array
//		$mykey_values =  $entry['_she_page_page_gallery'];
//
//	  	// Start container Div
//		echo "<div id='tcs-gallery-" . $counter . "' class='tcs-gallery'>";
//		echo "<div class='tcs-gallery-row-case tcs-gallery-row-case-".$thisrow."'>";
//		$imgcounter = 0; 
//
//		  foreach ( $mykey_values as $key => $value) {
//			  	$imgcounter++;
//			  	$rowcounter++;
//		  		$attachment_meta = get_post($key);
//		  		$smallerurl = wp_get_attachment_image_src($key,'gallery-image', true);
//		  		// if(isset($attachment_meta->post_excerpt)) {
//		  		// 	$caption = $attachment_meta->post_excerpt;
//		  		// }
//		  		echo "<div class='tcs-gallery-img-wrapper'>";
//		  		echo "<div style='background:url(" . $smallerurl[0] . ") no-repeat center; background-size:cover;' class='tcs-gallery-img tcs-gallery-row-".$thisrow." tcs-gallery-item-" . $imgcounter . "'>";
//		  		echo "<div class='tcs-gallery-inner'>";
//			    echo "<a href='".$value ."' class='venobox tcs-gallery-link' data-gall='myGallery".$counter."' title='".$attachment_meta->post_excerpt."'>";
//			    echo "</a>";
//			    echo "</div>";
//
//			    if($attachment_meta->post_excerpt !== ''){
//				    echo "<div class='tcs-gallery-caption'>";
//				    echo "<h3 class='uppercase'><strong>";
//				    echo $attachment_meta->post_excerpt;
//				    echo "</strong></h3>";
//				    echo "</div>";
//			    }
//			    echo "</div>"; //End Img
//			    echo "</div>"; //End Wrapper
//			    // echo '<li><a href="'.$value.'" class="cboxModal" rel="lightbox[postID]">';
//			    // echo '<img src="'.$value.'">';
//			    // echo '</a></li>'; 
//			    $endofrow = 0;
//			    if($rowcounter == 9){
//			    	$thisrow++;
//			    	$rowcounter = 0;
//			    	$endofrow = 1;
//			    	echo "</div><!--End ROW-->";
//			    	echo "<div class='tcs-gallery-row-case tcs-gallery-row-case-".$thisrow."'>";
//			    }
//			  }
//			if($endofrow==0){
//				echo "</div><!--End ROW-->";
//			}	
//			echo "</div>";
//							 
//			echo "<div class='frame'>
//					<div class='bit-1'>
//						<br><BR><BR>
//					</div>
//				</div>";
//			$thisrow++;
//			$rowcounter = 0;
//
//
//
//	}//END MAJOR LOOP per gallery
}//End Else
?>