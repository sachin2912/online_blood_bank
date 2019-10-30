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
        echo $Latitude."  -> ".$Longitude;
        return array($Latitude,$Longitude);
        
    }
?>        