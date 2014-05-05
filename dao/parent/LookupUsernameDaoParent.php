<?php
abstract class LookupUsernameDaoParent extends AdminDaoBase {

    protected function init() {
        $this->var['id'] = '';
        $this->var['username'] = '';
        $this->var['admin_id'] = '';
        $this->var['is_active'] = '';

        $this->update['id'] = false;
        $this->update['username'] = false;
        $this->update['admin_id'] = false;
        $this->update['is_active'] = false;
    }

    public function getId() {
        return $this->var['id'];
    }

    public function setUsername($username) {
        $this->var['username'] = $username;
        $this->update['username'] = true;
    }
    public function getUsername() {
        return $this->var['username'];
    }

    public function setAdminId($adminId) {
        $this->var['admin_id'] = $adminId;
        $this->update['admin_id'] = true;
    }
    public function getAdminId() {
        return $this->var['admin_id'];
    }

    public function setIsActive($isActive) {
        $this->var['is_active'] = $isActive;
        $this->update['is_active'] = true;
    }
    public function getIsActive() {
        return $this->var['is_active'];
    }

// ======================================================================================== override

    public function getTableName() {
        return 'lookup_username';
    }

    protected function getIdColumnName() {
        return 'id';
    }

    public function getShardDomain() {
        return 'admin_administrator';
    }
}
?>