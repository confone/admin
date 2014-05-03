<?php
abstract class PermissionUrlsDaoParent extends AccountDaoBase {

    protected function init() {
        $this->var['id'] = '';
        $this->var['code'] = '';
        $this->var['url'] = '';

        $this->update['id'] = false;
        $this->update['code'] = false;
        $this->update['url'] = false;
    }

    public function getId() {
        return $this->var['id'];
    }

    public function setCode($code) {
        $this->var['code'] = $code;
        $this->update['code'] = true;
    }
    public function getCode() {
        return $this->var['code'];
    }

    public function setUrl($url) {
        $this->var['url'] = $url;
        $this->update['url'] = true;
    }
    public function getUrl() {
        return $this->var['url'];
    }

// ======================================================================================== override

    public function getTableName() {
        return 'permission_urls';
    }

    protected function getIdColumnName() {
        return 'id';
    }

    public function getShardDomain() {
        return 'admin_permission';
    }
}
?>