<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\ResourceFeatureTestCase;

class CMSCategoriesFeatureTest extends TestCase
{
  protected $endpoint = '/api/v1/contents/categories';
  protected $postData = [
      "value" => 'Technology',
  ];

  protected $putDataInvalid = [
    "value" => 123123,
  ];

  protected $putDataValid = [
    "value" => 'Technology IT',
  ];

  use ResourceFeatureTestCase;
}
