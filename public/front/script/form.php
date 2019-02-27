<?php
/**
 * Created by Said Asebbane
 * User: Santakrouz
 * Date: 12/03/16
 * Time: 14:35 AM
 */


			
class Process
{
    protected $_xml;
    protected $path;

    public function __construct()
    {
        $this->_xml = simplexml_load_file("data/data.xml");
    }

    public function getXml()
    {
        return $this->_xml;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    
    public function adduser($post)
    {
        if ($post && 
            $post["Firstname"] != "" &&
            $post["Lastname"] != "" &&
			$post["Email"] != "" &&
            $post["Date"] != ""
        ) {

            $xml = $this->_xml;
            $user = $xml->addChild('user');
            $Firstname = $user->addChild("Firstname", $post["Firstname"]);
            $Lastname = $user->addChild("Lastname", $post["Lastname"]);
            $Email = $user->addChild("Email", $post["Email"]);
			$Job1 = $user->addChild("Job1", $post["Job1"]);
			$Job2 = $user->addChild("Job2", $post["Job2"]);
			$Job3 = $user->addChild("Job3", $post["Job3"]);
			$Street = $user->addChild("Street", $post["Street"]);
			$Nstreet = $user->addChild("Nstreet", $post["Nstreet"]);
			$City = $user->addChild("City", $post["City"]);
			$Country = $user->addChild("Country", $post["Country"]);
			$Date = $user->addChild("Date", date("D, d M Y H:i:s O"));
			
			//Uploud Image
			if (!file_exists($_FILES['monfichier']['tmp_name']) || !is_uploaded_file($_FILES['monfichier']['tmp_name'])) {
				$monfichier = $user->addChild("monfichier", "pic.jpg");
				} else {
     		//Uploud Image
			$nomOrigine = $_FILES['monfichier']['name'];			
			$elementsChemin = pathinfo($nomOrigine);			
			$extensionFichier = $elementsChemin['extension'];
			$extensionsAutorisees = array('jpg','gif','png','jpeg');
			if (!(in_array($extensionFichier, $extensionsAutorisees))) {
				echo '
        <p>No jpg Or Big</p>
        <a href="javascript:history.back()">Reteur</a> </div>
				';
				exit();
			} else {    
				// Copie dans le repertoire du script avec un nom
				// incluant l'heure a la seconde pres 
				$repertoireDestination = dirname(__FILE__)."/pics/";
				$nomDestination = "fichier_du_".date("YmdHis").".".$extensionFichier;
			
			   if (move_uploaded_file($_FILES["monfichier"]["tmp_name"], 
												 $repertoireDestination.$nomDestination)) {
				} else {
					echo "";
				}
			}
			$monfichier = $user->addChild("monfichier", $nomDestination);
			}
			// ID
			$hit_count = @file_get_contents('data/id.xml');
			$hit_count++;
			@file_put_contents('data/id.xml', $hit_count);
			
            $user->addAttribute("id", $hit_count);
            $xml->asXML($this->path);
        }
    }

   }


			

//Controller
$param = $_SERVER['QUERY_STRING'];
$arr = explode("=", $param);
if (count($arr) > 1) {
    $param = $arr[0];
}
$path = getcwd()."/data/data.xml";
$process = new Process();
$process->setPath($path);
if ($param == "list") {
    $process->userlist();
}
if ($param == "add") {
    $post = $_POST;
    $process->adduser($post);
}

