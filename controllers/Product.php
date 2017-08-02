<?php
class Product extends Controller{
	protected function detail(){
		$viewmodel = new ProductModel();
		$this->returnView($viewmodel->detail(), true);
	}
}