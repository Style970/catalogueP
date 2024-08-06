<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Integrations;

class GoogleCloudIntegrationsV1alphaUseTemplateRequest extends \Google\Collection
{
  protected $collection_key = 'configParameters';
  protected $configParametersType = GoogleCloudIntegrationsV1alphaIntegrationConfigParameter::class;
  protected $configParametersDataType = 'array';
  /**
   * @var string
   */
  public $integration;
  /**
   * @var string
   */
  public $integrationDescription;

  /**
   * @param GoogleCloudIntegrationsV1alphaIntegrationConfigParameter[]
   */
  public function setConfigParameters($configParameters)
  {
    $this->configParameters = $configParameters;
  }
  /**
   * @return GoogleCloudIntegrationsV1alphaIntegrationConfigParameter[]
   */
  public function getConfigParameters()
  {
    return $this->configParameters;
  }
  /**
   * @param string
   */
  public function setIntegration($integration)
  {
    $this->integration = $integration;
  }
  /**
   * @return string
   */
  public function getIntegration()
  {
    return $this->integration;
  }
  /**
   * @param string
   */
  public function setIntegrationDescription($integrationDescription)
  {
    $this->integrationDescription = $integrationDescription;
  }
  /**
   * @return string
   */
  public function getIntegrationDescription()
  {
    return $this->integrationDescription;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudIntegrationsV1alphaUseTemplateRequest::class, 'Google_Service_Integrations_GoogleCloudIntegrationsV1alphaUseTemplateRequest');
