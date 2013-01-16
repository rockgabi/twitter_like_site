<?php

class User extends Eloquent {
	public function resources() {
		return $this->has_many('Resource', 'user_id')->results();
	}
}