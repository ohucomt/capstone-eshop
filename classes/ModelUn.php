<?php
	abstract class Model{
		protected $connection;
		protected $query;
		protected $result;


		public function connectDB(){
			$this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		}

		public function sendQuery(){
			$this->result = mysqli_query($this->connection, $this->query) or die(mysqli_error($this->connection));
		}

		public function returnCount(){
			return mysqli_num_rows($this->result);
		}

		public function getAllRow(){
			return mysqli_fetch_all($this->result,MYSQLI_ASSOC);
		}

		public function getRow(){
			return mysqli_fetch_assoc($this->result);
		}
	}
?>