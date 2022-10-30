<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class ClubModel extends Model {
	protected $table = 'grc_clubs';
	protected $primaryKey = 'id';
	protected $allowedFields = ['club_name', 'club_location','club_address'];
	protected $returnType = 'array';
	function __construct()
	{
		parent::__construct();
		// $this->load->database();
	}

function getAllClubs()
	{
		$result = $this->get()->getResult();
		if(count($result)>0){
			return $result;
		} else {
			return false;
		}
	
	}

	
}