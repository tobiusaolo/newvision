<?php
class csv extends mysqli{
	private $state_csv =false;

	public function __construct(){
		parent::__construct("localhost","root","","NewVision");
		if($this->connect_error){
			echo "Failed to connect to Database:".$this->connect_error;

		}
	}
	public function import($file){
		$file = fopen($file, 'r');
		$flag=true;
		while (($row = fgetcsv($file))!==FALSE){
			# code...
			if ($flag) {
				# code...
				$flag =false; continue;
			}
			#$value ="'".implode("','",$row)."'";
			$first=$row[0];
			$last=$row[1];
			$age =$row[2];

			$q="INSERT INTO excel(first,last,age) VALUES('".$first."','".$last."','".$age."')";
			if($this->query($q)){
				$this->state_csv=true;
			}else{
				$this->state_csv=false;
				echo $this->error;
			}
		}
		if ($this->state_csv) {
			# code...
			echo "Successfully Imported";
		}else{
			echo "Something went wrong";
		}
	}
}

?>