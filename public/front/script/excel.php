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
    
    public function excellist()
    {

        echo "
        <div class=\"container table-responsive\">
		<table id=\"Excel\" class=\"table table-striped\">
            <thead>
                <tr>
                    <th>الإسم الشخصي</th>
                    <th>الإسم العائلي</th>
                    <th>البريد الإلكتروني</th>
					<th>العمل</th>
					<th>العنوان</th>
					<th>الدولة</th>
					<th>تاريخ التسجيل</th>
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
					<td>{$user->Job1} {$user->Job2} {$user->Job3}</td>
					<td>{$user->Street} {$user->Nstreet} {$user->City}</td>
					<td>{$user->Country}</td>
					<td>{$user->Date}</td>
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
if ($param == "excel") {
    $process->excellist();
}
