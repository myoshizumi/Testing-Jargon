<?php

namespace Tests;

use App\Quiz;
use App\Question;
use PHPUnit\Framework\TestCase;

class QuizTest extends TestCase
{

  /** @test */
  public function it_contains_of_question()
  {
    $quiz = new Quiz;

    $quiz->addQuestion(new Question("What is 2 + 2?", 4));

    $this->assertCount(1, $quiz->questions());
  }

  /** @test */
  public function it_grades_a_perfect_quiz()
  {
    $quiz = new Quiz;

    $quiz->addQuestion(new Question("What is 2 + 2?", 4));

    $question = $quiz->nextQuestion();

    $question->answer(4);

    $this->assertEquals(100, $quiz->grade());
  }

  /** @test */
  public function it_grades_a_failed_quiz()
  {
    $quiz = new Quiz;

    $quiz->addQuestion(new Question("What is 2 + 2?", 4));

    $question = $quiz->nextQuestion();

    $question->answer("incorrect answer");

    $this->assertEquals(0, $quiz->grade());
  }

  /** @test */
  public function it_correctly_tracks_the_next_question_in_the_queue()
  {
    //
  }

  /** @test */
  public function it_cannot_be_graded_until_all_questions_have_been_answered()
  {
    //
  }
}