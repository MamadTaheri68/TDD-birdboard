<?php

namespace Tests\Unit;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

   /** @test */
   public function it_has_a_path()
   {
      $project = Project::factory()->make();

      $this->assertEquals('/projects/' . $project->id, $project->path());
   }

   /** @test */
   public function it_belongs_to_an_owner()
   {
    $project = Project::factory()->make();

    $this->assertInstanceOf('App\Models\User', $project->owner);
   }

   /** @test */
   public function it_can_add_a_task()
   {
      $project = Project::factory()->create();

      $task = $project->addTask('Test task');

      $this->assertCount(1, $project->tasks);
      $this->assertTrue($project->tasks->contains($task));
   }
}
