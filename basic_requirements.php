<?php
    function get_location($address)
    {    
        $address = urlencode( $address ) ;
		// google map geocode api url
		$url = "https://geocoder.api.here.com/6.2/geocode.json?app_id=tVgTmQ0pGElXOlALcxFa&app_code=1pOqLeRlNqRdB-cfsG1CdA&searchtext=$address";

		// get the json response
		$resp_json = file_get_contents( $url );
				// decode the json
		$Latitude = "" ;
		$i = strpos( $resp_json , "Latitude" )+10;
		while ( $i < strlen( $resp_json ) )
		{
			
		    if ($resp_json[$i] == ",")
			{
				break;
			}
			$Latitude=$Latitude.$resp_json[$i];
			$i++;
			
		}
		$Longitude = "";
		$i = $i + 13;
		while ( $i < strlen( $resp_json ) )
		{
			
		    if ( $resp_json[$i] == "}" )
			{
				break;
			}
			$Longitude = $Longitude.$resp_json[$i] ;
			$i++ ;
			
        }
        return array($Latitude,$Longitude);
        
	}
	function cal_distance($lat1, $lon1, $lat2, $lon2) 
	{
		if (($lat1 == $lat2) && ($lon1 == $lon2)) 
		{
		  $km_dist = 0;
		}
		else
		{
		  $theta = $lon1 - $lon2;
		  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		  $dist = acos($dist);
		  $dist = rad2deg($dist);
		  $km_dist = $dist * 60 * 1.1515 * 1.609344;
		}
		return $km_dist;
	}
		  
?>        