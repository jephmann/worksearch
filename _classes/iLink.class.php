<?php
/**
 *
 * @author Jeffrey
 */
interface iLink {

    public function getFacebook();
    public function setFacebook($facebook);
    
    public function getGoogleplus();
    public function setGoogleplus($googleplus);
    
    public function getLinkedin();
    public function setLinkedin($linkedin);
    
    public function getTwitter();
    public function setTwitter($twitter);
    
    public function getWebsite();
    public function setWebsite($website);
}
