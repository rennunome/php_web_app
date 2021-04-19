<?php

class user_entity
{
    private $id;
    
    public function getId() :int
    {
        return $this->id;
    }
    
    public function setId(int $id)
    {
        $this->id = $id;
    }
    
    private $password;
    
    public function getPassword() :String
    {
        return $this->password;
    }
    
    public function setPassword(String $password)
    {
        $this->password = $password;
    }
    
    private $name;
    
    public function getName() :String
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    private $createdAt;
    
    public function getCreatedAt() :int
    {
        return $this->createdAt;
    }
    
    public function setCreatedAt(int $createdAt)
    {
        $this->createdAt = $createdAt;
    }
    
    private $updatedAt;
    
    public function getUpdatedAt() :int
    {
        return $this->updatedAt;
    }
    
    public function setUpdatedAt(int $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }
    
    private $deleteflag;
    
    public function getDeleteflag() :int
    {
        return $this->deleteflag;
    }
    
    public function setDeleteflag(int $deleteflag)
    {
        $this->deleteflag= $deleteflag;
    }
    
    private $admin_flag;
    
    public function getAdminflag() :int
    {
        return $this->admin_flag;
    }
    
    public function setAdminFlag(int $admin_flag)
    {
        $this->admin_flag = $admin_flag;
    }
    
}