<?php
	class ProductModel extends Model{
		public function detail(){
			$this->connectDB();

			$post = $_POST;
			if($post['submit']){
				$name = $post['reviewer_name'];
				$mail = $post['reviewer_mail'];
				$content = $post['review_content'];


				$this->query = "INSERT INTO reviews(reviewer_name, reviewer_mail, review_content) VALUES('$name', '$mail', '$content')";
				
				$this->sendQuery();
				Message::setMsg("You rate is added successfully", "success");
				Helper::redirect('/product/detail');
				exit();

			}


			$this->query = 'SELECT * FROM reviews';
			$this->sendQuery();
			$row = $this->getAllRow();
			return $row;


		}
	}
?>