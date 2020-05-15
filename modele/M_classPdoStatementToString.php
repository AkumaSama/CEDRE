<?php
//class pour transformé une requête en string pour l'ajouter a la base
class toString
{
	public $str;
	
	public function __construct($toConvert)
	{
		$this->str = $toConvert;
	}

	public function __toString()
	{
		try 
        {
            return (string) $this->str;
        } 
        catch (Exception $exception) 
        {
            return '';
        }
	}
}
?>