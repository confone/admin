<?php
class AdministratorDao extends AdministratorDaoParent {

// ================================================ public function =================================================


// ============================================ override functions ==================================================

	protected function beforeInsert() {
		$date = gmdate('Y-m-d H:i:s');
		$this->setLastLogin($date);

		$lookup = new LookupUsernameDao();
		$lookup->setAdminId($this->getId());
		$lookup->setUsername($this->getUsername());
		$lookup->setIsActive('Y');
		$lookup->save();
	}

	protected function isShardBaseObject() {
		return true;
	}
}
?>