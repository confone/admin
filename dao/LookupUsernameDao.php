<?php
class LookupUsernameDao extends LookupUsernameDaoParent {

// ================================================ public function =================================================

	public static function getAdminIdByUsername($username) {
		$lookup = new LookupUsernameDao();
		$lookup->setServerAddress(Utility::hashString($username));

		$builder = new QueryBuilder($lookup);
		$res = $builder->select('admin_id')
					   ->where('username', $username)
					   ->find();

		if ($res) {
			return $res['admin_id'];
		} else {
			return 0;
		}
	}

// ============================================ override functions ==================================================

	protected function beforeInsert() {
		$sequence = Utility::hashString($this->getUsername());
		$this->setShardId($sequence);
	}

	protected function beforeUpdate() {
		$sequence = Utility::hashString($this->getUsername());
		$this->setServerAddress($sequence);
	}

	protected function isShardBaseObject() {
		return false;
	}
}
?>