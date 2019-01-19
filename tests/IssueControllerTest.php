<?php

use App\Issue as Issue;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IssueControllerTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * Test for IssueController
     *
     * @return void
     */
    public function testIssueUpdate()
    {
        $issue = $this->createAnIssue();
        $this->seeInDatabase('issues', ['id' => $issue->id]);
        $this->seeInDatabase('issues', ['title' => $issue->title]);
        Session::start();
        $user = new \App\User(['name' => 'Craig']);
        $this->be($user); //You are now authenticated
        $newTitle = "Enrole in a Ph.D. programm";
        $newTypeId = 3;
        $patchInput = [
            '_token' => Session::token(),
            "title" => $newTitle,
            "description" => "",
            "project_id" => "5",
            "status_id" => "2",
            "type_id" => $newTypeId,
            "estimation" => "",
            "deadline" => ""
        ];
        $this->call('PATCH', '/issues/'.$issue->id, $patchInput);
        $this->seeInDatabase('issues', ['title' => $newTitle]);
        $this->seeInDatabase('issues', ['type_id' => $newTypeId]);
    }

    private function createAnIssue($num = 1)
    {
        $issue = Issue::create(
                [
                    'project_id' => 1, 
                    'title' => 'Test ' . $num, 
                    'priority_order' => $num,
                    'user_id' => 1,
                    'type_id' => 1,
                    'estimation' => '10',
                    'sprint_id' => 1,
                    'status_id' => 1
                ]);
        return $issue;
    }
}
