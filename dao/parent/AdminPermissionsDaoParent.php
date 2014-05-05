<?php
abstract class AdminPermissionsDaoParent extends AdminDaoBase {

    protected function init() {
        $this->var['id'] = '';
        $this->var['admin_id'] = '';
        $this->var['code'] = '';

        $this->update['id'] = false;
        $this->update['admin_id'] = false;
        $this->update['code'] = false;
    }

    public function getId() {
        return $this->var['id'];
    }

    public function setAdminId($adminId) {
        $this->var['admin_id'] = $adminId;
        $this->update['admin_id'] = true;
    }
    public function getAdminId() {
        return $this->var['admin_id'];
    }

    public function setCode($code) {
        $this->var['code'] = $code;
        $this->update['code'] = true;
    }
    public function getCode() {
        return $this->var['code'];
    }

// ======================================================================================== override

    public function getTableName() {
        return 'admin_permissions';
    }

    protected function getIdColumnName() {
        return 'id';
    }

    public function getShardDomain() {
        return 'admin_permission';
    }
}
?>