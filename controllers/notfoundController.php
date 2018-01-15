<?php
class notfoundController extends controller{
	public function index() {
        $this->loadTemplate('404',array());
    }
}
?>