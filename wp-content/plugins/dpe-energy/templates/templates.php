
<?php 

function all_template_dpe() {
	// import style CSS
	wp_enqueue_style( 'dpe-style', plugins_url( DPE_PLUGIN_NAME.'/assets/style-dpe.css'));
	$property_id = get_the_ID();
	$property_meta_data = get_post_custom($property_id);
	// var_dump($property_meta_data);
	$dpe_energy = isset($property_meta_data['real_estate_dpe-energy'][0]) && is_numeric($property_meta_data['real_estate_dpe-energy'][0]) ? $property_meta_data['real_estate_dpe-energy'][0] : 310;

	$dpe_gaz = isset($property_meta_data['real_estate_dpe-gaz'][0]) && is_numeric($property_meta_data['real_estate_dpe-gaz'][0]) ? $property_meta_data['real_estate_dpe-gaz'][0] : 57;
	$title = '<h3>Performance énérgetique et climatique</h3>';
	$template = '';
	$template .= $title;
	$template .= '<div class="row">
								<div class="col-6 col-chart">';
	$template .=  template_dpe_energy($dpe_energy, $dpe_gaz);	
	$template .= '</div>'; // end row col-6

	$template .=  '<div class="col-6 col-chart">
	<div class="block-gaz-content">
  	<h5 class="title-gaz-block">* Dont émissions de gaz à effet de serre</h5>';
	$template .=  template_dpe_gaz($dpe_gaz);	

	$template .= '</div>';// end bloc block-gaz-content
	$template .= '</div>';// end row col-6
	$template .= '</div>'; // end row

			
	return $template;
}


function template_dpe_energy($dpe_energy, $dpe_gaz) {
	$tabDPE_energy = [
		'A' => ['min' => 0 ,'max' => 50], 
		'B' => ['min' => 51 ,'max' => 90], 
		'C' => ['min' => 91 ,'max' => 150],
		'D' => ['min' => 151 ,'max' => 230],
		'E' => ['min' => 231 ,'max' => 330],
		'F' => ['min' => 331 ,'max' => 450],
		'G' => ['min' => 450 ,'max' => 999999],
	];
	$degree = 3;
	$iter = 7;

	$progressBar = '';
	$textContentEnergy = '<div class="block-info block-energy">
	    			<div class="nb-info">' .$dpe_energy. '</div>
	    			<div class="text-info">KWh/m3/an</div>
	    		</div>
	    		<div class="block-info block-gaz">
	    			<div class="nb-info">' . $dpe_gaz . ' *</div>
	    			<div class="text-info">KgCO2/m3/an</div>
	    		</div>';
	 foreach($tabDPE_energy as $key => $value){
	    	$degree = $degree + $iter;
	    	$selected = false;
	    	if ($value['min'] <= $dpe_energy && $value['max'] >= $dpe_energy ){
	    		$selected = true;
	    	}
		    $progressBar .= '<div class="myProgress '. ( $selected ?  "selected": '' ) .'">
			    	<div class="text-content">' . ($selected ?  $textContentEnergy :'') . '</div>
			      <div class="myBar w3-container color-' . strtolower($key) .'" style="width: '. $degree.'%">' . strtoupper($key) . ($key =='G' || $key =='F' ?  '<span class="txt-passoire">&nbsp;&nbsp;&nbsp; Passoire énergétique</span>': '' ).'</div>
			   </div>';

	    
	    }

	$template_energy = '<div class="myProgress">
									    	<div class="text-content"></div>
									      <div style="" class="text-content-performant">logement etrêmement performant</div>
									    </div>' . $progressBar . '
									    <div class="myProgress">
									    	<div class="text-content"></div>
									      <div style="" class="text-content-no-performant">logement etrêmement peu performant</div>
									    </div>
								  	';

	return $template_energy;
}

function template_dpe_gaz($dpe_gaz) {
	$template_gaz = '';
	$tabDPE_gaz = [
		'A' => ['min' => 0 ,'max' => 5], 
		'B' => ['min' => 6 ,'max' => 10], 
		'C' => ['min' => 11 ,'max' => 20],
		'D' => ['min' => 21 ,'max' => 35],
		'E' => ['min' => 36 ,'max' => 55],
		'F' => ['min' => 56 ,'max' => 80],
		'G' => ['min' => 81 ,'max' => 999999],
	];

	$degreeGaz = 3;
	$iter = 7;

	$textContentGaz = '<div class="block-info block-energy">
	    			<div class="nb-info-gaz">' . $dpe_gaz . 'KgCO2/m3/an</div>
	    		</div>';


	$progressBar = '';
	foreach($tabDPE_gaz as $key => $value) {
	    	$degreeGaz = $degreeGaz + $iter;
	    	$selected = false;
	    	if ($value['min'] <= $dpe_gaz && $value['max'] >= $dpe_gaz ){
	    		$selected = true;
	    	}
	    $progressBar .= '<div class="myProgress ' .($selected ? "selected" : '').'">
		    	<div class="text-content">' .($selected ? $textContentGaz : ''). '</div>
		      <div class="myBar w3-container color-' . strtolower($key) . ' color-gaz-' . strtolower($key). '" style="width: ' . $degreeGaz . '%">' . strtoupper($key) . '</div>
		   </div>';
	    }


	$template_gaz = '<div class="myProgress">
	    	<div class="text-content"></div>
	      <div style="" class="text-content-gaz-no-performant">Peu d\'émissions de CO2</div>
	    </div>
	    '. $progressBar.'
	    <div class="myProgress">
	    	<div class="text-content"></div>
	      <div style="" class="text-content-gaz-performant">Emissions de CO2 très importantes</div>
	    </div>';

	return $template_gaz;
}

