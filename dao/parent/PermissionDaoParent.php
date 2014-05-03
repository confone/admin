<?php
abstract class PermissionDaoParent extends AccountDaoBase {

    protected function init() {
        $this->var['id'] = '';
        $this->var['code'] = '';
        $this->var['language'] = '';
        $this->var['description'] = '';

        $this->update['id'] = false;
        $this->update['code'] = false;
        $this->update['language'] = false;
        $this->update['description'] = false;
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

    public function setLanguage($language) {
        $this->var['language'] = $language;
        $this->update['language'] = true;
    }
    public function getLanguage() {
        return $this->var['language'];
    }

    public function setDescription($description) {
        $this->var['description'] = $description;
        $this->update['description'] = true;
    }
    public function getDescription() {
        return $this->var['description'];
    }

// ======================================================================================== override

    public function getTableName() {
        return 'permission';
    }

    protected function getIdColumnName() {
        return 'id';
    }

    public function getShardDomain() {
        return 'admin_permission';
    }
}
?>