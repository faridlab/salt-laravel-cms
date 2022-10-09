<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\ResourceFeatureTestCase;

class CMSContentsFeatureTest extends TestCase
{
  protected $endpoint = '/api/v1/contents';
  protected $postData = [
      "title" => 'Exampe Title for testing purpose',
      "content" => 'Some content of example',
  ];

  protected $putDataInvalid = [
    "title" => 123123,
  ];

  protected $putDataValid = [
    "title" => '[UPDATED] Exampe Title for testing purpose',
    "content" => 'Some content of example',
  ];

  use ResourceFeatureTestCase;
}
