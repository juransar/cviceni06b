
<?php

require_once '../bootstrap.php';

use Tester\Assert;
use Tester\Environment;
use Nette\Database\Connection;
use Nette\Database\Structure;
use Nette\Database\Context;
use Nette\Caching\Storages\DevNullStorage;
use App\Model\BaseModel;
use App\Model\EmployerModel;
use Tester\TestCase;
/**
 * Class EmployerModelTest
 * @dataProvider ../database.ini
 */
class EmployerModelTest extends TestCase
{
    /** @var Context */
    private $database;
    /** @var BaseModel */
    private $BaseModel;
    /** @var \App\Model\EmployerModel */
    private $employerModel;
    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $args = Environment::loadData();
        $connection = new Connection($args['dsn'], $args['user'], $args['password']);
        $this->database = new Context($connection, new Structure($connection, new DevNullStorage()));
        $this->employerModel = new EmployerModel($this->database);
    }

    public function testInsertEmployer() {
        $values=array('surname'=>'doe',
            'firstname'=>'jane',
            'salary'=>3000,
            'company_id'=>2,
            'pid_id'=>2,
            'role'=>'worker',
            'username'=>'anon',
            'password'=>'1234');
        $id=$this->employerModel->insertEmployer($values);
        $row = $this->database->table('employer')->where('surname', 'doe')->fetch();
        Assert::same($values['password'], $row['password']);

    }

    public function testUpdateEmployer(){
        $values1=array('surname'=>'doe',
            'firstname'=>'john',
            'salary'=>3000,
            'company_id'=>2,
            'pid_id'=>2,
            'role'=>'worker',
            'username'=>'anon',
            'password'=>'1234');
        $row = $this->database->table('employer')->where('surname', 'doe')->fetch();
        $id=$row['id'];
        $this->employerModel->updateEmployer($id, $values1);
        $employee=$this->employerModel->getEmployer($id);
        Assert::same($values1['firstname'], $employee['firstname']);


    }

    public function testDeleteEmployer(){
        $row = $this->database->table('employer')->where('surname', 'doe')->fetch();
        $id=$row['id'];
        $this->employerModel->deleteEmployer($id);
        Assert::false($this->database->table('employer')->where('id', $id)->fetch());
    }
}

# Spuštění testovacích metod
$testCase = new EmployerModelTest;
$testCase->run();