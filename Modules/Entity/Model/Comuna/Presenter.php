<?php 
namespace Modules\Entity\Model\Comuna;

trait Presenter {

    function getUserNameAttribute(){
        return ($this->relUser ?  $this->relUser->name : '');
    }

    function getUniverNameAttribute(){
        return ($this->relUniversity ?  $this->relUniversity->name : '');
    }

    function getProgramNameAttribute(){
        return ($this->relProgram ?  $this->relProgram->name : '');
    }

    function getTagsStrAttribute(){
        $ar = static::getTagAr();
        $tags = json_decode($this->tags);

        $res = [];
        if (is_array($tags)){
            foreach ($tags as $t){
                $res[] = $ar[$t];
            }
        }

        return implode(', ', $res);
    }

    
    function getTagsArAttribute(){
        $ar = static::getTagAr();
        $tags = json_decode($this->tags);

        if (!$tags)
            $tags = [];

        return $tags;
    }

    function getStatusNameAttribute(){
        $ar = static::getStatusAr();

        return (isset($ar[$this->status_id]) ?  $ar[$this->status_id] : '');
    }
    
    
}

