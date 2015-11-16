<?php
require_once '../inc/global.php';

class Workout {
    public static function Get($id = null){
        $sql = "SELECT * FROM Fitness_Workouts";
        
		if($id){
			$sql .= " WHERE id=$id ";
			$ret = FetchAll($sql);
			return $ret[0];
		}else{
			return FetchAll($sql);			
		}
		
    }
    
    static public function Delete($id)
	{
		$conn = GetConnection();
		$sql = "DELETE FROM Fitness_Workouts WHERE id = $id";
		//echo $sql;
		$results = $conn->query($sql);
		$error = $conn->error;
		$conn->close();
		
		return $error ? array ('sql error' => $error) : false;
	}
	
	static public function Blank()
	{
		return array();
	}



		static public function Validate($row)
		{
			$errors = array();
			if(empty($row['Name'])) $errors['Name'] = "is required";
			if(strtotime($row['Time']) > time()) $errors['Time'] = "must be in the past";
			if(empty($row['Callories_Burned'])) $errors['Callories_Burned'] = "is required";
			if(empty($row['Num_Reps'])) $errors['Num_Reps'] = "is required";
			
			return count($errors) > 0 ? $errors : false ;
		}
	
		static public function Save(&$row)
		{
			$conn = GetConnection();
			
			$row2 = escape_all($row, $conn);
			$row2['Time'] = date( 'Y-m-d H:i:s', strtotime( $row2['Time'] ) );
			if (!empty($row['id'])) {
				$sql = "Update Fitness_Workouts
							Set Name='$row2[Name]', Time='$row2[Time]', Callories_Burned='$row2[Callories_Burned]', Num_Reps='$row2[Num_Reps]'
						WHERE id = $row2[id]
						";
			}else{
				$sql = "INSERT INTO Fitness_Workouts
						(Name, Time, Callories_Burned, created_at)
						VALUES ('$row2[Name]', '$row2[Time]', '$row2[Callories_Burned]', '$row2[Num_Reps]', Now() ) ";				
			}
			
			
			//my_print( $sql );
			
			$results = $conn->query($sql);
			$error = $conn->error;
			
			if(!$error && empty($row['id'])){
				$row['id'] = $conn->insert_id;
			}
			
			$conn->close();
			
			return $error ? array ('sql error' => $error) : false;
		}


}


