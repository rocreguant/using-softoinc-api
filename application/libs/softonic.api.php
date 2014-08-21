<?php
/**
 * File Softonic API Client CLass.
 *
 * @package Api
 * @author Alex Puig (labs@softonic.com)
 */

/**
 * Softonic API client.
 */
class SoftonicApiClient
{

	const location = 'http://api.softonic.com/';
	protected $language = 'es';
	protected $api_url; //eq. a lastApiCall
	protected $response_format = 'php';

	public function __construct(){}

	public function setLanguage( $language )
	{
		if ( empty( $language ) || !in_array( $language, array( 'en', 'es', 'it', 'de', 'br', 'pl' ) ) )
		{
			$this->language = 'en';
		}
		else
		{
			$this->language = $language;
		}
	}

	public function setApiKey( $api_key )
	{
		$this->api_key = $api_key;
	}

	public function setResponseFormat( $format )
	{
		if ( empty( $format ) || !in_array( $format, array( 'php', 'json', 'xml' ) ) )
		{
			$this->response_format = 'xml';
		}
		else
		{
			$this->response_format = $format;
		}
	}

	public function testEcho( $param )
	{
		return $this->callApi( 'api_testEcho', $param );
	}

	public function getUserInfo( $id_user )
	{
		return $this->callApi( 'users_getInfo', $id_user );
	}

	public function getUserActivity( $id_user )
	{
		return $this->callApi( 'users_getActivity', $id_user );
	}

	public function getUserFavorites( $id_user, $start = 0, $results = 10 )
	{
		return $this->callApi( 'users_getFavorites', $id_user, $start, $results );
	}

	public function getUserOpinions( $id_user, $start = 0, $results = 10 )
	{
		return $this->callApi( 'users_getOpinions', $id_user, $start, $results );
	}

	public function getUserFriends( $id_user, $start = 0, $results = 10 )
	{
		return $this->callApi( 'users_getFriends', $id_user, $start, $results );
	}

	public function getUserFollowers( $id_user, $start = 0, $results = 10 )
	{
		return $this->callApi( 'users_getFollowers', $id_user, $start, $results );
	}

	public function getProgramInfo( $id_program )
	{
		return $this->callApi( 'program_getInfo', $id_program );
	}

	public function getProgramRelated( $id_program )
	{
		return $this->callApi( 'program_getRelated', $id_program );
	}

	public function getProgramScreenshots( $id_program )
	{
		return $this->callApi( 'program_getScreenshots', $id_program );
	}

	public function getProgramVideos( $id_program )
	{
		return $this->callApi( 'program_getVideos', $id_program );
	}

	public function getProgramOpinions( $id_program, $start = 0, $results = 10 )
	{
		return $this->callApi( 'program_getOpinions', $id_program, $start, $results );
	}

	public function getProgramFans( $id_program, $start = 0, $results = 10 )
	{
		return $this->callApi( 'program_getFans', $id_program, $start, $results );
	}

	public function getProgramDownloadHistory( $id_program )
	{
		return $this->callApi( 'program_getDownloadHistory', $id_program );
	}

	public function getSectionParents( $id_section )
	{
		return $this->callApi( 'section_getParents', $id_section );
	}

	public function getSectionChildren( $id_section )
	{
		return $this->callApi( 'section_getChildren', $id_section );
	}

	public function getSectionOpinions( $id_section, $start = 0, $results = 10 )
	{
		return $this->callApi( 'section_getOpinions', $id_section, $start, $results );
	}
	
	public function getSectionPrograms( $id_section, $start = 0, $results = 10, $order = false, $os = false, $phone = false )
	{
		$params = array();

		// Order.
		if ( false != $order )
		{
			$params[] = "order=$order";
		}

		// Operative System (only for mobile)
		if ( false != $os )
		{
			$params[] = "os=$os";
		}

		// Phone (only for mobile)
		if ( false != $phone )
		{
			$params[] = "phone=$phone";
		}

		return $this->callApi( 'section_getPrograms', $id_section, $start, $results, implode( '&', $params ) );
	}

	public function getMobileOs()
	{
		return $this->callApi( 'mobile_getOs' );
	}

	public function getMobileBrands()
	{
		return $this->callApi( 'mobile_getBrands' );
	}

	public function getMobilePhones( $id_brand )
	{
		return $this->callApi( 'mobile_getPhones', $id_brand );
	}

	public function lastApiCall()
	{
		return $this->api_url;
	}

	/**
	* Set response format.
	*
	* @param string $function Remote Function name.
	* @param string $param Parameter for the remote function.
	* @param integer $start First result.
	* @param integer $results Total number of results.

	*
	* @return array API call response.
	*/
	public function callApi( $function, $param = false, $start = 0, $results = 10, $extra = '' )
	{
		$this->api_url = SoftonicApiClient::location."$this->language/$function";
		if ( false !== $param )
		{
			$this->api_url .= "/$param";
		}
		$this->api_url .= '.'.$this->response_format.'?key='.$this->api_key;

		if ( $results > 0 )
		{
			$this->api_url .= "&results=$results";
		}
		if ( $start > 0 )
		{
			$this->api_url .= "&start=$start";
		}
		
		if ( !empty( $extra ) )
		{
			$this->api_url .= "&".$extra;
		}

		$ch = curl_init( $this->api_url );
		//curl_setopt( $ch, CURLOPT_POST, 1 );
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
		curl_setopt( $ch, CURLOPT_HEADER, 0 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		$received_data = curl_exec( $ch );

		switch ( $this->response_format )
		{
			case 'json':
				$formated = json_decode( $received_data, true );
				break;
			case 'php':
				// The fix is needed for PHP 5.3 and more.
				if ( ( float ) substr( phpversion(), 0, 3 )  >= 5.3 )
				{
					$formated = unserialize( preg_replace( '/;n;/', ';N;', strtolower( $received_data ) ) );
				}
				else
				{
					$formated = unserialize( $received_data );
				}
				break;
			case 'xml':
			default:
				$formated = $received_data;
				break;
		}
		return $formated;
	}
	//##################################################
	//a partir d'aqui cosa meva!
	
	public function getHotSoftware( $id_section = false )
	{
		if ( false !== $id_section )
		{
			return $this->callApi('latest_getHotSoftware', $id_section);
		}
		else{
			$param = 2;
			return $this->callApi('latest_getHotSoftware', $param);
		}
	}
}

?>
