<?php
class Administrator extends Model {

	private $dao = null;

    public static function authenticate($username, $passwd) {
		$adminId = LookupUsernameDao::getAdminIdByUsername($adminname);
		if ($adminId!=0) {
			$admin = new AdministratorDao($adminId);
			$dbPass = $admin->dao->getPassword();
			$inPass = Utility::saltString(md5($passwd));
			if (Utility::compareSaltedString($dbPass, $inPass, 5)) {
				$date = gmdate('Y-m-d H:i:s');
				$admin->dao->setLastLogin($date);
				$admin->dao->save();
			} else {
				$admin = null;
			}
		} else {
			$admin = null;
		}

		return $admin;
    }

    public function deactive() {
    	$lookup = LookupUsernameDao::getAdminIdByUsername($this->getUsername());
    	$lookup->setIsActive('N');
    	$lookup->save();
    }

// =============================================================================== override

	public function getId() {
		if (isset($this->dao)) {
			return $this->dao->getId();
		} else {
			return 0;
		}
	}
	protected function init() {
		$input = $this->getInput();
		if (is_numeric($input)) {
			$this->dao = new AdministratorDao($input);
		} else {
			$this->dao = $this->getInput();
		}
	}
    public function persist() {
		if (isset($this->dao)) {
    		return $this->dao->save();
		}
		return false;
    }

// =============================================================================== accesser

    public function getUsername() {
        return $this->dao->getUsername();
    }
    public function setEmail($email) {
    	$this->dao->setEmail($email);
    }
    public function getEmail() {
        return $this->dao->getEmail();
    }
    public function setPassword($password) {
		$md5Pass = md5($password);
    	$password = Utility::saltString($md5Pass);
        $this->dao->setPassword($password);
    }
    public function setName($name) {
    	$this->dao->setName($name);
    }
    public function getName() {
        return $this->dao->getName();
    }
    public function setProfilePic($profilePic) {
    	$this->dao->setProfilePic($profilePic);
    }
    public function getProfilePic() {
        return $this->dao->getProfilePic();
    }
    public function setDescription($description) {
    	$this->dao->setDescription($description);
    }
    public function getDescription() {
        return $this->dao->getDescription();
    }
    public function getLastLogin() {
        return $this->dao->getLastLogin();
    }
}
?>