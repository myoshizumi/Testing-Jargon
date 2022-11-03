<?php

namespace App;

use Exception;
use App\Question;
use App\Questions;

class Quiz
{
  // protected array $questions;

  protected Questions $questions;

  protected $currentQuestion = 1;

  public function __construct()
  {
    $this->questions = new Questions();
  }

  public function addQuestion(Question $question)
  {
    $this->questions->add($question);
    // $this->questions[] = $question;
  }

  public function begin()
  {
    return $this->nextQuestion();
  }

  public function nextQuestion()
  {
    return $this->questions->next();
    // if (!isset($this->questions[$this->currentQuestion - 1])) {
    //   return false;
    // }

    // $question = $this->questions[$this->currentQuestion - 1];

    // $this->currentQuestion++;

    // return $question;
  }

  public function questions()
  {
    return $this->questions;
  }

  public function isComplete()
  {
    return count($this->questions->answered()) === $this->questions->count();
  }

  public function grade()
  {
    if (!$this->isComplete()) {
      throw new Exception("This quiz has not yet been completed.");
    }

    $correct = count($this->questions->solved());

    return ($correct / $this->questions->count()) * 100;
  }

  // protected function correctlyAnsweredQuestions()
  // {
  //   return array_filter(
  //     $this->questions,
  //     fn ($question) => $question->solved()
  //   );
  // }
}