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
/**
     * @return mixed
     */
    
    public function userlist()
    {

        echo "
        <div class=\"container table-responsive\">
		<table id=\"example\" class=\"table table-striped\">
            <thead>
                <tr>
                    <th>الإسم الشخصي</th>
					<th>الإسم العائلي</th>
					<th>البريد الإلكتروني</th>
					<th>التاريخ</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
                </tr>
            </thead>
			<tbody>
        ";
		

foreach ($this->_xml as $user) {

	
	echo "
            <tr>
                    <td>{$user->Firstname}</td>
                    <td>{$user->Lastname}</td>
                    <td>{$user->Email}</td>
					<td>{$user->Date}</td>					
                    <td>
						<a href='admin.php?detail=" . $user->attributes()->id . "'>
						<span class=\"glyphicon glyphicon-eye-open\"></span></a>
					</td>
					<td>	
						<a href='admin.php?edit=" . $user->attributes()->id . "'>
						<span class=\"glyphicon glyphicon-edit\"></span></a>
					</td>
					<td>	
						<a data-href='admin.php?delete=" . $user->attributes()->id . "' data-toggle='modal' data-target='#confirm-delete' href='#'>
						<span class=\"glyphicon glyphicon-trash\"></span></a><br>
                    </td>
            </tr>
            ";
			
        }
		echo "</tbody>
			</table>
		</div>
	</body>
</html>";
	}



    public function getUserById($id)
    {
        $user = $this->_xml->xpath('//user[@id="' . $id . '"]');
        return $user[0];
    }

    public function updateUser($post)
    {
        $user = $this->_xml->xpath('//user[@id="' . $post['id'] . '"]');

//      $user[0]['id'] = (int) $post["id"];
        $user[0]->Firstname = $post["Firstname"];
        $user[0]->Lastname = $post["Lastname"];
        $user[0]->Email = $post["Email"];
		$user[0]->Job1 = $post["Job1"];
		$user[0]->Job2 = $post["Job2"];
		$user[0]->Job3 = $post["Job3"];
		$user[0]->Street = $post["Street"];
		$user[0]->Nstreet = $post["Nstreet"];
		$user[0]->City = $post["City"];
		$user[0]->Country = $post["Country"];
		
		$user[0]->Date = $post["Date"];
        $this->_xml->asXML($this->path);
    }
}

//Include template
include 'home.php';

if( !isset($_SESSION['logged']) || !$_SESSION['logged'] || !isset($_SESSION['login']) || empty($_SESSION['login']) || !isset($_SESSION['pwd']) || empty($_SESSION['pwd']) ){
	header("Location:index.php");
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
    include 'user.php';
	$process->userlist();
}

if ($param == "filter") {
    $post = $_POST["pers"];
    $process->filterList($post);
}

if ($param == "delete") {
    $id = $arr[1];
    $i = 0;
    foreach ($process->getXml() as $user){
        if ($user->attributes()->id == $id){
            unset($process->getXml()->user[$i]);
            $process->getXml()->asXML($path);
            break;
        }
        $i++;
    }
	 $process->userlist();
}

if ($param == "edit") {
    $id = $arr[1];
    $user = $process->getUserById($id);
    include 'user.php';
}

if ($param == "update") {
    $post = $_POST;
    $process->updateUser($post);
	$process->userlist();
}

if ($param == "detail") {
    $id = $arr[1];
    $user = $process->getUserById($id);
    include 'userdetail.php';
}