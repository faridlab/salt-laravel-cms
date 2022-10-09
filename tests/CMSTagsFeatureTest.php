<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\ResourceFeatureTestCase;

class CMSTagsFeatureTest extends TestCase
{
  protected $endpoint = '/api/v1/contents/tags';
  protected $postData = [
      "value" => 'Tag',
  ];

  protected $putDataInvalid = [
    "value" => 123123,
  ];

  protected $putDataValid = [
    "value" => 'Tag 2',
  ];

  use ResourceFeatureTestCase;
}
