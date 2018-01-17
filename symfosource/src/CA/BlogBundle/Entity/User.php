<?php

namespace CA\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * User
 */
class User implements UserInterface
{
    
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    private $plainPassword; /////confirm password

    /**
     * @var string
     */
    private $salt;

    /**
     * @var string
     */
    // private $hashed = hash($password, $salt);

    private $hashed;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var array
     */
    private $roles;


    private $posts; ///// ManyToOne

    
    public function __construct()
    {
        $this->posts = new ArrayCollection();
    }

    /**
     * Get user
     *
     * @return int
     */
    public function getUser()
    {
        return $this;
    }

    /**
     * Set posts
     *
     * @param int $posts
     *
     * @return User
     */
    public function setPosts($posts)
    {
        $this->posts = $posts;

        return $this;
    }


    /**
     * Get posts
     *
     * @return int
     */
    public function getPosts()
    {
        return $this->posts;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */

    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }


    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {   
        return $this->password;
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return User
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set roles
     *
     * @param array $roles
     *
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles()
    {
        if(is_array($this->roles)){
            return $this->roles;
        }
        return array($this->roles);
    }

    public function eraseCredentials(){

    }
}

